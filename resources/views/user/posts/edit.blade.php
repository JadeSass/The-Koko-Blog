@extends('layouts.app')
@section('content')
<div class="wrap">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Update Post</h5>
            </div>
        </nav>
<form action="{{route('post.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <div class="col s12 m12 l8 xl8">
                <div class="fm-mgt">
                    @include('user.include.errors')
                    <div class="row">
                        <div class="input-wrapper col s12 m12 l12 xl12">
                            <div class="input-field">
                                <input type="text" name="title" id="title" class="validate" value="{{$post->title}}">
                                <label for="title">Title</label>
                            </div>
                        </div>
                        <div class="input-field file-field col s12 m12 l12 xl12">
                            <div class="btn nosh transparent bdr">
                                <span class="black-text">Add Media</span>
                                <input type="file" name="image" id="featured">
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" class="file-path validate" style="border-bottom: none;" value="{{$post->image}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-wrapper col s12 m12 l12 xl12">
                            <div class="input-field">
                                <textarea name="content" style="height: 575vh;" height="400px" id="content" class="validate materialize-textarea">{{$post->content}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row collapse-info">
                <div class="col s12 m12 l4 xl4">
                    <ul class="collapsible nosh">
                        <li class="active">
                            <div class="collapsible-header collapsible-icon nosh white">
                                Publish <i class="fa fa-caret-down right"></i>
                            </div>
                            <div class="collapsible-body body-col white" >
                                <div class="buton-d">
                                    <div class="btn-flat bdr">Save Draft</div>
                                    <div class="btn-flat bdr right"><a href="{{ route('single.index', ['slug' => $post->slug, 'id' => $post->id]) }}" target="_blank" class="text-darken-4 center-align center black-text">Preview</a></div>
                                </div>
                                <div class="author mt-10">
                                    <ul>
                                        <li class="mt-10"><i class="fa fa-save"></i> Status: <b>Ready to update</b></li>
                                        <li class="mt-10"><i class="fa fa-eye"></i> Visibility: <b>Public</b></li>
                                        <li class="mt-10"><i class="fa fa-calendar"></i> Publish Date: <b>{{$post->created_at}}</b></li>
                                        <li class="mt-10"><i class="fa fa-user-o"></i> Author: <b>{{ Auth::user()->name }}</b></li>
                                    </ul>
                                </div>
                                <div class="sv">
                                    <button class="btn-flat white-text blue right" type="submit">Publish Edit</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="pg-cat" style="padding-top: 15px;">
                        <ul class="collapsible nosh">
                            <li class="active">
                                <div class="collapsible-header collapsible-icon nosh white">
                                    Pages/Categories <i class="fa fa-caret-down right"></i>
                                </div>
                                <div class="collapsible-body body-col-page white" >
                                    <span>
                                        <div class="input-field col s12">
                                            <select name="category_id" id="category" class="brown-text">
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" class="brown-text" @if($post->category->id == $category->id)
                                                    selected
                                                @endif
                                                >{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="select">Select a Page to add Post<span class="red-text">*</span></label>
                                        </div>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pg-tag" style="padding-top: 15px;">
                        <ul class="collapsible nosh">
                            <li>
                                <div class="collapsible-header collapsible-icon nosh white">
                                    Tags <i class="fa fa-caret-down right"></i>
                                </div>
                                <div class="collapsible-body body-tg white" >
                                    <span>Tags might have been deactivated by the blog admin contact the admin or send an email to admin@kokoblog.com for more information.</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{ asset('js/ckeditor.js')}}"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#content' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    })
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
</script>
@stop
