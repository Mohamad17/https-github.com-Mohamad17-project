<?php

namespace App\Models\Market;

use App\Models\Payment\Payment;
use App\Models\User;
use App\Models\User\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'address_id',
        'address_object',
        'payment_id',
        'payment_object',
        'payment_type',
        'payment_status',
        'delivery_id',
        'delivery_object',
        'delivery_amount',
        'delivery_status',
        'delivery_date',
        'order_final_amount',
        'order_discount_amount',
        'copan_id',
        'copan_object',
        'order_copan_discount_amount',
        'common_discount_id',
        'common_discount_object',
        'order_common_discount_amount',
        'order_total_products_discount_amount',
        'order_status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function copan(){
        return $this->belongsTo(Copan::class);
    }

    public function commonDiscount(){
        return $this->belongsTo(CommonDiscount::class);
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
