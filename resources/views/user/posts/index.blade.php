@extends('layouts.app')
@section('content')
<div class="wrap">
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <div class="col s12 m12 l6 xl6">
                <div class="fm-mgt">
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-header">
                            <h4 class="black-text center-align center">Your post details</h4>
                        </div>
                        @include('user.include.errors')
                        <div class="card nosh bdr">
                            <div class="card-content">
                                <div class="content-header">
                                    <p class="dgb-text"><i class="fa fa-user-circle-o icon-top"></i> General</p>
                                </div>
                                <div class="divider"></div>
                                <div class="content-list">
                                    <!-- card counting -->
                                </div>
                                <div class="row">
                                    <div class="input-wrapper col s12 m12 l12 xl12">
                                        <div class="input-field">
                                            <input type="text" name="title" id="title" class="validate">
                                            <label for="title">Title</label>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12 xl12">
                                        <div class="input-field col s12">
                                            <select name="category_id" id="category" class="brown-text">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" class="brown-text">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="select">Select a Category to add Post<span class="red-text">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card nosh bdr">
                            <div class="card-content">
                                <div class="content-header">
                                    <p class="dgb-text"><i class="fa fa-file-image-o icon-top"></i> Image or file attachment</p>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="input-field file-field col s12">
                                        <div class="btn dgb nosh">
                                            <span>Image</span>
                                            <input type="file" name="image" id="image">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input type="text" class="file-path validate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card nosh bdr">
                            <div class="card-content">
                                <div class="content-header">
                                    <p class="dgb-text"><i class="fa fa-pencil icon-top"></i> Content Management </p>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="input-wrapper col s12 m6 l12 xl12">
                                        <div class="input-field">
                                            <textarea name="content" style="height: 15vh;" id="content" class="validate materialize-textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12 xl12">
                                        <button class="btn green darken-3 col s12 m12 l12 xl12 waves-effect" type="submit"><i class="fa fa-save"></i> Save Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row collapse-info">
                <div class="col s12 l6 m12 xl6">
                    <div class="form-header">
                        <h5 class="black-text center-align center">Action Panel</h5>
                    </div>
                    <div class="card nosh bdr">
                        <div class="card-content">
                            <div class="height-help">
                                <table class="table striped">
                                    <thead>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @if($posts->count() > 0)
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->title}}</td>
                                            <td><a href="{{ route('post.edit', ['id' => $post -> id])}}" class="green-text text-darken-3"><b>Edit</b></a></td>
                                            <td><a href="{{ route('post.delete', ['id' => $post -> id])}}" class="red-text text-darken-3"><b>Trash</b></a></td>
                                        </tr>
                                        @endforeach

                                        @else
                                        <tr>
                                            <th colspan="5" class="center-align">No posts yet.</th>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{ asset('js/ckeditor.js')}}"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#content' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
</script>
@stop
