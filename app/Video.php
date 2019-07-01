<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = array('video_link', 'title', 'video_length', 'video_thumbnail');
}
