<?php

namespace App\Http\Controllers\api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function Customer_list(){
            $customers =Customer::all();
            return $this->successResponse($customers,200);
    }


    public function store(Request $request){
            $customer =Customer::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address
            ]);
            return $this->successResponse($customer,200);

    }
}
