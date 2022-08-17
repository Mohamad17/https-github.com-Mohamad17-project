<?php

namespace App\Http\Resources\Admin\Content\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostCategoryResource extends JsonResource
{
    public static $wrap='post-category';
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'tags' => $this->tags,
            'created_at' => $this->created_at,
            'posts' => PostResource::collection($this->whenLoaded('posts'))
        ];
    }

    // public function with($request)
    // {
    //     return [
    //         'manchester' => ['red' => 'united']
    //     ];
    // }
}
