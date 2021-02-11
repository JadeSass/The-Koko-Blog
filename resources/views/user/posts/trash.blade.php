@extends('layouts.app')

@section('content')
    <div class="wrap">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Trash </h5>
            </div>
        </nav>
        <div class="div-scroll">
            <form method="post" action="{{route('post.destroy')}}" enctype="multipart/form-data">
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
                    <th>Category</th>
                    <th>Date Deleted</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Restore</th>
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
                            <td>{{ $posts[$key]->title }} --- <b>Trashed</b></td>
                            <td>{{ $posts[$key]->category->name }}</td>
                            <td>{{ $posts[$key]->deleted_at}}</td>
                            <td><a href="{{ route('single.index', ['slug' => $posts[$key]->slug, 'id' => $posts[$key]->id]) }}" target="_blank" class="text-darken-4 red-text">View</a></td>
                            <td>
                                <a href="{{ route('post.edit', ['id' => $posts[$key]->id]) }}" class="blue-text text-darken-3">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('post.restore', ['id' => $posts[$key]->id]) }}" class="green-text text-darken-3">Restore</a>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <th colspan="5" class="center-align center">No Trashed Post yet.</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@stop
