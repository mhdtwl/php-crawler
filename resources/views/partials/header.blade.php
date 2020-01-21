<header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        @guest
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        @else
        <a class="navbar-brand" href="{{ route('dashboard', app()->getLocale()) }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        @endguest
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('login', app()->getLocale()) }}">
                            {{ __("header.Login") }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('register',  app()->getLocale()) }}">
                            {{ __("header.Register") }}
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu"
                             aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="{{ route('logout',  app()->getLocale()) }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __("header.Logout") }}
                            </a>
                            <form id="logout-form"
                                  action="{{ route('logout',  app()->getLocale()) }}"
                                  method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="navbarDropdown"
                       role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        {{ app()->getLocale() }}
                    </a>
                    <div class="dropdown-menu"
                         aria-labelledby="navbarDropdown">
                        @foreach( config('app.locales') as $langKey => $lang)
                            @if($langKey !== app()->getLocale())
                                <a class="dropdown-item"
                                   href="{{ route( Route::currentRouteName(),  $langKey) }}">
                                    {{$lang}}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
