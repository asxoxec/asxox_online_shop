<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubCategoryResource;

class CategoryController extends Controller
{
    public function Category_list(){
        $category=Category::all();
        return CategoryResource::collection($category);
    }

    public function SubCategory_list(){
        $subcategory=SubCategory::all();
        return SubCategoryResource::collection($subcategory);
    }


}
