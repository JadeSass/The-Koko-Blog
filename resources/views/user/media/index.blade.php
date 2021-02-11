@extends('layouts.app')
@section('content')
<div class="wrap">
    <nav class="transparent nosh">
        <div class="form-header">
            <h5 class="black-text left-align left">Media</h5>
        </div>
    </nav>
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            @foreach($images as $image)
            <div class="col s4 m3 l2 xl2">
                <div class="card nosh bdr media-wrap">
                    <div class="card-image image-wrap">
                        <img src="{{ asset( 'uploads/posts/' . $image->getFilename() ) }}" alt="post" class="img-responsive">
                        <span class="card-title img-close"><a href="{{ route('media.delete', ['url' => $image->getFilename()]) }}" class="red-text text-darken-3"><i class="fa fa-trash"></i></a></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop
