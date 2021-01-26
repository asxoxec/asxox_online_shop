<?php

namespace App\Http\Resources;

use App\Http\Resources\DetailResource;
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
            'cover'=>asset('product/'.$this->cover),
            'price'=>$this->price,
            'discount'=>$this->discount,
            'category'=>$this->category->id,
            'subcategory'=>$this->subcategory->id,
            'detail'=>DetailResource::collection($this->details),

        ];
    }
}
