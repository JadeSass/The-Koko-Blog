@extends('layouts.app')
@section('content')
<div class="wrap">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Create New Ads</h5>
            </div>
        </nav>
    <form action="{{route('adverts.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="col s12 m12 l8 xl8">
                    <div class="fm-mgt">
                        @include('user.include.errors')
                        <div class="row">
                            <div class="input-wrapper col s12 m12 l12 xl12">
                                <div class="input-field">
                                    <input type="text" name="name" id="name" class="validate">
                                    <label for="name">Company Name</label>
                                </div>
                            </div>
                            <div class="input-field file-field col s12 m12 l12 xl12">
                                <div class="btn nosh transparent bdr">
                                    <span class="black-text">Ads Image</span>
                                    <input type="file" name="image" id="featured">
                                </div>
                                <div class="file-path-wrapper">
                                    <input type="text" class="file-path validate" style="border-bottom: none;">
                                </div>
                            </div>
                            <div class="input-wrapper col s12 m12 l12 xl12">
                                <div class="input-field">
                                    <input type="text" name="link" id="link" class="validate">
                                    <label for="link">Ads Link</label>
                                </div>
                            </div>
                            <span>
                                <div class="input-field col s12 m12 l12 xl12">
                                    <select name="ads_type" id="adstype" class="brown-text">
                                        <option value="Advertisement" class="brown-text">Advertisement 840 X 366px</option>
                                        <option value="Sponsored Post" class="brown-text">Sponsored Post 400 X 1200px</option>
                                        <option value="Sidebar Random" class="brown-text">Sidebar Random 400 X 1200px</option>
                                    </select>
                                    <label for="select">Select an Advert Type<span class="red-text">*</span></label>
                                </div>
                            </span>
                            <div class="input-wrapper col s12 m12 l12 xl12">
                                <div class="input-field">
                                    <input type="text" name="ends_at" id="date" class="datepicker">
                                    <label for="ends_at">Ads End Campaign</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-wrapper col s12 m12 l12 xl12">
                                <div class="input-field">
                                    <textarea name="description" id="content" class="validate materialize-textarea"></textarea>
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
                                    Ads Center<i class="fa fa-caret-down right"></i>
                                </div>
                                <div class="collapsible-body body-col white">
                                    <div class="author mt-10">
                                        <ul>
                                            <li class="mt-10"><i class="fa fa-save"></i> Status: <b>Ready</b></li>
                                            <li class="mt-10"><i class="fa fa-eye"></i> Visibility: <b>Public</b></li>
                                            <li class="mt-10"><i class="fa fa-calendar"></i> Publish: <b>Immediately</b></li>
                                            <li class="mt-10"><i class="fa fa-user-o"></i> Author: <b>{{ Auth::user()->name }}</b></li>
                                        </ul>
                                    </div>
                                    <div class="sv">
                                        <button class="btn-flat white-text blue right" type="submit">Publish Ads</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
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
