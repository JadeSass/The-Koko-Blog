@extends('layouts.frontend')

@section('content')
<style>
    .display-comment > .display-comment{
        min-width: 90%;
        margin-left: 56px;
    }

    .display-comment > .display-comment{
        min-width: 90%;
        margin-left: 50px;
    }
    .display-comment > .display-comment > #reply-field{
        display: none !important;
    }
    .display-comment>.display-comment > .collection>.collection-item>.reply-tog{
        display: none !important;
    }
</style>
<div class="post-single">
    <div class="col xl12 l12 m12 s12">
        <div class="row">
            <!-- sidebar action: views, comment count, share -->
            <div class="sidebar-action col xl3 l3 hide-on-med-and-down">
                <div class="sticky-sidebar">
                <p class="grey-text margin-0 mb-0">Advertisement</p>
                    <div class="slider center">
                        <ul class="slides">
                        @if($sidevert->count() > 0)
                        @foreach($sidevert as $advert)
                            <li class="transparent darken-4">
                                <a href="{{$advert->link}}" target="_blank" style="text-transform: unset;">
                                    <img src="{{asset($advert->image)}}" class="responsive-img" alt="Banner Ads">
                                </a>
                            </li>
                        @endforeach
                        @else
                            <div class="card bdr nosh mt-0">
                                <div class="card-image">
                                    <a href="#" target="_blank"><img src="" alt="Buy ads space"></a>
                                </div>
                            </div>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="read-action col xl9 l9 m12 s12">
                <div class="title">
                    <h5 class="blue-text text-darken-1">{{ $post->title }}</h5>
                    <p><i class="fa fa-clock-o"></i> Published {{ $post->created_at->toFormattedDateString() }} &bull; {{$post->view_count}} @if($post->view_count > 1)  People @else Person @endif view this post &bull; {{$comments->count()}} @if($comments->count() > 1)  Comments @else Comment @endif / <a class="chip blue white-text">{{ $post->category->name }}</a></p>
                </div>
                <div class="image-wrapper center-align center content-centered image-wrap">
                    <div class="card nosh">
                        <div class="card-image image-con transparent">
                            <img data-src="{{ $post->image }}" alt="{{ $post->title }}" class="responsive-img lazy">
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    {!! $post->content !!}
                </div>
                @if($adverts->count() > 0)
                @foreach($adverts->take(1) as $advert)
                <p class="grey-text margin-0 mb-0">{{$advert->ads_type}}</p>
                <div class="card bdr nosh mt-0">
                    <div class="card-image">
                        <a href="{{$advert->link}}" target="_blank"><img src="{{asset($advert->image)}}" alt="Banner Ads"></a>
                    </div>
                </div>
                @endforeach
                @else
                <div class="card bdr nosh mt-0">
                    <div class="card-image">
                        <a href="#" target="_blank"><img src="" alt="Buy ads space"></a>
                    </div>
                </div>
                @endif
                <div class="divider"></div><br>
                <div class="navigation">
                    <div class="row">
                        @if($prev)
                        <div class="col s6 m6 l6 xl6 left">
                            <div class="prev left">
                                <a href="{{ route('single.index', ['slug' => $prev->slug]) }}" class="left-align">
                                    <span class="grey-text">Previous Article</span><br>
                                    <span>{{$prev->title}}</span>
                                </a>
                            </div>
                        </div>
                        @endif
                        @if($next)
                        <div class="col s6 m6 l6 xl6 right">
                            <div class="next right">
                                <a href="{{ route('single.index', ['slug' => $next->slug]) }}" class="right-align">
                                    <span class="grey-text">Next Article</span><br>
                                    <span>{{$next->title}}</span>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="stat-info">
                    <div class="lead-info col xl12 l12 m12 s12 optimize-status" id="optimize-stat">
                        <h6>Read Also</h6>
                        <div class="card-panel nosh info-text blue lighten-4 z-depth-1">
                        @foreach($singlePost as $post)
                            <div class="row valign-wrapper info-content">
                                <div class="col s4 m3 l2 xl2">
                                    <img src="{{$post->image}}" alt="{{$post->title}}" class="circle rounded responsive-img">
                                </div>
                                <div class="col s8 m9 l10 xl10">
                                    <span class="black-text opt-title"><a href="{{ route('single.index', ['slug' => $post->slug]) }}">{{$post->title}}</a></span> <small class="green-text text-darken-3"> <i class="fa fa-bolt"></i> Bolt Mode</small>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <h5 class="blue-text text-darken-1">{{$comments->count()}} @if($comments->count() > 1)  Comments @else Comment @endif</h5>
                @include('partials._comment_replies', ['comments' => $post->comments, 'id' => $post->id])
                <div class="comment-val">
                    <div class="card-body">
                        <form method="post" action="{{ route('comment.add') }}" enctype="multipart/form-data" id="comment-field">
                        <h5>Leave a comment</h5>
                        {{ csrf_field() }}
                        @include('includes.errors')
                            <div class="card transparent nosh bdr">
                                <div class="card-content">
                                    <div class="row margin-0">
                                        <div class="input-wrapper col s12 m12 l6 xl6">
                                            <div class="input-field margin-0">
                                                <input type="text" name="name" id="name" class="validate byline">
                                                <label for="title">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="input-wrapper col s12 m12 l6 xl6">
                                            <div class="input-field margin-0">
                                                <input type="email" name="email" id="email" class="validate byline">
                                                <label for="title">Email</label>
                                            </div>
                                        </div>
                                        <div class="input-wrapper col s12 m12 l12 xl12">
                                            <div class="input-field margin-0">
                                            <textarea name="comment" style="height: 12vh;" id="comment" class="validate materialize-textarea byline"></textarea>
                                                <label for="title">Comment</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $post->id }}" />

                                        <div class="col right">
                                            <button class="btn-flat white-text blue darken-3 waves-effect right-align" type="submit">Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.floating')
@endsection
