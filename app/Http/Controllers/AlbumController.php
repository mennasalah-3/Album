<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $albums = $user->albums;
        return view('user.album', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
//        if($request->has('images')){
//            foreach (request()->images as $image) {
////                $file = $image->store($folder_name);
//                $this->files()->create(['path' => $file]);
//            }
//        }
        $requested_data = $request->except('images');
        $user = auth()->user();
        $album = $user->albums()->create($requested_data);
//        return $album;
        if ($album)
            return redirect()->route('albums.index')->with(['success' => "The album is created successfully !"]);
        else
            return redirect()->route('albums.index')->with(['success' => "something wrong ! "]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function add_photo($id)
    {
//        return $id;
        $album = Album::find($id);
//        return $album;
        return view('user.add_photo', compact('album'));
    }

    public function store_photo(Request $request)
    {
//        dd($request->image);
        $album = Album::find($request->album_id);
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file_path = time() . '.' . $filename;
        $path = 'uploads';
        $request->image->move($path, $file_path);
        $image = $album->images()->create([
            'name' => $request->name,
            'album_id' => $request->album_id,
            'image' => $file_path
        ]);

        return redirect()->route('albums.show', $request->album_id)->with(['success' => "The photo is added successfully !"]);


    }

    public function show($id)
    {
        $album = Album::find($id);
//        foreach ($album->images as $image) {
//            echo $image->image;
//        }
        return view('user.show', compact('album'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $album = Album::find($id);
        return view('user.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        $album->update($request->all());
        return redirect()->route('albums.index')->with(['success' => "The album is updated successfully !"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete_album($id)
    {
        $album = Album::find($id);
        $data = compact('album');
        return response()->json(['status' => true, 'data' => $data]);
    }

    public function store_photos(Request $request, $id)
    {
        $album = Album::find($id);
        $new_album = Album::find($request->id);
        $images = $album->images;
        foreach ($images as $image) {

//            $request->image->move($path, $file_path);
            $image = $new_album->images()->create([
                'name' => $image->name,
                'album_id' => $new_album->id,
                'image' => $image->image
            ]);

        }
        return redirect()->route('albums.show', $new_album->id)->with('success', 'Photos moved successfully !');
    }

    public function delete_form($id)
    {
        $album = Album::find($id);

        return view('user.delete_album', compact('album'));
    }


    public function destroy(Request $request, $id)
    {
//        dd($id);
        $album = Album::find($id);
        if ($request->option == "delete") {
            $album->images()->delete();
            $album->delete();
        } else {
            return view('user.choose_album', compact('album'));
        }
        return redirect()->route('albums.index')->with(['success' => "The album is deleted successfully !"]);
    }
}
