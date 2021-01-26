<?php

namespace App\Http\Controllers\Admin;

use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $detail = Detail::findOrFail($id);
        return response()->json([
            'detail' => $detail,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required',
            'qty' => 'required'
         ]);
         $detail = Detail::find($id);
         $image = $request->image;
         if($image)
         {
             $path = public_path() . '/detail/'. $detail->image;
             unlink($path);
             $imageName = time() . '_' . $image->getClientOriginalName();
             $image->move(public_path() . '/detail/', $imageName);
         }
         else{
             $imageName = $detail->image;
         }
         $detail->image = $imageName;
         $detail->size = $request->size;
         $detail->color = $request->color;
         $detail->price = $request->price;
         $detail->qty = $request->qty;
         $detail->discount = $request->discount;
         $detail->save();
         return redirect()->back();
    }

   
    public function destroy($id)
    {
        $detail = Detail::find($id);
        $path = public_path() . '/detail/'. $detail->image;
        unlink($path);
        $detail->delete();
        return redirect()->back();
    }
}
