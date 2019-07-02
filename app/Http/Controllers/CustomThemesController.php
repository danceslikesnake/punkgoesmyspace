<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BannerAd;

class CustomThemesController extends Controller
{
    public function profile_content() {
        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.profile.edit_content')
            ->with('banner_ad', $banner_ad);
    }

    public function profile_styles() {
        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.profile.edit_styles')
            ->with('banner_ad', $banner_ad);
    }
}
