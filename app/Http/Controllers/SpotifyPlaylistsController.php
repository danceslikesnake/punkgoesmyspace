<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpotifyPlaylist;

class SpotifyPlaylistsController extends Controller
{
    public function index() {
        $playlist = SpotifyPlaylist::find(1);

        return view('auth.spotifyplaylist.index')->with('playlist', $playlist);
    }
    public function update(Request $request, $id) {
        $this->validate($request, [
            'embed_code' => 'required'
        ]);

        $spotify_uri = preg_replace(
            array('/width="\d+"/i', '/height="\d+"/i'),
            array('width="100%"', sprintf('height="%d"', '248')),
            $request->embed_code);

        $playlist = SpotifyPlaylist::find($id);
        $playlist->spotify_uri = $spotify_uri;

        $playlist->save();

        return redirect('admin/spotifyplaylist')->with('success', 'Playlist updated');
    }
}
