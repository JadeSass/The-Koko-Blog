@extends('layouts.app')
@section('content')
<div class="wrap">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Add New Post</h5>
            </div>
        </nav>
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="col s12 m12 l8 xl8">
                    <div class="fm-mgt">
                        @include('user.include.errors')
                        <div class="row">
                            <div class="input-wrapper col s12 m12 l12 xl12">
                                <div class="input-field">
                                    <input type="text" name="title" id="title" class="validate">
                                    <label for="title">Title</label>
                                </div>
                            </div>
                            <div class="input-field file-field col s12 m12 l12 xl12">
                                <div class="btn nosh transparent bdr">
                                    <span class="black-text">Add Media</span>
                                    <input type="file" name="image" id="featured">
                                </div>
                                <div class="file-path-wrapper">
                                    <input type="text" class="file-path validate" style="border-bottom: none;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-wrapper col s12 m12 l12 xl12">
                                <div class="input-field">
                                    <textarea name="content" style="height: 575vh;" height="400px" id="content" class="validate materialize-textarea"></textarea>
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
                                        <div class="btn-flat bdr right">Preview</div>
                                    </div>
                                    <div class="author mt-10">
                                        <ul>
                                            <li class="mt-10"><i class="fa fa-save"></i> Status: <b>Ready</b></li>
                                            <li class="mt-10"><i class="fa fa-eye"></i> Visibility: <b>Public</b></li>
                                            <li class="mt-10"><i class="fa fa-calendar"></i> Publish: <b>Immediately</b></li>
                                            <li class="mt-10"><i class="fa fa-user-o"></i> Author: <b>{{ Auth::user()->name }}</b></li>
                                        </ul>
                                    </div>
                                    <div class="sv">
                                        <button class="btn-flat white-text blue right" type="submit">Publish</button>
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
                                                        <option value="{{ $category->id }}" class="brown-text">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="select">Select a Page to add Post<span class="red-text">*</span></label>
                                            </div>
                                        </span>
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
