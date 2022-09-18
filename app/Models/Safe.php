<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safe extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $with = ['user'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function transactions(){
        return $this->hasMany(SafeTransaction::class,'safe_id');
    }
    
    public function scopeisActive($query){
        return $query->where('is_active',1)->get();
    }
}
