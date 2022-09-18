<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Stand extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $guarded = [];
    
    protected $with = ['user','client'];

    // sale representive or driver
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'User Deleted',
        ]);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
