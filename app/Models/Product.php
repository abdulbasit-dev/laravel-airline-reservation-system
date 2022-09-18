<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $with = ['category:id,name', 'supplier:id,name', 'addedBy:id,name'];

    protected $guarded = [];

    protected static function booted()
    {
        // static::addGlobalScope('load-relation', function (Builder $builder) {
        //     $builder->with(['brand:id,name', 'category:id,name', 'supplier:id,name', 'addedBy:id,name']);
        // });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'product_id');
    }
}
