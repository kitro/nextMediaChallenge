<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Author of item
    public function user() {
        return $this->hasOne('App\User');
    }    
}
