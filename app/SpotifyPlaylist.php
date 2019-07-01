<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpotifyPlaylist extends Model
{
    protected $fillable = [
        'spotify_uri',
    ];
}
