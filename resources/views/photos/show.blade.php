@extends('layouts.app')

@section('content')
<div class="box box-primary col-md-10" style="margin-left:150px">
    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>

    <a href="/albums/{{$photo->album_id}}" class="btn btn-secondary">Go Back</a>
    <br><br><br>
    <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="" style="height: 300px;width:250px">
    <br><br><br>
    
    <form action="{{route("photos.destroy",$photo->id)}}" method="POST"> 
        @csrf
        @method('delete');
        <button class="btn btn-danger">Delete Photo</button>
        {{-- <input type="submit" class="btn btn-danger" value="Delete Photo" > --}}
    </form>
<hr>

<small>{{$photo->size}}</small>

<div>
@endsection