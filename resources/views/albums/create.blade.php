@extends('layouts.app')


@section('content')

<div class="box box-primary col-md-8" style="margin-left:150px">

    <div class="box-header">
        <h3 class="box-title">Create Album</h3>
    </div><!-- end of box header -->

    <div class="box-body ">
        <form action="{{route('albums.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                {{-- <label>Name</label> --}}
            <input type="text" name="name" class="form-control " value="{{old('name')}}" placeholder="Album Name">
            </div>
            <div class="form-group">
                {{-- <label>Album Descrition</label> --}}
                <textarea type="text" name="description" class="form-control " value="{{old('description')}}" placeholder="Album Descrition"></textarea>    
            </div>

            <div class="form-group">
                <input type="file" name="cover_image">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>

    </div>
</div>
@endsection