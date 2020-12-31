<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Koko Blog') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}"/>
</head>
<body>
    <div id="app">
        <header class=" special-header navbar-fixed">
            <nav class="white white-text nav-extended">
                <div class="nav-wrapper container">
                    <ul class="right">
                    @guest
                        <li><a class="waves-effect black-text" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="waves-effect black-text">{{ __('Register') }}</a></li>
                        @endif
                    @else
                        <li>
                        <img src="{{ asset(Auth::user()->profile->avatar) }}" lazy="loading" alt="{{ Auth::user()->name}}" height="45px" width="45px" class="" style="border-radius: 45px; line-height:45px; margin-top:3px;">
                        </li>
                        <li>
                        <a href="{{route('profile.index')}}" class="dropdown-trigger text-accent-3 black-text" data-target="dropProfile"><b>{{ Auth::user()->name }}</b></a>
                        </li>
                    @endguest
                    </ul>
                </div>
                <div class="nav-content center center-align nav-stick container-tab show-on-medium-and-down hide-on-large-only hide-on-extra-large-only">
                    <ul class="tabs tabs-transparent row">
                        <li class="tab active-nav"><a href="{{route('home')}}" class="refs"><i class="fa fa-home navcon"></i> Home</a></li>
                        <li class="tab active-nav"><a href="{{ route('category.index') }}"><i class="fa fa-home navcon"></i> Category</a></li>
                        <li class="tab active-nav"><a href="{{ route('post.index') }}"><i class="fa fa-newspaper-o navcon"></i> Posts</a></li>
                        <li class="tab active-nav"><a href="{{route('post.trash')}}"><i class="fa fa-trash-o navcon"></i> Trash</a></li>
                        <li class="tab active-nav"><a href="{{route('user.index')}}"><i class="fa fa-user-o navcon"></i> User</a></li>
                        <li class="tab active-nav"><a href="{{route('profile.index')}}"><i class="fa fa-key navcon"></i> Profile</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="row">
            <div class="wrap container">
                <section class="full-wrapper-width col s12 m12 l12 xl12">
                    <aside class="left-wrapper-width col l2 xl2 hide-on-med-and-down">
                        <div class="nav-stick">
                            <ul class="collapsible collapsible-accordion">
                                <li><a href="{{ route('home') }}" class="collapsible-header text-accent-3"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="{{ route('category.index') }}" class="collapsible-header text-accent-3"><i class="fa fa-home"></i> Category</a></li>
                                <li><a href="{{ route('post.index') }}" class="collapsible-header text-accent-3"><i class="fa fa-newspaper-o"></i> Posts</a></li>
                                <li><a href="{{route('post.trash')}}" class="collapsible-header text-accent-3"><i class="fa fa-trash-o"></i>Trash</a></li>
                                <li><a href="{{route('user.index')}}" class="collapsible-header text-accent-3"><i class="fa fa-user-o"></i>User</a></li>
                                <li><a href="{{route('profile.index')}}" class="collapsible-header text-accent-3"><i class="fa fa-key"></i>Profile</a></li>
                                @if(Auth::check())
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="collapsible-header text-darken-3 red-text"><i class="fa fa-lock"></i> {{ __('Logout') }}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                @endif
                            </ul>
                        </div>
                    </aside>
                    <main class="py-4 col s12 m12 l10 xl10">
                        @yield('content')
                    </main>
                </section>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/runtime.js')}}"></script>
    @yield('script')

    <script>
    @if(session('message'))
      M.toast({html: "{{ @session('message') }} <button class='btn-flat toast-action'>Undo</button>"})
    @endif
    </script>
</body>
</html>
