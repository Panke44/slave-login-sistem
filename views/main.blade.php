<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Survey</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- <link rel="icon" href="{{ url('css/favicon.svg') }}"> --}}
    </head>

    <body>
        <main>
            <div class="admin-panel">
                <div class="admin-panel__drawer">
                    <ul class="admin-panel__drawer-content">
                        <div>
                            <a href="/users">
                                <li class="admin-panel__drawer-item">Users</li>
                            </a>
                            <a href="/users/my-survey">
                                <li class="admin-panel__drawer-item">Surveys</li>
                            </a>
                            <a href="#">
                                <li class="admin-panel__drawer-item">Questions</li>
                            </a>
                        </div>
                        <form autocomplete="off" method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="admin-panel__drawer-button">
                            <li class="admin-panel__drawer-item--logout">Logout</li>
                        </button>
                        </form>
                    </ul>
                </div>
                <div class="admin-panel__content">
                    @yield('content')
                </div>
            </div>
          </main>

    </body>

</html>