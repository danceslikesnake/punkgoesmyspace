<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\BannerAd;

class AlbumsController extends Controller
{
    /**
     * WEB METHODS
     *
     */
    public function index() {
        $albums = Album::with('Photos')->get();

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.albums.index')
            ->with('albums', $albums)
            ->with('banner_ad', $banner_ad);
    }

    public function show($id) {
        $album = Album::find($id);
        if($album->album_type == 'instagram') {
            $photos = Photo::where([['album_id', '=', $id], ['instagram_is_visible', '=', '1']])->orderBy('instagram_created_at', 'DESC')->paginate(16);
        } else {
            $photos = Photo::where([['album_id', '=', $id], ['instagram_is_visible', '=', '1']])->orderBy('sort', 'asc')->paginate(16);
        }

        $instagram_metadata = array();

        if($album->album_type == 'instagram') {
            foreach($photos as $photo) {
                $data = json_decode($photo->instagram_metadata, true);
                $instagram_metadata[$photo->instagram_id] = $data;
                unset($photo->instagram_metadata);
            }
        }

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.albums.show')
            ->with('album', $album)
            ->with('photos', $photos)
            ->with('instagram_metadata', $instagram_metadata)
            ->with('banner_ad', $banner_ad);
    }

    /**
     * ADMIN METHODS
     *
     */
    public function cms_index() {
        $albums = Album::with('Photos')->get();

        return view('auth.albums.index')->with('albums', $albums);
    }

    public function cms_show($id) {
        $album = Album::with(['Photos' => function($q) { $q->orderBy('sort', 'asc');}])->find($id);
        $instagram_metadata = array();

        if($album->album_type == 'instagram') {
            foreach($album->Photos as $photo) {
                $data = json_decode($photo->instagram_metadata, true);
                $instagram_metadata[$photo->instagram_id] = $data;
                unset($photo->instagram_metadata);
            }
        }

        //print_r($instagram_metadata);
        return view('auth.albums.show')
            ->with('album', $album)
            ->with('instagram_metadata', $instagram_metadata);
    }

    public function create() {
        return view('auth.albums.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999',
            'instagram_hashtag' => 'required_if:album_type,instagram'
        ]);

        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        $album = new Album;
        $album->name = $request->input('name');
        $album->cover_image = $filenameToStore;
        $album->album_type = $request->input('album_type');

        if($album->album_type == 'instagram') {
            $album->instagram_hashtag = $request->input('instagram_hashtag');
        }

        $album->save();

        $path = $request->file('cover_image')->storeAs('albums/'.$album->id, $filenameToStore, ['disk' => 'public_uploads']);

        return redirect('/admin/albums')->with('success', 'Album Created');
    }

    public function edit($id) {
        $album = Album::find($id);

        return view('auth.albums.edit')->with('album', $album);
    }

    public function update(Request $request, $id) {
        $album = Album::find($id);

        if($request->file('cover_image')) {
            $this->validate($request, [
                'name' => 'required',
                'cover_image' => 'image|max:1999'
            ]);

            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // delete old photo
            Storage::disk('public_uploads')->delete('albums/'.$id.'/'.$album->cover_image);
            // store new photo
            $path = $request->file('cover_image')->storeAs('albums/'.$id, $filenameToStore, ['disk' => 'public_uploads']);
            $album->cover_image = $filenameToStore;
        } else {
            $this->validate($request, [
                'name' => 'required'
            ]);
        }
        $album->name = $request->input('name');
        if($album->album_type == 'instagram') {
            $album->instagram_hashtag = $request->input('instagram_hashtag');
        }
        $album->save();

        return redirect('admin/albums/edit/'.$id)->with('success', $album->name.' was updated');
    }

    public function destroy($id) {
        $album = Album::find($id);
        $album->photos()->delete();
        $album->delete();

        File::deleteDirectory(public_path('uploads/albums/'.$id));

        return redirect('/admin/albums')->with('success', 'Album deleted');
    }
}
