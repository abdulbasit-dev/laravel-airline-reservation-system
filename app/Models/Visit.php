<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];
    
    protected $with = ['user','client'];

    // sale representive
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
