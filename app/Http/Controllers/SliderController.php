<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()     
    {
        $slider = Slider::all();
        return view('admin.slider.index' ,compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider = $request->file('image');
        $sliderName = time().'.'.$slider->getClientOriginalExtension(); 
        $destinationPath = public_path('/images');
        $slider->move($destinationPath, $sliderName);
        
        $sld = new Slider;
        $sld->name = $request->name;
        $sld->src = "images/".$sliderName;
        $sld->description = $request->description;
        $sld->save();
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider = $request->file('image');
        $sliderName = time().'.'.$slider->getClientOriginalExtension(); 
        $destinationPath = public_path('/images');
        $slider->move($destinationPath, $sliderName);

        //database
        $sliders = Slider::find($id);
        $filetodelete = public_path().'/'.$sliders->src;
        if(File::exists($filetodelete))
        {
            File::delete($filetodelete);
        }
       
        $sliders->name = $request->name;
        $sliders->description = $request->description;
        $sliders->src = "images/".$sliderName;
        $sliders->save();

        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $slider = Slider::find($id);
        $destinationPath = public_path().'/'.$slider->src;
        if(File::exists($destinationPath))
        {
            File::delete($destinationPath);
            //unlink($image_path);
        }
        $slider->delete();
        return redirect()->route('slider.index');
    }
}
