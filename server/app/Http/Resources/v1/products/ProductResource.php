<?php

namespace App\Http\Resources\v1\products;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  $this->collection->map(function ($item){

            return [
                'id'           => $item->id,
				'image'        => $item->img,
                'title'        => $item->title,
                'discription'  => $item->discription,
                'price'        => $item->price ,
            ];

        });
    }
}
