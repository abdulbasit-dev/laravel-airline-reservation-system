<?php

namespace App\Models;

use App\Traits\CreatedByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientCategory extends Model
{
    use HasFactory, SoftDeletes, CreatedByTrait;

    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return formatDate($value);
    }
}
