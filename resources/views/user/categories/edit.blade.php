@extends('layouts.app')
@section('content')
<div class="wrap">
    <nav class="transparent nosh">
        <div class="form-header">
            <h5 class="black-text left-align left">Update Page</h5>
        </div>
    </nav>
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <div class="col s12 m12 l6 xl6">
                <div class="fm-mgt">
                    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        @include('user.include.errors')
                        <div class="page-form">
                            <div class="row">
                                <div class="input-wrapper col s12 m12 l12 xl12">
                                    <div class="input-field">
                                        <input type="text" name="name" id="title" class="validate" value="{{$category->name}}">
                                        <i class="grey-text">The name is how it appears on the site.</i>
                                        <label for="title">Page Title</label>
                                    </div>
                                </div>
                                <div class="input-wrapper col s12 m12 l12 xl12">
                                    <div class="input-field">
                                        <input type="text" name="" id="slug" class="disabled" disabled value="{{$category->id}}">
                                        <i class="grey-text">The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers and hyphens.</i>
                                        <label for="title">Category Id</label>
                                    </div>
                                </div>
                                <div class="input-wrapper col s12 m12 l12 xl12">
                                    <div class="input-field">
                                        <textarea name="content" style="height: 20vh;"  id="content" class="validate materialize-textarea white">{{$category->content}}</textarea>
                                        <i class="grey-text">The description is not prominent by default, however, some places may show it.</i>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                                <button class="btn-flat blue darken-3 waves-effect white-text" type="submit">Update Page</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="collapse-info">
                <div class="col s12 l6 m12 xl6">
                    <ul class="collapsible nosh">
                        <li class="active">
                            <div class="collapsible-header coll-table nosh white">
                                <table>
                                    <thead>
                                    <th>Name</th>
                                    <th>Description</th>
                                    </thead>
                                </table>
                            </div>
                            <div class="collapsible-body body-col white" >
                                <table class="table striped">
                                    <tbody>
                                    @if($categories->count() > 0)
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->name}}</td>
                                            <td>{{$category->content}}</td>
                                            <td><a href="{{ route('category.edit', ['id' => $category -> id])}}" class="green-text text-darken-3"><b>Edit</b></a></td>
                                            <td><a href="{{ route('category.delete', ['id' => $category -> id])}}" class="red-text text-darken-3"><b>Trash</b></a></td>
                                        </tr>
                                        @endforeach

                                        @else
                                        <tr>
                                            <th colspan="5" class="center-align">No categories yet.</th>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    </ul>
                    <i class="grey-text"><b>Note:</b><br> Deleting a category does not delete the post, instead posts that were only unsigned to the deleted category are set to a null category.</i>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
