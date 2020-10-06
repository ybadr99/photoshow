@extends('layouts.app')


@section('content')

<div class="box box-primary col-md-8" style="margin-left:150px">

    <div class="box-header">
        <h3 class="box-title">Upload Photo</h3>
    </div><!-- end of box header -->

    <div class="box-body ">
        <form action="{{route('photos.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="album_id" value="{{$album_id}}">

            <div class="form-group">
            <input type="text" name="title" class="form-control " value="{{old('title')}}" placeholder="Photo Title">
            </div>
            <div class="form-group">
                <textarea type="text" name="description" class="form-control " value="{{old('description')}}" placeholder="Photo Descrition"></textarea>    
            </div>

            <div class="form-group">
                <input type="file" name="photo">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>

    </div>
</div>
@endsection