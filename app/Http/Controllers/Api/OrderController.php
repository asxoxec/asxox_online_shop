<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function Order_list(){
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    public function store(Request $request){

        $customer =Customer::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address
        ]);

        $order="00001";
        $ImageName = "1.png";
        // $image = $request->image;
        // $imageName = time() . '_' . $image->getClientOriginalName();
        // $image->move(public_path() . '/order/', $imageName);
        $order = Order::create([
            'order_number'=>$order,
            'total'=>$request->total,
            'payment'=>$request->payment,
            'image'=>$ImageName,
            'customer_id'=>$customer->id
        ]);

        $products=$request->product;
          foreach ($products as $product)
          $order->products()->attach($product['id']);
           return "success";

    }
}
