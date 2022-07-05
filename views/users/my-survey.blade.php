@extends('main')

@section('content')

<div class="show">
    <div class="show__window">
        <div class="show__top">
            <h2 class="show__top-title">My surveys list</h2>
            <button class="show__top-button" onclick="window.location=`{{ url('/users/add-survey')}}`">+ Add survey</button>
        </div>
        <table class="show__table">
            <tr>
                <th>Survey name</th>
                <th>Link</th>
            </tr>
            @foreach ($surveys as $item)
                <tr>
                    <td><a href="http://127.0.0.1:8000/users/check-survey/{{$item->url}}">{{$item->name}}</a></td>
                    <td><a href="http://127.0.0.1:8000/survey/{{$item->url}}">http://127.0.0.1:8000/survey/{{$item->url}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection