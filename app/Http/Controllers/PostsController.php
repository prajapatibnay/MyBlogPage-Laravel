<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function show(){
        $post = Post::all();
        return view('admin.post.index', compact('post'));
    }
    
    public function create(){
        return view('admin.post.create');
    }

    public function store(Request $request){

        $validator = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
    
        return redirect()->route('post.show');
    }

    public function delete( $id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.show');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, $id){
        $validator = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('post.show');
    }
}
