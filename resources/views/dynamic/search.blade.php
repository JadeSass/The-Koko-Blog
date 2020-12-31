@extends(layouts.frontend)

@section('content')
    @if($posts->count() > 0)
        @foreach($posts as $post)
            <div class="chip chip-search bdr transparent black-text">
                <a href="{{route('single.index', ['slug' => $post->slug, 'id' => $post->id])}}">{{$post->title}}</a>
            </div>
        @endforeach
        @else
        <div class="content center-align">
            <div class="chip red white-text">
                No result found
            </div>
        </div>
    @endif
@endsection