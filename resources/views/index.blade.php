<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Koko Blog | Home</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}"/>

    </head>
    <body>
        <div id="app">
            @include('includes.header')
            <div class="main wrapper container">
                <div class="row">
                    <div class="wrap-main">
                        <!-- Mid widgets -->
                        <div class="widget col xl9 l9 m8 s12">
                            <div class="welcome-widget">
                                <div class="slider slider-wrapper center">
                                    <ul class="slides slides-item">
                                        <li class="blue darken-4">
                                            <h4 class="white-text" style="margin-bottom:0px;">Welcome to Koko Blog &#128077;</h4>
                                            <i class="white-text">Na the koko we dey serve...</i>
                                            <p class="white-text" style="margin-left:6px; margin-right:6px;" >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio, earum maxime natus nulla odio rem nostrum iusto! Tempora, ad eligendi.</p>
                                        </li>
                                        <li class="red darken-4">
                                            <h4 class="white-text" style="margin-bottom:0px;">Koko Fun</h4>
                                            <i class="white-text">Na the koko we dey serve...</i>
                                            <p class="white-text" style="margin-left:6px; margin-right:6px;" >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio, earum maxime natus nulla odio rem nostrum iusto! Tempora, ad eligendi.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content-item-post">
                                <div class="row">
                                    <div class="post-item">
                                        <div class="col xl12 l12 m12 s12">
                                            <div class="black white-text blob">
                                                <span class="ins">Today {{ date('l, jS \of F Y') }}.</span>
                                            </div>
                                        </div>
                                        @foreach($posts as $post)
                                        <div class="col xl6 l6 m12 s12">
                                            <div class="card nosh horizontal post-wrap">
                                                <div class="card-image image-wrap">
                                                    <img data-src="{{$post->image}}" alt="{{$post->title}}" class="lazy">
                                                    <div class="tag">
                                                        <div class="chip black white-text">{{$post->category->name}}</div>
                                                    </div>
                                                </div>
                                                <div class="card-stacked">
                                                    <div class="card-content">
                                                        <a href="{{ route('single.index', ['slug' => $post->slug, 'id' => $post->id]) }}" class="text-darken-4 blue-text"><span class="card-title truncate-2">{{str_limit($post->title, 70)}}</span></a>
                                                        <p class="grey-text view-text">2k Views - 44 Comments</p>
                                                        {!! str_limit($post->content, 85) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('includes.sidebar-right')
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.lazy.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>

        <script>
        @if(session('message'))
          M.toast({html: "{{ @session('message') }} <button class='btn-flat toast-action'>Ok</button>"})
        @endif
        </script>

    </body>
</html>
