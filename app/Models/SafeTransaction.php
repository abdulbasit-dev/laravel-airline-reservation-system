<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafeTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['actor','transactioner'];

    public function actor()
    {
        return $this->belongsTo(User::class, 'action_by');
    }

    public function transactioner()
    {
        return $this->belongsTo(User::class, 'transaction_by');
    }
    

}
