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
                    <div class="slider center">
                        <ul class="slides">
                            <li class="blue darken-4">
                                <h5 class="white-text" style="margin-bottom:0px;">Welcome to Koko Blog &#128077;</h5>
                                <i class="white-text">Na the koko we dey serve...</i>
                                <p class="white-text" style="margin-left:6px; margin-right:6px;" >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio, earum maxime natus nulla odio rem nostrum iusto! Tempora, ad eligendi.</p>
                                <a href="#" class="btn-flat green white-text">Learn More</a>
                            </li>
                            <li class="red darken-4">
                                <h5 class="white-text" style="margin-bottom:0px;">Koko News</h5>
                                <i class="white-text">Na the koko we dey serve...</i>
                                <p class="white-text" style="margin-left:6px; margin-right:6px;" >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio, earum maxime natus nulla odio rem nostrum iusto! Tempora, ad eligendi.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="read-action col xl9 l9 m12 s12">
                <div class="title">
                    <h5 class="blue-text text-darken-4">{{ $post->title }}</h5>
                    <p><i class="fa fa-clock-o"></i> Published {{ $post->created_at->diffForHumans() }}</p>
                </div>
                <div class="divider"></div>
                <div class="image-wrapper center-align center content-centered image-wrap">
                    <img data-src="{{ $post->image }}" alt="{{ $post->title }}" class="responsive-img lazy">
                </div>
                <div class="post-content">
                    {!! $post->content !!}
                </div>
                <div class="divider"></div>
                <h5 class="blue-text text-darken-4">{{$comments->count()}} @if($comments->count() > 1)  Comments @else Comment @endif</h5>
                @include('partials._comment_replies', ['comments' => $post->comments, 'id' => $post->id])
                <div class="comment-val">
                    <div class="card-body">
                        <form method="post" action="{{ route('comment.add') }}" enctype="multipart/form-data" id="comment-field">
                        <h5>Leave a comment</h5>
                        {{ csrf_field() }}
                        @include('user.include.errors')
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
@endsection
