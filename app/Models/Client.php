<?php

namespace App\Models;

use App\Traits\CreatedByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes, CreatedByTrait;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(ClientCategory::class, 'category_id')->withDefault([
            'name' => "---"
        ]);
    }

    public function getCreatedAtAttribute($value)
    {
        return formatDate($value);
    }
    public function paymentHistory()
    {
        return $this->hasMany(Payment::class)->where('is_paid', 1);
    }
    public function dues()
    {
        return $this->hasMany(Payment::class)->where('is_paid', 0);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
