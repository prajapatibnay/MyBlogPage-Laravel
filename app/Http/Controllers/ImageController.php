<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use File;

class ImageController extends Controller
{
    public function index(){
        $image = Image::orderBy('created_at', 'desc')->get();
        return view('admin.image.index', compact('image'));
    }

   
    public function create(){
        return view('admin.image.create');

    }

    public function store(Request $request){
        $validator = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension(); 
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imageName);
        
        $img = new Image;
        $img->name = $request->name;
        $img->src = "images/".$imageName;
        $img->description = $request->description;
        $img->save();
        return redirect()->route('image.index');

    }

    public function delete($id){
        $image = Image::find($id);
        $destinationPath = public_path().'/'.$image->src;
        if(File::exists($destinationPath))
        {
            File::delete($destinationPath);
            //unlink($image_path);
        }
        $image->delete();
        return redirect()->route('image.index');
    }

    public function edit($id){
        $image = Image::find($id);
        return view('admin.image.edit', compact('image'));
    }

    public function update(Request $request, $id){
    
        $validator = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension(); 
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imageName);

        //database
        $images = Image::find($id);
        $filetodelete = public_path().'/'.$images->src;
        if(File::exists($filetodelete))
        {
            File::delete($filetodelete);
        }
       
        $images->name = $request->name;
        $images->description = $request->description;
        $images->src = "images/".$imageName;
        $images->save();

        return redirect()->route('image.index');
    }
}
