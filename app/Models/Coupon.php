<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Log;

class Coupon extends Model
{
    use HasFactory;

    // protected $with = ['user:id,name'];

    protected static function booted()
    {
        static::addGlobalScope('relation-load', function (Builder $builder) {
            $builder->with('user:id,name');
        });
    }

    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return formatDate($value);
    }

    // public function getDiscountAttribute($value)
    // {
    //     return lcfirst($this->discount_type) == "percentage" ? $value . "%" :  $value . " IQD";
    //     return formatDate($value);
    // }

    // public function getDiscountTypeAttribute($value)
    // {
    //     return Str::title($value);
    // }

    // public function getTypeAttribute($value)
    // {
    //     return Str::title(Str::replace("_", ' ', $value));
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function isExpired()
    {
        if ($this->end_date < now()) {
            return 0;
        }
        return 1;
    }
}
