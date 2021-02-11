@extends('layouts.app')

@section('content')
    <div class="wrap">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Posts <a href="{{ route('post.create') }}" class="black-text btn-flat bdr"> Add New</a></h5>
            </div>
        </nav>
        <div class="div-scroll">
            <form method="post" action="{{route('post.multiple')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button class="btn-flat darken-3 white-text red" type="submit" name="submit">Delete Selected</button>
                <table class="table striped">
                    <thead>
                    <th>
                        <p>
                            <label>
                                <input type="checkbox" id="checkAll">
                                <span>Select All</span>
                            </label>
                        </p>
                    </th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Trash</th>
                    </thead>
                    <tbody>
                    @if($posts->count() > 0)
                        @foreach($posts as $key => $value)
                        <tr>
                            <td>
                                <p>
                                    <label>
                                        <input name="id[]" type="checkbox" id="checkItem" value="{{$posts[$key]->id}}">
                                        <span>{{ $posts[$key]->id }}</span>
                                    </label>
                                </p>
                            </td>
                            <td>{{ $posts[$key]->title }} --- <b>Published</b></td>
                            <td>{{ $posts[$key]->category->name }}</td>
                            <td>{{ $posts[$key]->created_at}}</td>
                            <td><a href="{{ route('single.index', ['slug' => $posts[$key]->slug, 'id' => $posts[$key]->id]) }}" target="_blank" class="text-darken-4 blue-text">View</a></td>
                            <td>
                                <a href="{{ route('post.edit', ['id' => $posts[$key]->id]) }}" class="green-text text-darken-3">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('post.delete', ['id' => $posts[$key]->id]) }}" class="red-text text-darken-3"><i class="fa fa-trash-o"></i> Trash</a>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <th colspan="5" class="center-align">No Published Post yet.</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </form>
        </div>
    </div>

@stop
