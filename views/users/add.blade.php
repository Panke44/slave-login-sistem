@extends('main')

@section('content')

<div class="login">
    <form class="login__window" action="/users/add-user" method="POST">
        @csrf
        <input type="hidden" name="password" value="survey" />
        <input type="hidden" name="status" value="1" />
        <h2 class="login__title">Add new user</h2>
        <input class="login__input-username" type="text" name="email" placeholder="E-mail" />
        <input class="login__input-username" type="text" name="client_name" placeholder="Client name" />
        <button class="login__button">+ Add user</button>
    </form>
</div>

@endsection