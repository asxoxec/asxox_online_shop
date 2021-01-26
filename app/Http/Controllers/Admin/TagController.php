<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    
    public function index()
    {
        $tags = Tag::orderby('id','desc')->get();
        return view('admin.tag.index',compact('tags'));
    }

    
    public function create()
    {
        return view('admin.tag.create');
    }

    
    public function store(TagRequest $request)
    {
        Tag::create([
            'name'=>$request->name
        ]);
        return redirect(Route('tag.index'))->with('success','Created Successful');
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit',compact('tag'));
    }

    
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id)->update([
            'name'=>$request->name
        ]);
        return redirect(Route('tag.index'))->with('success','Updated Successful');
    }

    
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect(Route('tag.index'))->with('success','Deleted Successful');
    }
}
