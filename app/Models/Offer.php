<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name', 'price', 'description',
    ];

    public function customers()
    {
        return $this->belongsToMany('App\Models\Customer');
    }
}
