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
    @if(Auth::check())
        <header class="special-header navbar-fixed">
            <nav class="black white-text nosh">
                <div class="nav-wrapper container">
                    <ul class="left">
                        <li class="hide-on-small-and-down">Kokoblog</li>
                        <li><a href="{{ route('post.create') }}" class=""><i class="fa fa-plus"></i> New</a></li>
                    </ul>
                    <ul class="right">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-darken-3 red-text"> {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                        <img src="{{ asset(Auth::user()->profile->avatar) }}" lazy="loading" alt="{{ Auth::user()->name}}" height="25px" width="25px" class="" style="border-radius: 45px; line-height:35px; margin-top:5px;">
                        <li>
                        <a href="{{route('profile.index')}}" class="dropdown-trigger text-accent-3 white-text" data-target="dropProfile">{{ Auth::user()->name }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    @endif
        <div class="row">
            <div class="wrap">
                <section class="full-wrapper-width col s12 m12 l12 xl12">
                @if(Auth::check())
                    <aside class="left-wrapper-width black col l2 xl2 hide-on-med-and-down">
                        <ul id="slide-out" class="sidenav sidenav-fixed hide-on-med-and-down black white-text">
                            <ul class="collapsible collapsed">
                                <li class="head-col">
                                    <div class="collapsible-header">
                                        <a href="{{ route('home') }}" class="white-text"><i class="fa fa-home"></i> Dashboard</a>
                                    </div>
                                </li>
                                <li class="head-col">
                                    <div class="collapsible-header">
                                        <a href="#" class="white-text"><i class="fa fa-plus"></i> Posts</a>
                                    </div>
                                    <div class="collapsible-body grey darken-3">
                                        <a href="{{ route('post.index') }}" class="white-text"> All Posts</a>
                                    </div>
                                    <div class="collapsible-body grey darken-3">
                                        <a href="{{ route('post.create') }}" class="white-text"> Add New</a>
                                    </div>
                                </li>
                                <li class="head-col">
                                    <div class="collapsible-header">
                                        <a href="{{ route('post.media') }}" class="white-text"><i class="fa fa-file-video-o"></i> Media</a>
                                    </div>
                                </li>
                                <li class="head-col">
                                    <div class="collapsible-header">
                                        <a href="{{ route('category.index') }}" class="white-text"><i class="fa fa-file-o"></i> Pages</a>
                                    </div>
                                </li>
                                <li class="head-col">
                                    <div class="collapsible-header">
                                        <a href="{{ route('comment.index') }}" class="white-text"><i class="fa fa-comment"></i> Comments</a>
                                    </div>
                                </li>
                                <li class="head-col">
                                    <div class="collapsible-header">
                                        <a href="#?" class="white-text"><i class="fa fa-user"></i> Users</a>
                                    </div>
                                    <div class="collapsible-body grey darken-3">
                                        <a href="{{ route('user.index') }}" class="white-text"> All Users</a>
                                    </div>
                                    <div class="collapsible-body grey darken-3">
                                        <a href="{{ route('user.create') }}" class="white-text"> Add New</a>
                                    </div>
                                </li>
                                <li class="head-col">
                                    <div class="collapsible-header">
                                        <a href="{{ route('post.trash') }}" class="white-text"><i class="fa fa-trash"></i> Trash</a>
                                    </div>
                                </li>
                                <li class="head-col">
                                    <div class="collapsible-header">
                                        <a href="#" class="white-text"><i class="fa fa-newspaper-o"></i> Adverts</a>
                                    </div>
                                    <div class="collapsible-body grey darken-3">
                                        <a href="{{ route('advert.index') }}" class="white-text"> All Adverts</a>
                                    </div>
                                    <div class="collapsible-body grey darken-3">
                                        <a href="{{ route('advert.create') }}" class="white-text"> Add New</a>
                                    </div>
                                    <div class="collapsible-body grey darken-3">
                                        <a href="{{ route('advert.trash') }}" class="white-text"> Stopped Ads</a>
                                    </div>
                                </li>
                            </ul>
                        </ul>
                    </aside>
                @endif
                    <main class="py-4 col s12 m12 l10 xl10">
                        <div class="container">
                        @yield('content')
                        </div>
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
