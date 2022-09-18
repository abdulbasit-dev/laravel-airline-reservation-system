<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $with = ["user:id,name,fcm_token", "driver:id,name,fcm_token", "assigner:id,name", "canceller:id,name", 'client:id,name,address,phone,phone_alt,category_id', 'client.category:id,name', "admin:id,name"];

    // this the status of order
    public $orderStatus = [
        "ordered", "canceled", "accepted", "assigned", "pickedup", "delivered",
    ];


    // sale representive
    public function user()
    {
        return $this->belongsTo(User::class, 'order_by')->withDefault([
            'name' => 'User Deleted',
        ]);
    }

    // driver
    public function driver()
    {
        return $this->belongsTo(User::class, 'pickedup_by')->withDefault([
            'name' => 'User Deleted',
        ]);;
    }

    // assigner person
    public function assigner()
    {
        return $this->belongsTo(User::class, 'assigned_by')->withDefault([
            'name' => 'User Deleted',
        ]);
    }

    // canceller person
    public function canceller()
    {
        return $this->belongsTo(User::class, 'cancelled_by')->withDefault([
            'name' => 'User Deleted',
        ]);
    }

    // admin
    public function admin()
    {
        return $this->belongsTo(User::class, 'accepted_by')->withDefault([
            'name' => 'User Deleted',
        ]);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function scopeisPaid($query, $payment)
    {
        return $query->where($payment->is_paid, 1);
    } //dosent work ? i havent tested this one yet

    public function scopeCategory($query, $client_category_id, $category)
    {
        return $query->where($client_category_id, $category);
    } //dosent work



}
