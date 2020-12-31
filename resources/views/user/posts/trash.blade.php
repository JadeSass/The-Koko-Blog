@extends('layouts.app')
@section('content')
<div class="wrap container">
    <div class="row collapse-info">
        <div class="col s12 l12 m12 xl12">
            <div class="form-header">
                <h5 class="black-text center-align center">Find All Trashed Posts</h5>
            </div>
            <div class="card nosh bdr">
                <div class="card-content">
                    <div class="height-trash">
                        <table class="table striped">
                            <thead>
                            <th>Title</th>
                            <th>Restore</th>
                            <th>Delete</th>
                            </thead>
                            <tbody>
                            @if($posts->count() > 0)
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title}}</td>
                                    <td><a href="{{ route('post.restore', ['id' => $post->id]) }}" class="green-text text-darken-3"><b><i class="fa fa-refresh"></i>  Restore</b></a></td>
                                    <td><a href="{{ route('post.kill', ['id' => $post->id]) }}" class="red-text text-darken-3"><b>Delete</b></a></td>
                                </tr>
                                @endforeach

                                @else
                                <tr>
                                    <th colspan="5" class="center-align">No trashed posts yet.</th>
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
@stop
