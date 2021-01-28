<?php

namespace App\Http\Controllers\Admin;

use App\Models\Detail;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::withTrashed()->get();
        return view('admin.product.index',compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.product.create',compact('categories','subcategories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'pdescription' => 'required',

            'ptitle' => 'required',
            'pimage' => 'required',
            'pprice' => 'required',

            'category_id' => 'required',
            'subcategory_id' => 'required'
         ]);





        if(isset($request->price))
        {
            $request->validate([
                'image' => 'required',
                'price' => 'required',
                'quantity' => 'required'
             ]);
        }

        $detail= $request->pdescription;
        $title = $request->ptitle;

        $path = public_path('product/'.$title);

        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
        $data = $img->getAttribute('src');
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $image_name = "/product/description/".time().$k.'.png';
        $path = public_path() . $image_name;
        file_put_contents($path, $data);
        $new_src = asset($image_name);
        $img->removeAttribute('src');
        $img->setAttribute('src', $new_src);
        }

        $detail = $dom->saveHTML();

        $cover = $request->pimage;
        $covername = time() . '_' . $cover->getClientOriginalName();
        $cover->move(public_path() . '/product/', $covername);

        $product = Product::create([
            'description' => $detail,
            'title' => $request->ptitle,
            'cover' => $covername,
            'size' => $request->psize,
            'color' => $request->pcolor,
            'price' => $request->pprice,
            'discount' => $request->pdiscount,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id

        ]);

         if(isset($request->price) && count($request->price) > 0)
         {
            for ($i=0; $i < count($request->price); $i++) {

                $image = $request->image[$i];
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path() . '/detail/', $imageName);

                $detail = new Detail();
                $detail->image = $imageName;
                $detail->size = $request->size[$i];
                $detail->color = $request->color[$i];
                $detail->price = $request->price[$i];
                $detail->discount = $request->discount[$i];
                $detail->qty = $request->quantity[$i];
                if($detail->save())
                {
                    $product->details()->attach($detail);
                }
              }

         }

         return redirect(route('product.index'))->with('success','Product Created Successfully!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.product.edit',compact('product','categories','subcategories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'pdescription' => 'required',
            'ptitle' => 'required',
            'pprice' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
         ]);

        if(isset($request->price))
        {
            $request->validate([
                'image' => 'required',
                'price' => 'required',
                'quantity' => 'required'
             ]);
        }

        $product = Product::find($id);


        $orgpath = public_path('product/'.$product->title);

        $detail= $request->pdescription;
        $title = $request->ptitle;

        $newpath = public_path('product/'.$title);

        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');



        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            $searchForValue = ',';
            if( strpos($data, $searchForValue) !== false )
            {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "/product/description/".time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $new_src = asset($image_name);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            }

        }



        $detail = $dom->saveHTML();

        $cover = $request->pimage;

        if($cover)
        {
            $path = public_path() . '/product/'. $product->cover;
            unlink($path);
            $covername = time() . '_' . $cover->getClientOriginalName();
            $cover->move(public_path() . '/product/', $covername);
        }
        else{
            $covername = $product->cover;
        }


        $product->update([
            'description' => $detail,
            'title' => $request->ptitle,
            'cover' => $covername,
            'size' => $request->psize,
            'color' => $request->pcolor,
            'price' => $request->pprice,
            'discount' => $request->pdiscount,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id

        ]);

         if(isset($request->price) && count($request->price) > 0)
         {
            for ($i=0; $i < count($request->price); $i++) {

                $image = $request->image[$i];
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path() . '/detail/', $imageName);

                $detail = new Detail();
                $detail->image = $imageName;
                $detail->size = $request->size[$i];
                $detail->color = $request->color[$i];
                $detail->price = $request->price[$i];
                $detail->discount = $request->discount[$i];
                $detail->qty = $request->quantity[$i];
                if($detail->save())
                {
                    $product->details()->sync($detail);
                }
              }

         }

         return redirect(route('product.index'))->with('success','Product Updated Successfully!');

    }


    public function destroy($id)
    {
        $product = Product::find($id);
        // $path = public_path() . '/product/'. $product->image;
        // unlink($path);
        $product->delete();
        return redirect()->back();
    }

    public function restoreproudct($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }
}
