<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    protected $with = ['flight'];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
