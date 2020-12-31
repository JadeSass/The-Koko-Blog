@foreach($comments as $comment)

<div class="display-comment">
    <ul class="collection" style="border:none;padding:0px;">
        <li class="collection-item avatar">
            <img src="{{asset('uploads/avatar/default-avatar.jpg')}}" alt="user" class="circle ">
            <p><b>{{$comment->name}}</b> <i class="fa fa-clock-o"></i> about {{$comment->created_at->diffForHumans() }}</p>
            <div class="chip-card">
                <p class="chippy" >{{$comment->comment}}</p>
            </div>
            <a  id="reply-toggle" style="cursor:pointer;" class="reply-tog">Reply</a>
        </li>
    </ul>
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}" enctype="multipart/form-data" id="reply-field" class="drop-form reply-hide">
    {{ csrf_field() }}
        <div class="form-level">
            <div class="card-body">
                <h6>Leave a reply to {{$comment->name}}</h6>
                {{ csrf_field() }}
                @include('user.include.errors')
                    <div class="card transparent nosh bdr">
                        <div class="card-content">
                            <div class="row" style="margin-bottom: 0px;">
                                <div class="input-wrapper col s12 m12 l6 xl6">
                                    <div class="input-field margin-0">
                                        <input type="text" name="name" id="name" class="validate byline">
                                        <label for="title">Full Name</label>
                                    </div>
                                </div>
                                <div class="input-wrapper col s12 m12 l6 xl6">
                                    <div class="input-field margin-0">
                                        <input type="email" name="email" id="email" class="validate byline">
                                        <label for="title">Email</label>
                                    </div>
                                </div>
                                <div class="input-wrapper col s12 m12 l12 xl12">
                                    <div class="input-field margin-0">
                                        <textarea name="comment" style="height: 9vh;" id="comment" class="validate materialize-textarea byline"></textarea>
                                        <label for="title">Reply {{$comment->name}}</label>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $post->id }}" />
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                <div class="col right">
                                    <button class="btn-flat white-text blue darken-3 waves-effect right-align" type="submit">Reply {{$comment->name}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    @include('partials._comment_replies', ['comments' => $comment->replies])
</div>
@endforeach
