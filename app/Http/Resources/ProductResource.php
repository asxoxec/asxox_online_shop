<?php

namespace App\Http\Resources;

use App\Http\Resources\DetailResource;
use App\Http\Resources\Product_ImageResource;
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
            'barcode'=>$this->barcode,
            'cover'=>asset('product/'.$this->cover),
            'price'=>$this->price,
            'color'=>$this->color,
            'size'=>$this->size,
            'discount'=>$this->discount,
            'category'=>$this->category->id,
            'subcategory'=>$this->subcategory->id,
            'detail'=>DetailResource::collection($this->details),
            'description_text'=>$this->description,
            'description_image'=>Product_ImageResource::collection($this->product_image),
            'description_url'=>$this->url

        ];
    }
}
