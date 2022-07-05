<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Survey</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- <link rel="icon" href="{{ url('css/favicon.svg') }}"> --}}
    </head>

<div class="login">
    <form autocomplete="off" action="{{ route('login') }}" class="login__window" method="post">
        @csrf 
        <h2 class="login__title">Login</h2>

        <input class="login__input-username" name="email" type="text" placeholder="Email" />
        <input class="login__input-password" type="password" name="password" placeholder="Password" />
        {{-- <p class="login__register-hint">Don't have an account? <a href="/register">Sign up</a></p> --}}
        <button type="submit" class="login__button">Login</button>
    </form>
</div>

</html>