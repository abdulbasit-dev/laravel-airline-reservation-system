<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CascadeSoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['expenses'];

    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return formatDate($value);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id')
            ->withDefault([
                'name' => 'User Deleted',
            ]);
    }

    public function expenses()
    {
        return $this->hasMany(CarExpense::class);
    }
}
