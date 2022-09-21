<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Airline extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    protected $guarded = [];
}
