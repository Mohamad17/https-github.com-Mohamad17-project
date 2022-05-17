<?php

namespace App\Http\Resources\Admin\Content\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryApi extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=> $this->collection->map(function($category){
               return[
                   'name'=>$category->name,
                   'created_at'=> $category->created_at,
               ];
            }),
        ];
    }
}
