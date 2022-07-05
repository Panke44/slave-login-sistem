<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Queue\Console\RetryBatchCommand;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.show');
    }
    public function add()
    {
        return view('users.add');
    }
    public function upUser(Request $req)
    {
        $this->validate($req, [
            'client_name' => 'required|max:50',
            'email' => ['required','email','max:50',Rule::unique('users'),],
        ]);

        $query = DB::table('users')->insert([
            'email' => $req->input('email'),
            'client_name' =>  $req->input('client_name'),
            'status' =>  $req->input('status'),
            'password' => Hash::make($req->password),
        ]);

        if($query){
            return redirect()->back()->with('message', 'Comment created successfully!');
        }else {
            return redirect()->back()->with('message', 'something went wrong!');
        }
    }
    public function show()
    {
        $users = DB::table('users')->get();
        $users = User::simplePaginate(10);
        return view('users.show',['users' => $users]);
    }
    public function edit($id)
    {
        $users = User::find($id);
        return view('users.edit',['users' => $users]);
    }
    public function updateUser(Request $req)
    {
        $this->validate($req, [
            'client_name' => 'required|max:50',
            'email' => ['required','max:50',Rule::unique('users')->ignore($req->id),],
        ]);

        $users=User::find($req->id);
        $users->client_name=$req->client_name;
        $users->email=$req->email;
        $users->save();
        return redirect('users');
    }
    public function deleteUser($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('users');
    }
    public function addSurvey()
    {
        return view('users.add-survey');
    }
    public function upSurvey(Request $req)
    {
        $answersArr=[];
        $survey = $req->all();
        foreach ($survey as $key => $value) {
            switch ($key) {
                case "_token":
                  break;
                case "id":
                  break;
                case "survey_name":
                    $survey_name=$value;
                break;
                case "question":
                    $question=$value;
                break;
                case "option":
                    $option=$value;
                break;
                default:
                    array_push($answersArr, $value);
            }
        }
        $answers=implode(",", $answersArr);

        $query = DB::table('surveys')->insert([
            'user_fk' => auth()->user()->id,
            'name' => $survey_name,
            'url' => Str::random(30),
        ]);
        
        $survey_fk = DB::getPdo()->lastInsertId();

        $query = DB::table('questions')->insert([
            'question' => $question,
            'survey_fk' =>  $survey_fk,
            'answer' => $answers,
            'option' => $option,
        ]);

        if($query){
            $surveys = DB::table('surveys')->where('user_fk', auth()->user()->id)->get();
            return view('users.my-survey',['surveys' => $surveys]);
        }else {
            return redirect()->back()->with('message', 'something went wrong!');
        }  
    }
    public function mySurvey()
    {
        $surveys = DB::table('surveys')->where('user_fk', auth()->user()->id)->get();
        return view('users.my-survey',['surveys' => $surveys]);
    }
    public function checkSurvey($url)
    {  
        $survey = DB::table('surveys')->where('url', $url)->get();

        if($survey -> count() > 0){
            $question = DB::table('questions')->where('survey_fk', $survey[0]->id)->get();

            foreach($question as $key => $value){
                $allAnswers[] = explode(',', $value->answer);
            }

            foreach ($allAnswers as $key => $value) {
                for ($i=0; $i < count($value); $i++) { 
                    $checkAnswers=count(DB::table('answers')->where(['question'=>$question[$key]->question, 'answer' => $value[$i]])->get());
                    $allAnswers[$key][$i] = $allAnswers[$key][$i] . ': ' . $checkAnswers;
                }
            }

            $master = array();
            $num = 0;

            for ($i=0; $i < count($question); $i++) {  
                $master[$num]["question$num"] = $question[$i]->question;
                $master[$num]["answers$num"] = $allAnswers[$i];
                $num++;                
            }
            
            return view('users.check-survey',['survey' => $survey, 'master' => $master]);
        }
        else {
            return view('404.404');
        }
    }
}