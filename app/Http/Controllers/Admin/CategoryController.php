<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryRequest $request)
    {
        $image = $request->image;
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path() . '/category/', $imageName);

        $icon = $request->icon;
        $iconName = time() . '_' . $icon->getClientOriginalName();
        $icon->move(public_path() . '/category/', $iconName);


        $category = Category::create([
            'name'=>$request->name,
            'image'=>$imageName,
            'icon'=>$iconName,
        ]);
        if($category)
        {
            return redirect(route('category.index'))->with('success','Created Successful');
        }

    }


    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show',compact('category'));
    }


    public function edit($id)
    {
        $category =Category::find($id);
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'name'=>'required',
        ]);

        $category = $request->category;
        $category = Category::find($id);
        $image = $request->image;
        if($image)
        {
            $path = public_path() . '/category/'. $category->image;
            unlink($path);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/category/', $imageName);
        }
        else{
            $imageName = $category->image;
        }

        $icon = $request->icon;
        if($icon)
        {
            $path = public_path() . '/category/'. $category->icon;
            unlink($path);
            $iconName = time() . '_' . $icon->getClientOriginalName();
            $icon->move(public_path() . '/category/', $iconName);
        }
        else{
            $iconName = $category->icon;
        }


        $category->name = $request->name;
        $category->image = $imageName;
        $category->icon=$iconName;
        $category->save();

        return redirect(route('category.index'))->with('success','Edited Successful');
    }


    public function destroy($id)
    {
        $category=Category::find($id)->delete();
        return redirect(route('category.index'))->with('success','Deleted Successful');
    }
}
