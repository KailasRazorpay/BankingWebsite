<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $fillable = [
        'name',
        'bank_id',
        'address',
        'ifsc'
    ];

    public function banks()
    {
        return $this->belongsTo('App\Bank');
    }
}
