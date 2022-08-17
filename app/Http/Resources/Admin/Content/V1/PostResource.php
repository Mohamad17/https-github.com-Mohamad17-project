<?php

namespace App\Http\Resources\Admin\Content\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'slug'=> $this->slug,
            'summary'=> $this->summary,
            'status'=> $this->status,
            'tags'=> $this->tags,
            'category'=> new PostCategoryResource($this->whenLoaded('postCategory'))
        ];
    }
}
