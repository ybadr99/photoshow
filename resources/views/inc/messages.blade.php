@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger col-md-6 " style="margin-left:150px">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success col-md-6 " style="margin-left:150px">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger col-md-6 " style="margin-left:150px">
        {{session('error')}}
    </div>
@endif