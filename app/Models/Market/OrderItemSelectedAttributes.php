<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItemSelectedAttributes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'order_item_id',
        'category_attribute_id',
        'category_value_id',
        'value',
    ];

    public function orderItem(){
        return $this->belongsTo(OrderItem::class);
    }

    public function categoryAttribute(){
        return $this->belongsTo(CategoryAttribute::class);
    }

    public function categoryValue(){
        return $this->belongsTo(CategoryValue::class);
    }
}
