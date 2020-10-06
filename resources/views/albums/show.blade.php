@extends('layouts.app')

@section('content')
<div class="box box-primary col-md-10" style="margin-left:150px">
    <h3>{{$album->name}}</h3>
    <a href="/" class="btn btn-secondary">Go Back</a>
    <a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload Photo To Album</a>
</div>

<div class="box box-primary col-md-10 mt-4" style="margin-left:150px">
    @if(count($album->photos) > 0)
        <?php
          $colcount = count($album->photos);
            $i = 1;
        ?>
        <div id="photos">
          <div class="row text-center">
            @foreach($album->photos as $photo)
              @if($i == $colcount)
                 <div class='medium-4 columns end' style="width: 33.3333333%">
                   <a href="/photos/{{$photo->id}}">
                      <img style="height: 200px" class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                    </a>
                   <br>
                   <h4>{{$photo->title}}</h4>
              @else
                <div class='medium-4 columns' style="width: 33%">
                  <a href="/photos/{{$photo->id}}">
                    <img style="height: 200px" class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                  </a>
                  <br>
                  <h4>{{$photo->title}}</h4>
              @endif
                @if($i % 3 == 0)
              </div></div><div class="row text-center">
                @else
                </div>
              @endif
                <?php $i++; ?>
            @endforeach
          </div>
        </div>
      @else
        <p>No Albums To Display</p>
      @endif

@endsection