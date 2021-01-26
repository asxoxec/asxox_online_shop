<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'cover'=>$this->cover,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'category'=>$this->category,
            'subcategory'=>$this->subcategory,
            'detail'=>$this->details,

        ];
    }
}
