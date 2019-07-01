<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BannerAd;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BannerAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner_ads = BannerAd::all();

        return view('auth.bannerads.index')
            ->with('banner_ads', $banner_ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.bannerads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'image_desktop' => 'image|max:1999|required',
            'image_tablet' => 'image|max:1999|required',
            'image_mobile' => 'image|max:1999|required'
        ]);

        // desktop
        $desktop_filenameWithExt = $request->file('image_desktop')->getClientOriginalName();
        $desktop_filename = pathinfo($desktop_filenameWithExt, PATHINFO_FILENAME);
        $desktop_extension = $request->file('image_desktop')->getClientOriginalExtension();
        $desktop_filenameToStore = $desktop_filename.'_'.time().'.'.$desktop_extension;

        // tablet
        $tablet_filenameWithExt = $request->file('image_tablet')->getClientOriginalName();
        $tablet_filename = pathinfo($tablet_filenameWithExt, PATHINFO_FILENAME);
        $tablet_extension = $request->file('image_tablet')->getClientOriginalExtension();
        $tablet_filenameToStore = $tablet_filename.'_'.time().'.'.$tablet_extension;

        // mobile
        $mobile_filenameWithExt = $request->file('image_mobile')->getClientOriginalName();
        $mobile_filename = pathinfo($mobile_filenameWithExt, PATHINFO_FILENAME);
        $mobile_extension = $request->file('image_mobile')->getClientOriginalExtension();
        $mobile_filenameToStore = $mobile_filename.'_'.time().'.'.$mobile_extension;

        $banner_ad = new BannerAd;

        $banner_ad->name = $request->input('name');
        $banner_ad->url = $request->input('url');
        $banner_ad->image_desktop = $desktop_filenameToStore;
        $banner_ad->image_tablet = $tablet_filenameToStore;
        $banner_ad->image_mobile = $mobile_filenameToStore;

        $banner_ad->save();

        $desktop_image_path = $request->file('image_desktop')->storeAs('banner_ads/'.$banner_ad->id, $desktop_filenameToStore, ['disk' => 'public_uploads']);
        $tablet_image_path = $request->file('image_tablet')->storeAs('banner_ads/'.$banner_ad->id, $tablet_filenameToStore, ['disk' => 'public_uploads']);
        $mobile_image_path = $request->file('image_mobile')->storeAs('banner_ads/'.$banner_ad->id, $mobile_filenameToStore, ['disk' => 'public_uploads']);

        return redirect('admin/bannerads')->with('success', 'Banner Ad added');
    }

    public function activate(Request $request) {
        $reset = DB::table('banner_ads')->update(['is_active' => false]);

        $banner_ad = BannerAd::find($request->input('id'));

        if($banner_ad->is_active) {
            $banner_ad->is_active = false;
        } else {
            $banner_ad->is_active = true;
        }

        $banner_ad->save();

        return response()->json(array('result' => 'success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner_ad = BannerAd::find($id);

        return view('auth.bannerads.edit')->with('banner_ad', $banner_ad);
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
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required'
        ]);

        $banner_ad = BannerAd::find($id);

        $banner_ad->name = $request->input('name');
        $banner_ad->url = $request->input('url');

        // desktop
        if($request->file('image_desktop')) {
            $desktop_filenameWithExt = $request->file('image_desktop')->getClientOriginalName();
            $desktop_filename = pathinfo($desktop_filenameWithExt, PATHINFO_FILENAME);
            $desktop_extension = $request->file('image_desktop')->getClientOriginalExtension();
            $desktop_filenameToStore = $desktop_filename.'_'.time().'.'.$desktop_extension;

            Storage::disk('public_uploads')->delete('banner_ads/'.$id.'/'.$desktop_filenameToStore);
            $banner_ad->image_desktop = $desktop_filenameToStore;
            $desktop_image_path = $request->file('image_desktop')->storeAs('banner_ads/'.$id, $desktop_filenameToStore, ['disk' => 'public_uploads']);
        }

        // tablet
        if($request->file('image_tablet')) {
            $tablet_filenameWithExt = $request->file('image_tablet')->getClientOriginalName();
            $tablet_filename = pathinfo($tablet_filenameWithExt, PATHINFO_FILENAME);
            $tablet_extension = $request->file('image_tablet')->getClientOriginalExtension();
            $tablet_filenameToStore = $tablet_filename . '_' . time() . '.' . $tablet_extension;

            Storage::disk('public_uploads')->delete('banner_ads/'.$id.'/'.$tablet_filenameToStore);
            $banner_ad->image_tablet = $tablet_filenameToStore;
            $tablet_image_path = $request->file('image_tablet')->storeAs('banner_ads/'.$id, $tablet_filenameToStore, ['disk' => 'public_uploads']);
        }

        // mobile
        if($request->file('image_mobile')) {
            $mobile_filenameWithExt = $request->file('image_mobile')->getClientOriginalName();
            $mobile_filename = pathinfo($mobile_filenameWithExt, PATHINFO_FILENAME);
            $mobile_extension = $request->file('image_mobile')->getClientOriginalExtension();
            $mobile_filenameToStore = $mobile_filename . '_' . time() . '.' . $mobile_extension;

            Storage::disk('public_uploads')->delete('banner_ads/'.$id.'/'.$mobile_filenameToStore);
            $banner_ad->image_mobile = $mobile_filenameToStore;
            $mobile_image_path = $request->file('image_mobile')->storeAs('banner_ads/'.$id, $mobile_filenameToStore, ['disk' => 'public_uploads']);
        }

        $banner_ad->save();

        return redirect('admin/bannerads/edit/'.$id)->with('success', $banner_ad->name.' was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner_ad = BannerAd::find($id);
        File::deleteDirectory(public_path('uploads/banner_ads/'.$id));
        $banner_ad->delete();
        return redirect('/admin/bannerads')->with('success' ,'Banner Ad Deleted');
    }
}
