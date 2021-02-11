@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="card white info-control nosh bdr">
        <div class="card-content white black-text pad-reduce">
            <i class="fa fa-info red-text left left-align"></i>
            {{ $error }} <i class="fa fa-close red-text right close-info" style="cursor:pointer;"></i>
        </div>
    </div>
    @endforeach
@endif
