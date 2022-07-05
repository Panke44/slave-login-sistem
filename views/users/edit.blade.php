@extends('main')

@section('content')

<div class="login">
    <form class="login__window" action="/users/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$users['id']}}" />

        <h2 class="login__title"> Update {{$users['client_name']}}</h2>
        <input class="login__input-username" name="client_name" type="text" value="{{$users['client_name']}}" />
        <input class="login__input-username" name="email" type="text" value="{{$users['email']}}" />
        <button class="login__button">Update</button>
    </form>
</div>

@endsection