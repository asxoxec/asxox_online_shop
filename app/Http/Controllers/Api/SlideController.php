<?php

namespace App\Http\Controllers\api;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SlideResource;

class SlideController extends Controller
{
    public function Slide_list(){
        $slides=Slide::all();
        return SlideResource::collection($slides);
    }
}
