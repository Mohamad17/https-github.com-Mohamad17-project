<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable= ['user_id','product_id','color_id','guarantee_id','number'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function color(){
        return $this->belongsTo(ProductColor::class, 'color_id');
    }

    public function guarantee(){
        return $this->belongsTo(Guarantee::class, 'guarantee_id');
    }

    public function cartItemProductPrice(){
        $guaranteePriceIncrease= empty($this->guarantee_id)? 0: $this->guarantee->price_increase;
        $colorPriceIncrease= empty($this->color_id)? 0: $this->color->price_increase;
        return $this->product->price+ $guaranteePriceIncrease+$colorPriceIncrease;
    }

    public function cartItemProductDiscount(){
        $productPrice= $this->cartItemProductPrice();
        $discount= empty($this->product->activeAmazingSale())? 0 : $productPrice*($this->product->activeAmazingSale()->percentage/100);
        return $discount;
    }

    public function cartItemFinalPrice(){
        $finalPrice= ($this->cartItemProductPrice()- $this->cartItemProductDiscount())* $this->number;
        return $finalPrice;
    }

    public function cartItemFinalDiscont(){
        return $this->number* $this->cartItemProductDiscount();
    }
   
}
