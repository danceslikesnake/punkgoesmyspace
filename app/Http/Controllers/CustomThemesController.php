<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BannerAd;
use App\Profile;
use App\CustomTheme;
use App\SpotifyPlaylist;
use App\UserTopTwelve;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CustomThemesController extends Controller
{
    public function custom_url() {
        if(!isset($_COOKIE['pga_user_id']))
            return redirect('/');
        $starter_values = $this->starter_values();

        return view('pages.profile.edit_custom_url')
            ->with('banner_ad', $starter_values['banner_ad'])
            ->with('profile', $starter_values['profile'])
            ->with('custom_url', $starter_values['custom_theme']['custom_url'])
            ->with('profile_id', $starter_values['custom_theme']['id']);
    }

    public function profile_content() {
        if(!isset($_COOKIE['pga_user_id']))
            return redirect('/');
        $starter_values = $this->starter_values();

        return view('pages.profile.edit_content')
            ->with('banner_ad', $starter_values['banner_ad'])
            ->with('profile', $starter_values['profile'])
            ->with('custom_url', $starter_values['custom_theme']['custom_url'])
            ->with('profile_id', $starter_values['custom_theme']['id'])
            ->with('profile_content', json_decode($starter_values['custom_theme']['profile_content'], true));
    }

    public function profile_styles() {
        if(!isset($_COOKIE['pga_user_id']))
            return redirect('/');
        $starter_values = $this->starter_values();
        return view('pages.profile.edit_styles')
            ->with('banner_ad', $starter_values['banner_ad'])
            ->with('profile', $starter_values['profile'])
            ->with('custom_url', $starter_values['custom_theme']['custom_url'])
            ->with('profile_id', $starter_values['custom_theme']['id'])
            ->with('custom_styles', json_decode($starter_values['custom_theme']['profile_theme'], true));
    }

    public function profile_toptwelve() {
        $availableTopTwelves = UserTopTwelve::orderBy('artist_name', 'asc')->get();

        if(!isset($_COOKIE['pga_user_id']))
            return redirect('/');
        $starter_values = $this->starter_values();

        return view('pages.profile.edit_top_twelve')
            ->with('banner_ad', $starter_values['banner_ad'])
            ->with('profile', $starter_values['profile'])
            ->with('custom_url', $starter_values['custom_theme']['custom_url'])
            ->with('profile_id', $starter_values['custom_theme']['id'])
            ->with('availableTopTwelveList', $availableTopTwelves)
            ->with('selectedArtists', json_decode($starter_values['custom_theme']['profile_top_twelve']), true);
    }

    public function spotify_playlist() {
        if(!isset($_COOKIE['pga_user_id']))
            return redirect('/');
        $spotifyPlayer = SpotifyPlaylist::find(1);
        $starter_values = $this->starter_values();

        return view('pages.profile.edit_spotify_playlist')
            ->with('banner_ad', $starter_values['banner_ad'])
            ->with('profile', $starter_values['profile'])
            ->with('profile_id', $starter_values['custom_theme']['id'])
            ->with('custom_url', $starter_values['custom_theme']['custom_url'])
            ->with('profile_spotify_embed', $starter_values['custom_theme']['profile_spotify_embed'])
            ->with('default_spotify_player', $spotifyPlayer);
    }

    public function update_custom_url(Request $request, $id) {
        $this->validate($request, [
            'custom_url' => 'required|unique:custom_themes,custom_url'
        ]);

        $custom_theme = CustomTheme::find($id);
        $custom_theme->custom_url = $request->input('custom_url');
        $custom_theme->save();

        return redirect('profile/edit/custom_url')->with('success', 'Custom Profile URL updated');
    }

    public function update_content(Request $request, $id) {
        $custom_theme = CustomTheme::find($id);
        $old_theme = json_decode($custom_theme->profile_content, true);

        switch($request->input('form_action')) {
            case 'reset':
                $custom_theme->profile_content = '';
                // delete old photo
                if(isset($old_theme['custom_profile_image']))
                    Storage::disk('public_uploads')->delete('themes/'.$id.'/'.$old_theme['custom_profile_image']);

                $result_message = 'Profile Content has been reset.';
                break;
            default:
            case 'save':
                $details_arr = array();
                foreach($request->input('details') as $key => $val) {
                    if($val != '')
                        $details_arr[$key] = $val;
                }
                $profile_info = array(
                    'name' => $request->input('name'),
                    'age' => $request->input('age'),
                    'quote' => $request->input('quote'),
                    'location' => $request->input('location'),
                    'mood' => $request->input('mood'),
                    'details' =>  $details_arr,
                    'custom_profile_image' => (isset($old_theme['custom_profile_image'])) ? $old_theme['custom_profile_image'] : ''
                );

                if($request->file('custom_profile_image')) {
                    $this->validate($request, [
                        'custom_profile_image' => 'image|max:1999'
                    ]);

                    $filenameWithExt = $request->file('custom_profile_image')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('custom_profile_image')->getClientOriginalExtension();
                    $filenameToStore = $filename.'_'.time().'.'.$extension;

                    // delete old photo
                    if(isset($old_theme['custom_profile_image']))
                        Storage::disk('public_uploads')->delete('themes/'.$id.'/'.$old_theme['custom_profile_image']);

                    $path = $request->file('custom_profile_image')->storeAs('themes/'.$id, $filenameToStore, ['disk' => 'public_uploads']);

                    $profile_info['custom_profile_image'] = $filenameToStore;
                }

                $custom_theme->profile_content = json_encode($profile_info);
                $result_message = 'Profile Content has been updated.';
                break;
        }

        $custom_theme->save();

        return redirect('profile/edit/content')->with('success', $result_message);
    }

    public function update_spotify_playlist(Request $request, $id) {
        $custom_theme = CustomTheme::find($id);

        switch($request->input('form_action')) {
            case 'reset':
                $custom_theme->profile_spotify_embed = '';

                $response_message = 'Spotify Playlist was resset.';
                break;
            default:
            case 'save':
                $spotify_uri = preg_replace(
                    array('/width="\d+"/i', '/height="\d+"/i'),
                    array('width="100%"', sprintf('height="%d"', '248')),
                    $request->input('spotify_embed'));
                $custom_theme->profile_spotify_embed = $spotify_uri;

                $response_message = 'Spotify Playlist was updated';
                break;
        }

        $custom_theme->save();

        return redirect('profile/edit/spotify_playlist')->with('success', $response_message);
    }

    public function update_styles(Request $request, $id) {
        $custom_theme = CustomTheme::find($id);
        $old_theme = json_decode($custom_theme->profile_theme, true);

        switch($request->input('form_action')) {
            case 'save':
                $styles = array(
                    'content_bg_color' => ($request->input('content_bg_color')) ? $request->input('content_bg_color') : null,
                    'general_text_color' => ($request->input('general_text_color')) ? $request->input('general_text_color') : null,
                    'general_link_color' => ($request->input('general_link_color')) ? $request->input('general_link_color') : null,
                    'main_bg_color' => ($request->input('main_bg_color')) ? $request->input('main_bg_color') : null,
                    'main_bg_fill' => ($request->input('main_bg_fill')) ? $request->input('main_bg_fill') : null,
                    'main_bg_position' => ($request->input('main_bg_position')) ? $request->input('main_bg_position') : null,
                    'main_bg_fixed' => ($request->input('main_bg_fixed')) ? $request->input('main_bg_fixed') : null,
                    'header_bg' => ($request->input('header_bg')) ? $request->input('header_bg') : null,
                    'header_scrim' => ($request->input('header_scrim')) ? $request->input('header_scrim') : null,
                    'header_text_color' => ($request->input('header_text_color')) ? $request->input('header_text_color') : null,
                    'left_module_table_base_color' => ($request->input('left_module_table_base_color')) ? $request->input('left_module_table_base_color') : null,
                    'left_module_header_text_color' => ($request->input('left_module_header_text_color')) ? $request->input('left_module_header_text_color') : null,
                    'left_module_icon_color' => ($request->input('left_module_icon_color')) ? $request->input('left_module_icon_color') : null,
                    'left_module_table_left_column_color' => ($request->input('left_module_table_left_column_color')) ? $request->input('left_module_table_left_column_color') : null,
                    'left_module_table_left_column_text_color' => ($request->input('left_module_table_left_column_text_color')) ? $request->input('left_module_table_left_column_text_color') : null,
                    'left_module_table_right_column_color' => ($request->input('left_module_table_right_column_color')) ? $request->input('left_module_table_right_column_color') : null,
                    'left_module_table_right_column_text_color' => ($request->input('left_module_table_right_column_text_color')) ? $request->input('left_module_table_right_column_text_color') : null,
                    'right_module_table_base_color' => ($request->input('right_module_table_base_color')) ? $request->input('right_module_table_base_color') : null,
                    'right_module_table_header_text_color' => ($request->input('right_module_table_header_text_color')) ? $request->input('right_module_table_header_text_color') : null,
                    'main_bg_image' => (isset($old_theme['main_bg_image']) && $old_theme['main_bg_image'] != '') ? $old_theme['main_bg_image'] : null
                );

                if($request->hasFile('main_bg_image')) {

                    $this->validate($request, [
                        'main_bg_image' => 'image|max:1999'
                    ]);

                    $filenameWithExt = $request->file('main_bg_image')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('main_bg_image')->getClientOriginalExtension();
                    $filenameToStore = $filename.'_'.time().'.'.$extension;

                    // delete old photo
                    if(isset($old_theme['main_bg_image']))
                        Storage::disk('public_uploads')->delete('themes/'.$id.'/'.$old_theme['main_bg_image']);

                    $path = $request->file('main_bg_image')->storeAs('themes/'.$id, $filenameToStore, ['disk' => 'public_uploads']);

                    $styles['main_bg_image'] = $filenameToStore;
                }

                $custom_theme->profile_theme = json_encode($styles);
                $response_message = 'Profile Styles were updated';
                break;
            case 'reset':
                $custom_theme->profile_theme = null;
                $response_message = 'Profile styles were reset';
                break;
        }

        $custom_theme->save();

        return redirect('profile/edit/styles')->with('success', $response_message);
    }

    public function update_user_top_twelve(Request $request, $id) {
        $custom_theme = CustomTheme::find($id);

        switch($request->input('form_action')) {
            case 'save':
                $artist_array = array();
                foreach($request->input('userTopTwelve') as $artist) {
                    if($artist != '') {
                        array_push($artist_array, $artist);
                    }
                }

                $custom_theme->profile_top_twelve = json_encode($artist_array);
                $response_message = 'Top artists updated';
                break;
            case 'reset':
                $custom_theme->profile_top_twelve = null;
                $response_message = 'Top artists reset';
                break;
        }

        $custom_theme->save();

        return redirect('profile/edit/toptwelve')->with('success', $response_message);
    }

    private function starter_values() {
        $profile = Profile::find(1);
        $profile->details = explode("\n", $profile->details);

        $encrypter = app(\Illuminate\Contracts\Encryption\Encrypter::class);
        $user = $encrypter->decrypt($_COOKIE['pga_user_id']);
        $custom_theme = CustomTheme::where('cookie_id', '=', $user)->first();

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return array(
            'profile' => $profile,
            'custom_theme' => $custom_theme,
            'banner_ad' => $banner_ad
        );
    }
}
