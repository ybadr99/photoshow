<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;


class PhotosController extends Controller
{
    public function create($album_id)
    {
        return view('photos.create')->with('album_id',$album_id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'photo'=>'image',
        ]); 

        //file name with ext
        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        //just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get ext
        $Extension = $request->file('photo')->getClientOriginalExtension();

        //create new filename
        $filenameToStore = $filename . '_' . time() . '.' . $Extension;

        //upload image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->album_id, $filenameToStore);

        // dd($request->album_id);

        //create album
        $photo = new Photo;

        $photo->title = $request->title;
        $photo->album_id = $request->album_id;
        $photo->description = $request->description;
        $photo->size = $request->file('photo')->getSize();
        $photo->photo = $filenameToStore;

        $photo->save();

        return redirect('/albums/'.$request->album_id)->with('success','Photo Created');
    }

    public function show($id)
    {
        $photo = Photo::find($id);

        return view('photos.show')->with('photo',$photo);
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);
        
        if(Storage::delete('public/photos/'.$photo->album_id. '/' .$photo->photo))
        {
            $photo->delete();

            return redirect('/')->with('success','Photo Deleted');
        }
    }
    
}
