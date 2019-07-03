<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = array('name', 'cover_image');

    public function photos() {
        return $this->hasMany('App\Photo')->where('instagram_is_visible', '=', 1);
    }
}
