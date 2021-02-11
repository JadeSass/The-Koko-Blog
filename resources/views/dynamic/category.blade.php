@extends('layouts.frontend')

@section('content')
<div class="category-single">
    <div class="col xl12 l12 m12 s12">
        <div class="row">
            <div class="categories-action col xl12 l12 m12 s12">
                <div class="title">
                    <h4 class="blue-text text-darken-1">{{ $category->name }}</h4>
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
                <div class="loop-categ">
                @if($posts->count() > 0)
                @foreach($posts as $post)
                    <div class="col xl6 l6 m12 s12">
                        <div class="card nosh horizontal post-wrap">
                            <div class="card-image image-wrap category-img">
                                <img data-src="{{$post->image}}" alt="{{$post->title}}" class="lazy">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <a href="{{ route('single.index', ['slug' => $post->slug]) }}" class="text-darken-4 blue-text"><span class="card-title">{{$post->title}}</span></a>
                                    <div class="blue-text left view-text"><b>{{$post->user->name}}</b></div>
                                    <div class="right grey-text">{{$post->created_at->toFormattedDateString()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col s12 m12 l12 xl12 pagination">
                    {{$posts->links('vendor.pagination.default')}}
                </div>
                @else
                <h5 class="blue-text center">No post published to this page.</h5>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.floating')
@endsection
