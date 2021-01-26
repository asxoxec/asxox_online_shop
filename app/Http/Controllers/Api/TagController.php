<?php

namespace App\Http\Controllers\api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function Tag_list(){
        $tags=Tag::all();
        return $this->successResponse($tags,200);
    }
}
