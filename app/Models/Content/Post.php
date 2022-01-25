<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
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

    protected $fillable= ['title', 'summary', 'slug', 'image', 'status', 'tags', 'commentable', 'published_at', 'author_id','category_id'];
    protected $casts= ['image'=> 'array'];

    public function postCategory(){
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
}
