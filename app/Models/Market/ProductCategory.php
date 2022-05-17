<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
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

    protected $fillable= ['name', 'description', 'slug', 'image', 'status', 'tags', 'show_in_menu', 'parent_id'];
    protected $casts= ['image'=> 'array'];

    public function attributes(){
        return $this->hasMany(CategoryAttribute::class, 'category_id');
    }
   
    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
