<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['title', 'description', 'image', 'user_id'];    
    protected $appends = ['image_path'];

    // Author of item
    public function user() {
        return $this->belongsTo('App\User');
    }    

    // get full url for image
    public function getImagePathAttribute() {
        return asset('storage/images/'.$this->attributes['image']);
    }
}
