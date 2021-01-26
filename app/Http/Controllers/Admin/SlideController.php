<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Requests\SlideRequest;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{

    public function index()
    {
        $slides=Slide::all();
        return view('admin.slide.index',compact('slides'));
    }


    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(SlideRequest $request)
    {
        $image = $request->image;
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path() . '/slide/', $imageName);

        Slide::create([
            'image'=>$imageName,
        ]);
        return redirect(Route('slide.index'))->with('status','Created Successful');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $slide=Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
    }


    public function update(Request $request, $id)
    {
        $slide = $request->slide;
        $slide = slide::find($id);
        $image = $request->image;


        if($image)
        {
            $path = public_path() . '/slide/'. $slide->image;
            unlink($path);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/slide/', $imageName);
        }
        else{
            $imageName = $slide->image;
        }
        $slide->image = $imageName;
        $slide->save();

        return redirect(Route('slide.index'))->with('status','Edited Successful');
    }

    public function destroy($id)
    {
        $slide =Slide::find($id);
        $slide->delete();
        return redirect(Route('slide.index'))->with('status','Deleted Successful');
    }
}
