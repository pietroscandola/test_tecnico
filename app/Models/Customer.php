<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'surname', 'phone_number', 'email',
    ];

    public function offers()
    {
        return $this->belongsToMany('App\Models\Offer');
    }

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation', 'quotation_id');
    }
}
