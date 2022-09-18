<?php

namespace App\Models;

use App\Traits\CreatedByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use HasFactory, SoftDeletes, CreatedByTrait;

    protected $guarded = [];


    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    protected static function boot()
    {
        parent::boot();
    }
}
