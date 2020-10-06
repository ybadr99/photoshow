@extends('layouts.app')

@section('content')
<div class="box box-primary col-md-10" style="margin-left:150px">
@if(count($albums) > 0)
    <?php
      $colcount = count($albums);
  	  $i = 1;
    ?>
    <div id="albums">
      <div class="row text-center">
        @foreach($albums as $album)
          @if($i == $colcount)
             <div class='medium-4 columns end' style="width: 33.3333333%">
               <a href="/albums/{{$album->id}}">
                  <img style="height: 200px" class="thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                </a>
               <br>
               <h4>{{$album->name}}</h4>
          @else
            <div class='medium-4 columns' style="width: 33%">
              <a href="/albums/{{$album->id}}">
                <img style="height: 200px" class="thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
              </a>
              <br>
              <h4>{{$album->name}}</h4>
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
<div>
@endsection
