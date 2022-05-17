<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable= ['body', 'status', 'parent_id', 'author_id', 'commentable_id', 'commentable_type', 'seen', 'approved'];

    public function parent(){
        return $this->belongsTo($this, 'parent_id');
    }

    public function answers(){
        return $this->hasMany($this, 'parent_id');
    }

    public function commentable(){
        return $this->morphTo();
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
