<?php

namespace App\Http\Controllers;

use App\AlbumSingleVote;
use Cookie;
use Illuminate\Http\Request;
use App\Profile;
use App\Blog;
use App\TopTwelve;
use App\SpotifyPlaylist;
use App\BannerAd;
use App\CustomTheme;
use App\UserTopTwelve;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        /**
         * Check if we should show the voting module
         */
        $show_voting = true;
        $custom_theme = null;
        if(isset($_COOKIE['pga_user_id'])) {
            $encrypter = app(\Illuminate\Contracts\Encryption\Encrypter::class);
            $user_id = $encrypter->decrypt($_COOKIE['pga_user_id']);
            $check_votes = AlbumSingleVote::where('cookie_id', '=', $user_id)->get();
            if(count($check_votes) > 0) {
                $show_voting = false;
            }

            $get_custom_theme = CustomTheme::where('cookie_id', '=', $user_id)->first();

            $top_artists = null;
            if($get_custom_theme->profile_top_twelve) {
                $selected_artists = json_decode($get_custom_theme->profile_top_twelve, true);
                $top_artists = UserTopTwelve::whereIn('id', $selected_artists)->get();
            }

            $custom_theme = array(
                'id' => $get_custom_theme->id,
                'custom_url' => $get_custom_theme->custom_url,
                'content' => json_decode($get_custom_theme->profile_content, true),
                'spotify_uri' => $get_custom_theme->profile_spotify_embed,
                'styles' => json_decode($get_custom_theme->profile_theme, true),
                'topArtists' => $top_artists
            );
        }

        /**
         * Gather profile data
         */
        $profile = Profile::find(1);
        $profile->details = explode("\n", $profile->details);

        $blogs = Blog::orderBy('created_at', 'desc')->get()->take(5);

        $topTwelve = TopTwelve::all();

        $spotifyPlayer = SpotifyPlaylist::find(1);

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.profile.index')
            ->with('profile', $profile)
            ->with('blogs', $blogs)
            ->with('topTwelve', $topTwelve)
            ->with('spotifyPlayer', $spotifyPlayer)
            ->with('banner_ad', $banner_ad)
            ->with('show_voting', $show_voting)
            ->with('custom_theme', $custom_theme);
    }

    public function theme_index($id) {
        /**
         * Check if we should show the voting module
         */
        $show_voting = false;
        $get_custom_theme = CustomTheme::where('custom_url', '=', $id)->first();

        if($get_custom_theme) {
            $top_artists = null;
            if($get_custom_theme->profile_top_twelve) {
                $selected_artists = json_decode($get_custom_theme->profile_top_twelve, true);
                $top_artists = UserTopTwelve::whereIn('id', $selected_artists)->get();
            }

            $custom_theme = array(
                'id' => $get_custom_theme->id,
                'custom_url' => $get_custom_theme->custom_url,
                'content' => json_decode($get_custom_theme->profile_content, true),
                'spotify_uri' => $get_custom_theme->profile_spotify_embed,
                'styles' => json_decode($get_custom_theme->profile_theme, true),
                'topArtists' => $top_artists
            );
            if(isset($_COOKIE['pga_user_id'])) {
                $encrypter = app(\Illuminate\Contracts\Encryption\Encrypter::class);
                $user_id = $encrypter->decrypt($_COOKIE['pga_user_id']);
                $check_votes = AlbumSingleVote::where('cookie_id', '=', $user_id)->get();
                if(count($check_votes) > 0) {
                    $show_voting = false;
                }
            }
            /**
             * Gather profile data
             */
            $profile = Profile::find(1);
            $profile->details = explode("\n", $profile->details);

            $blogs = Blog::orderBy('created_at', 'desc')->get()->take(5);

            $topTwelve = TopTwelve::all();

            $spotifyPlayer = SpotifyPlaylist::find(1);

            $get_banner_ad = BannerAd::where('is_active', '1')->get();
            if(count($get_banner_ad) ==  0) {
                $banner_ad = null;
            } else {
                $banner_ad = $get_banner_ad[0];
            }

            return view('pages.profile.index')
                ->with('profile', $profile)
                ->with('blogs', $blogs)
                ->with('topTwelve', $topTwelve)
                ->with('spotifyPlayer', $spotifyPlayer)
                ->with('banner_ad', $banner_ad)
                ->with('show_voting', $show_voting)
                ->with('custom_theme', $custom_theme);
        } else {
            return redirect('/')->with('theme_error', 'Oops, we couldn\'t find the theme <strong>"'.$id.'"</strong>!');
        }
    }

    public function edit()
    {
        $profile = Profile::find(1);

        return view('auth.profile.edit')->with('profile', $profile);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        if($request->file('profile_photo')) {
            $this->validate($request, [
                'quote' => 'required',
                'age' => 'required',
                'address' => 'required',
                'mood' => 'required',
                'details' => 'required',
                'about_me' => 'required',
                'profile_photo' => 'image|max:1999'
            ]);

            $filenameWithExt = $request->file('profile_photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            Storage::disk('public_uploads')->delete('profile/'.$profile->profile_photo);

            $path = $request->file('profile_photo')->storeAs('profile', $filenameToStore, ['disk' => 'public_uploads']);
            $profile->profile_photo = $filenameToStore;
        } else {
            $this->validate($request, [
                'quote' => 'required',
                'age' => 'required',
                'address' => 'required',
                'mood' => 'required',
                'details' => 'required',
                'about_me' => 'required',
            ]);
        }

        $profile->quote = $request->input('quote');
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->mood = $request->input('mood');
        $profile->details = $request->input('details');
        $profile->about_me = $request->input('about_me');

        $profile->save();

        return redirect('admin/profile/edit')->with('success', 'The Profile has been updated!');
    }
}
