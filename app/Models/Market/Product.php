<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Content\Comment;


class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable= ['name', 'introduction', 'slug', 'image', 'status', 'tags', 'weight','length','width','height','price','marketable','sold_number','frozen_number','marketable_number','brand_id','category_id', 'published_at'];
    protected $casts= ['image'=> 'array'];

    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function metas(){
        return $this->hasMany(ProductMeta::class);
    }

    public function colors(){
        return $this->hasMany(ProductColor::class);
    }

    public function guarantees(){
        return $this->hasMany(Guarantee::class);
    }

    public function amazingSales(){
        return $this->hasMany(AmazingSale::class);
    }

    public function images(){
        return $this->hasMany(Gallery::class);
    }

    public function values(){
        return $this->hasMany(CategoryValue::class, 'product_id');
    }
    
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
