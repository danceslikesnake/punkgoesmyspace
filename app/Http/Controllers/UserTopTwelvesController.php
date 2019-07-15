<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTopTwelve;
use Illuminate\Support\Facades\Storage;

class UserTopTwelvesController extends Controller
{
    public function cms_index() {
        $userTopTwelve = UserTopTwelve::orderBy('artist_name', 'asc')->get();

        return view('auth.usertoptwelve.cms_index')
            ->with('userTopTwelve', $userTopTwelve);
    }

    public function cms_edit($id) {
        $userTopTwelve = UserTopTwelve::find($id);

        return view('auth.usertoptwelve.cms_edit')
            ->with('userTopTwelve', $userTopTwelve);
    }

    public function cms_update(Request $request, $id) {
        $userTopTwelve = UserTopTwelve::find($id);

        if($request->hasFile('photo')) {
            $this->validate($request, [
                'photo' => 'image|max:1999'
            ]);

            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            Storage::disk('public_uploads')->delete('userTopTwelves/'.$userTopTwelve->photo);

            $path = $request->file('photo')->storeAs('userTopTwelves', $filenameToStore, ['disk' => 'public_uploads']);
            $userTopTwelve->photo = $filenameToStore;
        }

        $userTopTwelve->artist_name = $request->input('artist_name');
        $userTopTwelve->url = $request->input('url');

        $userTopTwelve->save();

        return redirect('admin/usertoptwelve')->with('success', 'Artist was edited');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'artist_name' => 'required',
            'photo' => 'required|image|max:1999',
            'url' => 'required'
        ]);

        $userTopTwelve = new UserTopTwelve;

        $userTopTwelve->artist_name = $request->artist_name;
        $userTopTwelve->url = $request->url;

        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $userTopTwelve->photo = $filenameToStore;

        $userTopTwelve->save();

        $path = $request->file('photo')->storeAs('userTopTwelves', $filenameToStore, ['disk' => 'public_uploads']);
        return redirect('admin/usertoptwelve')->with('success', 'Added to user top 12 list');
    }

    public function destroy($id) {
        $userTopTwelve = UserTopTwelve::find($id);

        if(Storage::disk('public_uploads')->delete('userTopTwelves/'.$userTopTwelve->photo)) {
            $userTopTwelve->delete();

            return redirect('admin/usertoptwelve/')->with('success', 'Artist deleted from list');
        }
    }
}
