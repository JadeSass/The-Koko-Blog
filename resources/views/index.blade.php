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
                                <div class="row" style="margin-bottom:0px;">
                                    <div class="post-item">
                                        <div class="col xl12 l12 m12 s12">
                                            <div class="black white-text blob">
                                                <span class="ins">Today {{ date('l, jS \of F Y') }}.</span>
                                            </div>
                                        </div>
                                        @foreach($allPost as $post)
                                        <div class="col xl12 l12 m12 s12 lead-wrap">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="lead-post col xl5 l5 m12 s12 image-wrap">
                                                        <div class="card-image image-wrap">
                                                            <img data-src="{{$post->image}}" alt="{{$post->title}}" class="lazy">
                                                        </div>
                                                    </div>
                                                    <div class="lead-text col xl7 l7 m12 s12">
                                                        <div class="lead-content">
                                                            <a href="{{ route('single.index', ['slug' => $post->slug]) }}" class="text-darken-4 blu-text"><span class="lead-title">{{$post->title}}</span></a><br>
                                                            <span class="chip blue darken-2 white-text">{{$post->category->name}}</span> <i class="blue-text darken-2">{{$post->user->name}}</i> <span class="grey-text text-darken-2">{{ $post->created_at->toFormattedDateString() }}</span>
                                                            {!! str_limit($post->content, 220) !!}
                                                        </div>
                                                    </div>
                                                    <div class="stat-info">
                                                        <div class="lead-info col xl5 l5 m12 s12 optimize-status" id="optimize-stat">
                                                            <div class="card-panel nosh info-text blue lighten-4 z-depth-1">
                                                            @foreach($singlePost as $post)
                                                                <div class="row valign-wrapper info-content">
                                                                    <div class="col s4">
                                                                        <img src="{{$post->image}}" alt="{{$post->title}}" class="circle rounded responsive-img">
                                                                    </div>
                                                                    <div class="col s8">
                                                                        <span class="black-text opt-title"><a href="{{ route('single.index', ['slug' => $post->slug]) }}">{{$post->title}}</a></span> <small class="green-text text-darken-3"> <i class="fa fa-bolt"></i> Bolt Mode</small>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="content-item-category">
                                <div class="row">
                                    <div class="post-item">
                                        <div class="category-post col xl12 l12 m12 s12">
                                            <h5>{{$category_1->name}} </h5>
                                            <div class="divider blue darken-2"></div>
                                        </div>
                                        @foreach($category_1->posts()->take(6)->get() as $post)
                                        <div class="col xl6 l6 m12 s12">
                                            <div class="card nosh horizontal post-wrap">
                                                <div class="card-image image-wrap">
                                                    <img data-src="{{$post->image}}" alt="{{$post->title}}" class="lazy">
                                                </div>
                                                <div class="card-stacked">
                                                    <div class="card-content">
                                                        <a href="{{ route('single.index', ['slug' => $post->slug]) }}" class="text-darken-4 blue-text"><span class="card-title truncate-2">{{str_limit($post->title, 70)}}</span></a>
                                                        <p class="grey-text view-text"><i class="fa fa-eye"></i> {{$post->view_count}} @if($post->view_count > 1)  Views @else View @endif on this post</p>
                                                        {!! str_limit($post->content, 85) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="navigation-btn center-align col s12 m12 l12 xl12">
                                            <a href="{{route('category.all', ['id' => $category_1->id])}}" class="btn-flat bdr center blue-text text-darken-3">Browse all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('includes.sidebar-right-index')
                    </div>
                </div>
            </div>
            @include('includes.footer')
            @include('includes.floating')
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
