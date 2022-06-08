<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'description', 'price'
    ];

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }
}
