@extends('layouts.app')

@section('content')
    <div class="wrap">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Deactivated Adverts</h5>
            </div>
        </nav>
        <div class="div-scroll">
            <form method="post" action="{{route('advert.trashed')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button class="btn-flat darken-3 white-text red" type="submit" name="submit">Permanently Stop Ads</button>
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
                    <th>Image</th>
                    <th>Link</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Restore</th>
                    <th>Trash</th>
                    </thead>
                    <tbody>
                    @if($adverts->count() > 0)
                        @foreach($adverts as $key => $value)
                        <tr>
                            <td>
                                <p>
                                    <label>
                                        <input name="id[]" type="checkbox" id="checkItem" value="{{$adverts[$key]->id}}">
                                        <span>{{ $adverts[$key]->id }}</span>
                                    </label>
                                </p>
                            </td>
                            <td>{{ $adverts[$key]->name }} --- <b>Deactivated</b></td>
                            <td><img src="{{ asset($adverts[$key]->image) }}" height="20px" width="20px" alt=""></td>
                            <td>{{ $adverts[$key]->link }}</td>
                            <td>{{ $adverts[$key]->ads_type }}</td>
                            <td>{{ $adverts[$key]->created_at}}</td>
                            <td>{{ $adverts[$key]->ends_at }}</td>
                            <td>
                                <a href="{{ route('advert.restore', ['id' => $adverts[$key]->id]) }}" class="green-text text-darken-3">Restore</a>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <th colspan="5" class="center-align">No Deactivated Advert yet.</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </form>
        </div>
    </div>

@stop
