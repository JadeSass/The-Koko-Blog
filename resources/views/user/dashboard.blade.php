@extends('layouts.app')

@section('content')
<div class="dashboard-jinx">
    <div class="wrap-jinx">
        <nav class="transparent nosh">
            <div class="form-header">
                <h5 class="black-text left-align left">Dashboard Management</h5>
            </div>
        </nav>
        <div class="col s12 m12 l12 xl12">
            <div class="stat_info">
                <div class="row">
                    <div class="col s12 m12 l9 xl9">
                        <div class="page_info row">
                            <div class="col s12 m6 l4 xl4 stat_content">
                                <div class="card-panel nosh info-text blue-bdr-l blue lighten-4 z-depth-1">
                                    <div class="row valign-wrapper info-content">
                                        <div class="col s4">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </div>
                                        <div class="col s8">
                                            <span class="black-text opt-title"><a href="#">{{$post_count->count()}} @if($post_count->count() > 1)Posts @else Post @endif </a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l4 xl4">
                                <div class="card-panel nosh info-text blue-bdr-l red lighten-4 z-depth-1">
                                    <div class="row valign-wrapper info-content">
                                        <div class="col s4">
                                            <i class="fa fa-trash-o fa-2x"></i>
                                        </div>
                                        <div class="col s8">
                                            <span class="black-text opt-title"><a href="#">{{$trash_count->count()}} Trash Post</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l4 xl4">
                                <div class="card-panel nosh info-text blue-bdr-l green lighten-4 z-depth-1">
                                    <div class="row valign-wrapper info-content">
                                        <div class="col s4">
                                            <i class="fa fa-comment-o fa-2x"></i>
                                        </div>
                                        <div class="col s8">
                                            <span class="black-text opt-title"><a href="#">{{$comment_count->count()}} @if($comment_count->count() > 1)Comments @else Comment @endif</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l4 xl4">
                                <div class="card-panel nosh info-text blue-bdr-l pink lighten-4 z-depth-1">
                                    <div class="row valign-wrapper info-content">
                                        <div class="col s4">
                                            <i class="fa fa-newspaper-o fa-2x"></i>
                                        </div>
                                        <div class="col s8">
                                            <span class="black-text opt-title"><a href="#">{{$advert_count->count()}} @if($advert_count->count() > 1)Adverts @else Advert @endif</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l4 xl4">
                                <div class="card-panel nosh info-text blue-bdr-l purple lighten-4 z-depth-1">
                                    <div class="row valign-wrapper info-content">
                                        <div class="col s4">
                                            <i class="fa fa-user-o fa-2x"></i>
                                        </div>
                                        <div class="col s8">
                                            <span class="black-text opt-title"><a href="#">{{$user_count->count()}} @if($user_count->count() > 1)Users @else User @endif</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l4 xl4">
                                <div class="card-panel nosh info-text blue-bdr-l pink lighten-4 z-depth-1">
                                    <div class="row valign-wrapper info-content">
                                        <div class="col s4">
                                            <i class="fa fa-tag fa-2x"></i>
                                        </div>
                                        <div class="col s8">
                                            <span class="black-text opt-title"><a href="#">{{$category_count->count()}} @if($category_count->count() > 1)Categories @else Category @endif</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_stat col s12 m12 l12 xl12">
                        <h5>Recent Post</h5><br>
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
                                        <th>Category</th>
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
                    </div>
                    <div class="col s12 m12 l3 xl3">
                        <div class="comment_stat">
                        <h5>Latest Comments <br><br></h5>
                            @if($comments->count() > 0)
                                @foreach($comments as $key => $value)
                                    <div class="chip-card grey white-text">{{ $comments[$key]->comment }} <a href="{{ route('comment.delete', ['id' => $comments[$key]->id]) }}" class="red-text text-darken-3"><b>Trash</b></a></div>
                                @endforeach
                            @else
                                <h5 colspan="5" class="center-align">No Published Comment yet.</h5>
                            @endif
                        </div>
                        <div class="user_stat">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
