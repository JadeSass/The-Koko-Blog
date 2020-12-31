@extends('layouts.app')
@section('content')
<div class="wrap">
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <div class="col s12 m12 l6 xl6">
                <div class="fm-mgt">
                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-header">
                            <h4 class="black-text center-align center">Create a new user </h4>
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
                                            <input type="text" name="name" id="name" class="validate">
                                            <label for="title">Full Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card nosh bdr">
                            <div class="card-content">
                                <div class="content-header">
                                    <p class="dgb-text"><i class="fa fa-envelope-o icon-top"></i> Mail Address</p>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="input-wrapper col s12 m12 l12 xl12">
                                        <div class="input-field">
                                            <input type="email" name="email" id="email" class="validate">
                                            <label for="title">E-mail Address</label>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12 xl12">
                                        <button class="btn green darken-3 col s12 m12 l12 xl12 waves-effect" type="submit"><i class="fa fa-user-o"></i> Create User</button>
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
                            <div class="height-overall">
                                <table class="table striped">
                                    <thead>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Permission</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @if($users->count() > 0)
                                        @foreach($users as $user)
                                        <tr>
                                            <td><img src="{{ asset($user->profile->avatar) }}" lazy="loading" alt="{{ $user-> name}}" height="30px" width="30px" class="" style="border-radius: 30px;"></td>
                                            <td><b>{{ $user->name }}</b></td>
                                            <td>
                                            @if($user->admin)
                                                <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="yellow-text text-darken-3"><i class="fa fa-user-secret"></i> Remove permissions</a>
                                            @else
                                                <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="green-text text-darken-3"><i class="fa fa-user-times"></i> Make admin</a>
                                            @endif
                                            </td>
                                            <td>
                                            @if(Auth::id() !== $user->id)
                                                <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="red-text text-darken-3"><i class="fa fa-trash-o"></i> Delete</a>
                                            @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                        @else
                                        <tr>
                                            <th colspan="5" class="center-align">No user.</th>
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
