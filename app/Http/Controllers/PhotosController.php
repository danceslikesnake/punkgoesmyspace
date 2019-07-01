<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;
use Illuminate\Support\Facades\Storage;
use App\BannerAd;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'photo' => 'required|image|max:1999'
        ]);

        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        $photo = new Photo;
        $photo->album_id = $request->album_id;
        $photo->photo = $filenameToStore;
        if($request->input('photo_description') != '')
            $photo->photo_description = $request->input('photo_description');

        $get_sort = Photo::select('sort')->where('album_id', $request->album_id)->orderByDesc('sort')->take(1)->get()->toArray();
        $photo->sort = $get_sort[0]['sort'] + 1;

        $photo->save();

        $path = $request->file('photo')->storeAs('albums/'.$request->album_id, $filenameToStore, ['disk' => 'public_uploads']);

        return redirect('/admin/albums/'.$request->album_id)->with('success', $filenameWithExt.' has been added');
    }

    public function show($id) {
        $photo = Photo::with('Album')->find($id);
        $instagram_metadata = array();
        if($photo->Album->album_type == 'instagram') {
            $data = json_decode($photo->instagram_metadata, true);
            $instagram_metadata = $data;
            unset($photo->instagram_metadata);
        }

        $other_albums = Album::with('Photos')
            ->take(2)
            ->whereNotIn('id', [$photo->album_id])
            ->get();
        $get_other_photos = Photo::select('id')
            ->where('album_id', '=', $photo->album_id)
            ->orderBy('sort', 'asc')
            ->get()
            ->toArray();
        $other_photos = $this->get_prev_next_photos($get_other_photos, $photo->id);

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.photos.show')
            ->with('photo', $photo)
            ->with('other_albums', $other_albums)
            ->with('other_photos', $other_photos)
            ->with('instagram_metadata', $instagram_metadata)
            ->with('banner_ad', $banner_ad);
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);

        if(Storage::disk('public_uploads')->delete('albums/'.$photo->album_id.'/'.$photo->photo)) {
            $photo->delete();

            return redirect('admin/albums/'.$photo->album_id)->with('success', 'File Deleted: '.$photo->photo);
        }
    }

    public function instagram_photo_hide($id) {
        $photo = Photo::find($id);

        $photo->instagram_is_visible = false;
        $photo->save();

        return redirect('admin/albums/'.$photo->album_id)->with('success', 'Image removed from feed');
    }

    public function edit($id) {
        $photo = Photo::find($id);

        return view('auth.photos.edit')->with('photo', $photo);
    }
    public function update(Request $request, $id) {
        $photo = Photo::find($id);

        if($request->file('photo')) {
            $this->validate($request, [
                'photo' => 'image|max:1999'
            ]);

            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // delete old photo
            Storage::disk('public_uploads')->delete('albums/'.$photo->album_id.'/'.$photo->photo);
            // store new photo
            $path = $request->file('photo')->storeAs('albums/'.$photo->album_id, $filenameToStore, ['disk' => 'public_uploads']);
            $photo->photo = $filenameToStore;
        }

        $photo->photo_description = $request->input('photo_description');

        $photo->save();

        return redirect('admin/photos/edit/'.$id)->with('success', 'Photo has been updated');
    }

    public function sort(Request $request){
        $sort_order = 1;
        $sorted_items = explode(',', $request->input('sorted_items'));
        foreach($sorted_items as $item) {
            $update = DB::table('photos')->where('id', $item)->update(['sort' => $sort_order]);
            $sort_order++;
        }
    }

    private function get_prev_next_photos($photos, $current_id) {
        $photos_count = count($photos);
        $result = array();
        foreach($photos as $db_id => $value) {
            if($value['id'] == $current_id) {
                // prev
                $prev = $db_id - 1;
                $next = $db_id + 1;

                if($prev < 0) {
                    $prev = $photos_count - 1;
                }
                if($next > $photos_count - 1) {
                    $next = 0;
                }
                $result['prev'] = $photos[$prev]['id'];
                $result['next'] = $photos[$next]['id'];
            }
        }
        return $result;
    }
}
