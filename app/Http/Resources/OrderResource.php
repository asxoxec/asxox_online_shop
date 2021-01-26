<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'total'=>$this->total,
            'payment'=>$this->payment,
            'image'=>$this->image,
            'status'=>$this->status,
            'cancel'=>$this->cancel,
            'customer'=>$this->customer,
            'products'=>$this->products,
        ];
    }
}
