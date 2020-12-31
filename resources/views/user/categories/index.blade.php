@extends('layouts.app')
@section('content')
<div class="wrap">
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <div class="col s12 m12 l6 xl6">
                <div class="fm-mgt">
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-header">
                            <h5 class="black-text center-align center">Category board</h5>
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
                                    <div class="input-wrapper col s12 m6 l12 xl12">
                                        <div class="input-field">
                                            <input type="text" name="name" id="title" class="validate">
                                            <label for="title">Category Title</label>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12 xl12">
                                        <button class="btn green darken-3 col s12 m12 l12 xl12 waves-effect" type="submit"><i class="fa fa-save"></i> Save Category</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card nosh bdr">
                            <div class="card-content">
                                <div class="content-header">
                                    <p class="dgb-text"><i class="fa fa-tag icon-top"></i> All Categories </p>
                                </div>
                                <div class="divider" style="margin-bottom: 10px;"></div>
                                <div class="content-list">
                                    <!-- card counting -->
                                </div>
                                <div class="row">
                                @if($categories->count() > 0)
                                    @foreach($categories as $category)
                                        <div class="chip">{{ $category->name}}</div>
                                    @endforeach
                                @else
                                    <div class="center-align">No Categories yet.</div>
                                @endif
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
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @if($categories->count() > 0)
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->name}}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
