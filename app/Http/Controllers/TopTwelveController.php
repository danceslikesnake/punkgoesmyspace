<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopTwelve;
use Illuminate\Support\Facades\Storage;
use Validator;

class TopTwelveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topTwelve = TopTwelve::all();

        return view('auth.toptwelve.index')->with('topTwelve', $topTwelve);
    }
    public function edit($id) {
        $topTwelve = TopTwelve::find($id);

        return view('auth.toptwelve.edit')->with('topTwelve', $topTwelve);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required|image|max:1999',
            'url' => 'required'
        ]);

        $toptwelve = new TopTwelve;

        $toptwelve->title = $request->title;
        $toptwelve->url = $request->url;

        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $toptwelve->photo = $filenameToStore;

        $toptwelve->save();

        $path = $request->file('photo')->storeAs('toptwelve', $filenameToStore, ['disk' => 'public_uploads']);
        return redirect('admin/toptwelve')->with('success', 'Added to list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $topTwelve = TopTwelve::find($id);

        if($request->file('photo')) {
            $this->validate($request, [
                'title' => 'required',
                'photo' => 'image|max:1999',
                'url' => 'required'
            ]);

            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            Storage::disk('public_uploads')->delete('toptwelve/'.$topTwelve->photo);

            $path = $request->file('photo')->storeAs('toptwelve', $filenameToStore, ['disk' => 'public_uploads']);
            $topTwelve->photo = $filenameToStore;
        } else {
            $this->validate($request, [
                'title' => 'required',
                'url' => 'required'
            ]);
        }

        $topTwelve->title = $request->title;
        $topTwelve->url = $request->url;

        $topTwelve->save();

        return redirect('admin/toptwelve/edit/'.$id)->with('success', $request->title.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toptwelve = TopTwelve::find($id);

        if(Storage::disk('public_uploads')->delete('toptwelve/'.$toptwelve->photo)) {
            $toptwelve->delete();

            return redirect('admin/toptwelve/')->with('success', 'Top Twelve list item deleted');
        }
    }
}
