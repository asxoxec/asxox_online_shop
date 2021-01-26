<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
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
            "image"=>asset('product/description/'.$this->image),
            "size"=>$this->size,
            "color"=>$this->color,
            "qty"=>$this->qty,
            "price"=>$this->price,
            "discount"=>$this->discount,
        ];
    }
}
