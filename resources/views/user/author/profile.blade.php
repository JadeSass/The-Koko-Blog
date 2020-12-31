@extends('layouts.app')
@section('content')
<div class="wrap">
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <div class="col s12 m12 l6 xl6">
                <div class="fm-mgt">
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-header">
                            <h5 class="black-text center-align center">Update Profile</h5>
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
                                            <input type="text" name="name" id="name" class="validate" value="{{ $user-> name }}">
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="input-wrapper col s12 m12 l12 xl12">
                                        <div class="input-field">
                                            <input type="email" name="email" id="email" class="validate" value="{{ $user-> email }}">
                                            <label for="name">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="input-wrapper col s12 m12 l12 xl12">
                                        <div class="input-field">
                                            <input type="tel" name="number" id="number" class="validate" value="{{ $user->profile->number }}">
                                            <label for="name">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card nosh bdr">
                            <div class="card-content">
                                <div class="content-header">
                                    <p class="dgb-text"><i class="fa fa-link icon-top"></i> Links</p>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="input-wrapper col s12 m12 l12 xl12">
                                        <div class="input-field">
                                            <input type="text" name="facebook" id="facebook" class="validate" value="{{ $user->profile->facebook }}">
                                            <label for="name">Facebook Link</label>
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
                                            <span>Avatar</span>
                                            <input type="file" name="avatar" id="avatar">
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
                                    <p class="dgb-text"><i class="fa fa-key icon-top"></i> Password Management </p>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="input-wrapper col s12 m6 l12 xl12">
                                        <div class="input-field">
                                            <input type="password" name="password" id="password" class="validate">
                                            <label for="name">New Password</label>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12 xl12">
                                        <button class="btn green darken-3 col s12 m12 l12 xl12 waves-effect" type="submit"><i class="fa fa-save"></i> Update Profile</button>
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
                        <h5 class="black-text center-align center">Your Profile</h5>
                    </div>
                    <div class="card nosh bdr">
                        <div class="card-content">
                            <div class="col s12 l12 xl12 m12">
                                <div class="card-image center-align">
                                    <img src="{{ asset($user->profile->avatar) }}" lazy="loading" class="responsive-img circle center-align" style="height:100px; margin-left: auto; margin-right: auto; width: 20%; width:100px; border-radius:100px;" alt="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col s12 l12 xl12 m12">
                                <div class="card center-align">
                                    <div class="card-content">
                                        <span class="card-title"><b>{{$user->name}}</b></span>
                                        <p>{{$user->email}}</p>
                                        <p>{{$user->profile->number }}</p>
                                        <p>{{$user->profile->facebook }}</p>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-flat red darken-3 white-text">{{ __('Log Out') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
