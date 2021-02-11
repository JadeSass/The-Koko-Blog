@extends('layouts.app')

@section('content')
    <div class="wrap">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Comment </h5>
            </div>
        </nav>
        <form method="post" action="{{route('comment.multiple')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="div-scroll">
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
                    <th>Author</th>
                    <th>Comment</th>
                    </thead>
                    <tbody>
                    @if($comments->count() > 0)
                        @foreach($comments as $key => $value)
                        <tr>
                            <td>
                                <p>
                                    <label>
                                        <input name="id[]" type="checkbox" id="checkItem" value="{{$comments[$key]->id}}">
                                        <span>{{ $comments[$key]->id }}</span>
                                    </label>
                                </p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <img src="{{asset('uploads/avatar/default-avatar.jpg')}}" height="40px" alt="">
                                    </li>
                                </ul>
                            <b>{{ $comments[$key]->name }}</b> {{ $comments[$key]->email }} <br> {{ $comments[$key]->created_at }}
                            </td>
                            <td>{{ $comments[$key]->comment }}<br> <a href="{{ route('comment.delete', ['id' => $comments[$key]->id]) }}" class="red-text text-darken-3"><b>Trash</b></a></td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <th colspan="5" class="center-align">No Published Comment yet.</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </form>
    </div>

@stop
