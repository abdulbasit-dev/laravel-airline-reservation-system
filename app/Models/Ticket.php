<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
