<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcats = SubCategory::orderby('id','desc')->get();
        return view('admin.subcategory.index',compact('subcats'));
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    
    public function store(SubCategoryRequest $request)
    {
        $image = $request->image;
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path() . '/subcategory/', $imageName);
        subCategory::create([
            'name'=>$request->name,
            'image'=>$imageName,
            'category_id'=>$request->category_id
        ]);
        return redirect(Route('subcategory.index'))->with('success','Created Successful');
    }

    
    public function show($id)
    {
        $subcat = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategory.show',compact('subcat','categories'));
    }

    
    public function edit($id)
    {
        $categories = Category::all();
        $subcat = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit',compact('subcat','categories'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'name'=>'required',
            'category_id' =>'required',
            ]);

        $subcat = SubCategory::findOrFail($id);
        $image = $request->image;
        if($image)
        {
            $path = public_path() . '/subcategory/'. $subcat->image;
            unlink($path);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/subcategory/', $imageName);
        }
        else{
            $imageName = $subcat->image;
        }
        $subcat->name = $request->name;
        $subcat->category_id = $request->category_id;
        $subcat->image = $imageName;
        $subcat->save();
        
        return redirect(route('subcategory.index'))->with('success','Edited Successful');
    }

    
    public function destroy($id)
    {
        $subCat = SubCategory::find($id)->delete();
        return redirect(route('subcategory.index'))->with('success','Deleted Successful');
    }
}
