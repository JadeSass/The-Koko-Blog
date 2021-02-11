@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="card white dashboard-control nosh bdr">
        <div class="card-content white black-text pad-reduce">
            <i class="fa fa-info red-text left left-align"></i>
            {{ $error }}
        </div>
    </div>
    @endforeach
@endif
