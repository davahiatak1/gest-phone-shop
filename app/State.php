<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    public $fillable = [
    	'name'
    ];

    public function stock()
    {
        return $this->hasMany('App\Stock');
    }
}
