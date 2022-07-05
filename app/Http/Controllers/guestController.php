<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class guestController extends Controller
{
    public function index($url)
    {  
        $survey = DB::table('surveys')->where('url', $url)->get();
        
        if($survey -> count() > 0){
            $questions = DB::table('questions')->where('survey_fk', $survey[0]->id)->get();
            return view('survey',['survey' => $survey, 'questions' => $questions]);
        }
        else {
            return view('404.404');
        }
        
        
    }
    public function submit(Request $req)
    {        
        for ($i=1; $i <= $req->count; $i++) { 
            $question_name = 'question'.$i;
            $answer_name = 'checkAnswer'.$i;
            $answerComment_name = 'comment'.$i;

            if($req->$answerComment_name){
                if (is_array($req->$answer_name)==1) {
                    for ($x=0; $x < count($req->$answer_name); $x++) { 
                        $query = DB::table('answers')->insert([
                            'survey_fk' => $req->input('id'),
                            'question' =>  $req->$question_name,
                            'answer' =>  $req->$answer_name[$x],
                            'commentAnswer'=>$req -> $answerComment_name,
                        ]);
                    }
                } else {
                    $query = DB::table('answers')->insert([
                        'survey_fk' => $req->input('id'),
                        'question' =>  $req->$question_name,
                        'answer' =>  $req->$answer_name,
                        'commentAnswer'=>$req -> $answerComment_name,

                    ]);
                }
            } else {
                if (is_array($req->$answer_name)==1) {
                    for ($x=0; $x < count($req->$answer_name); $x++) { 
                        $query = DB::table('answers')->insert([
                            'survey_fk' => $req->input('id'),
                            'question' =>  $req->$question_name,
                            'answer' =>  $req->$answer_name[$x],
                        ]);
                    }
                } else {
                    $query = DB::table('answers')->insert([
                        'survey_fk' => $req->input('id'),
                        'question' =>  $req->$question_name,
                        'answer' =>  $req->$answer_name,
                    ]);
                }
            }
        }
        if($query){
            return redirect()->back()->with('message', 'Comment created successfully!');
        }else {
            return redirect()->back()->with('message', 'something went wrong!');
        }
    }
}

