<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $guarded = [];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function plane()
    {
        return $this->belongsTo(Plane::class)->withTrashed();
    }

    public function origin()
    {
        return $this->belongsTo(Airport::class, "origin_id");
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, "destination_id");
    }
}
