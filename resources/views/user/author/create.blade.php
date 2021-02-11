@extends('layouts.app')
@section('content')
<div class="wrap">
    <nav class="transparent nosh">
        <div class="form-header">
            <h5 class="black-text left-align left">Add New User</h5>
        </div>
    </nav>
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <div class="fm-mgt">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    @include('user.include.errors')
                    <div class="row">
                        <div class="input-wrapper col s12 m12 l12 xl12">
                            <div class="input-field">
                                <input type="text" name="name" id="name" class="validate">
                                <label for="title">Full Name</label>
                            </div>
                        </div>
                        <div class="input-wrapper col s12 m12 l12 xl12">
                            <div class="input-field">
                                <input type="email" name="email" id="email" class="validate">
                                <label for="title">E-mail Address</label>
                            </div>
                        </div>
                        <div class="input-wrapper col s12 m12 l12 xl12">
                            <div class="input-field">
                                <input type="text" name="xprin" value="kokobloguser123" disabled class="validate">
                                <i class="grey-text">The password has the default value "kokobloguser123" for every user created. It is advisable to let the user change the default password before using this application.</i>
                                <label for="title">Password</label>
                            </div>
                        </div>
                        <button type="submit" class="btn-flat white-text blue darken-3">Add New User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
