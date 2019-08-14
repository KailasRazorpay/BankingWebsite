<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $fillable = [

        'name',
    ];

    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
