@extends('layouts.app')

@section('content')
    <div class="wrap">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Users <a href="{{ route('user.create') }}" class="black-text btn-flat bdr"> Add New</a></h5>
            </div>
        </nav>
        <form method="post" action="{{route('user.multiple')}}" enctype="multipart/form-data">
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
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Posts</th>
                    <th>Role</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $key => $value)
                        <tr>
                            <td>
                                <p>
                                    <label>
                                        <input name="id[]" type="checkbox" id="checkItem" value="{{$users[$key]->id}}">
                                        <span>{{ $users[$key]->id }}</span>
                                    </label>
                                </p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <img src="{{asset('uploads/avatar/default-avatar.jpg')}}" height="40px" alt="">
                                    </li>
                                </ul>
                                <b>{{ $users[$key]->name }}</b>
                            </td>
                            <td>{{ $users[$key]->email }}</td>
                            <td>{{$users[$key]->posts->count()}} @if($users[$key]->posts->count() > 1) Posts @else Post @endif</td>
                            <td>
                            @if($users[$key]->admin)
                                <a href="{{ route('user.not.admin', ['id' => $users[$key]->id]) }}" class="yellow-text text-darken-3"><i class="fa fa-user-secret"></i> Remove admin</a>
                            @else
                                <a href="{{ route('user.admin', ['id' => $users[$key]->id]) }}" class="green-text text-darken-3"><i class="fa fa-user-times"></i> Make admin</a>
                            @endif
                            </td>
                            <td>
                            @if(Auth::id() !== $users[$key]->id)
                                <a href="{{ route('user.delete', ['id' => $users[$key]->id]) }}" class="red-text text-darken-3"><i class="fa fa-trash-o"></i> Delete</a>
                            @endif
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <th colspan="5" class="center-align">No Active user yet.</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </form>
    </div>

@stop
