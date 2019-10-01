<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMenu extends Model
{
    public function menu() {
        return $this->belongsTo('App\Menu');
    }
}
