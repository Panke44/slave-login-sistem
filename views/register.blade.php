@extends('main')

@section('content')

<div class="login">
    <form class="login__window" action="">
        <h2 class="login__title">Register</h2>
        <input class="login__input-username" type="text" placeholder="Username" />
        <input class="login__input-password" type="password" placeholder="Password" />
        <input class="login__input-password" type="password" placeholder="Repeat password" />
        <button class="login__button">Register</button>
    </form>
</div>

@endsection