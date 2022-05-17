<?php

namespace App\Models\Content;

use App\Models\Content\Comment;
use App\Models\Content\PostCategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable= ['title', 'summary', 'slug', 'image','body', 'status', 'tags', 'commentable', 'published_at', 'author_id','category_id'];
    protected $casts= ['image'=> 'array'];

    public function postCategory(){
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
