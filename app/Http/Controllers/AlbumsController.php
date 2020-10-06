<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
class AlbumsController extends Controller
{
    public function index(Album $album)
    {   
        $albums = $album->all();
        return view('albums.index',compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'cover_image'=>'image',
        ]); 

        //file name with ext
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        //just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get ext
        $Extension = $request->file('cover_image')->getClientOriginalExtension();

        //create new filename
        $filenameToStore = $filename . '_' . time() . '.' . $Extension;

        //upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        //create album
        $album = new Album;

        $album->name = $request->name;
        $album->description = $request->description;
        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success','Album Created');
    }


    public function show($id)
    {
        $album = Album::find($id);

        return view('albums.show')->with('album',$album);
    }

}
