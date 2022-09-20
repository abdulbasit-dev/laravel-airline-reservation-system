<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }
}
