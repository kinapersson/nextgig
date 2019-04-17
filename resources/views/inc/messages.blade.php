@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
        <div class="alert alert-success col-md-6 offset-md-3">
            <span>{{session('success')}}</span>
        </div>
@endif

@if(session('error'))
        <div class="alert alert-danger col-md-6 offset-md-3">
            <span>{{session('error')}}</span>
        </div>
@endif

    