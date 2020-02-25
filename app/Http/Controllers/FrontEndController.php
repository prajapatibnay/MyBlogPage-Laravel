<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Slider;

class FrontEndController extends Controller
{
    public function home(){
        $image = Image::orderBy('created_at', 'desc')->get();
        $slider = Slider::all();
        return view('frontend.home', compact('image', 'slider'));
    }

    public function single_page($id){
        $image = Image::find($id);
        $allpost= Image::where('id','!=', $id)->get();
        return view('frontend.singlepage', compact('image', 'allpost'));
    }
}
