<?php

namespace App\Http\Controllers\api;

use App\Models\Detail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function Product_list(){

        $products=Product::all();
        return ProductResource::collection($products,200);

    }

    public function store(Request $request)
    {
        $product =Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'cover'=>$request->cover,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id
        ]);

            $details=$request->detail;
            foreach ($details as $detail) {
                $data=Detail::create([
                    'image'=>$detail['image'],
                    'size'=>$detail['size'],
                    'color'=>$detail['color'],
                    'price'=>$detail['price'],
                    'qty'=>$detail['qty']
                ]);
                $product->details()->attach($data);
            }


        return $this->successResponse(new ProductResource($product),200);
    }
}
