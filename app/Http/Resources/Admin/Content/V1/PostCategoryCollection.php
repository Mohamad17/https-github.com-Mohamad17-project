<?php

namespace App\Http\Resources\Admin\Content\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCategoryCollection extends ResourceCollection
{
    // public static $wrap='post-category';
    public function toArray($request)
    {
        return [
            'data'=> $this->collection,
        ];
    }

    // public function with($request)
    // {
    //     return [
    //         'foo' => ['key' => 'bar']
    //     ];
    // }
}
