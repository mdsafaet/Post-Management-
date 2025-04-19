<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    
    public function Dashboard()
    {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

   
    public function create()
    {
        return view('admin.create');
    }

   
    public function store(Request $request)
    {
   
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string|min:10',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.create')->withInput()->withErrors($validator);
        }
      
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->published_at = $request->published_at;

        $post->save();
        

       return redirect()->route('admin.dashboard')->with('success', 'Post created successfully.');
    }

 
  

    public function edit( $id)

    {
        $post = Post::findOrFail($id);
        return view('admin.edit', compact('post'));
    }

  
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string|min:10',
            'published_at' => 'nullable|date',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('admin.edit', $id)->withInput()->withErrors($validator);
        }
    
        $post = Post::findOrFail($id);
    
        $post->title = $request->title;
        $post->content = $request->content;
        $post->published_at = $request->published_at;
    
        $post->update();
    
        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully.');
    }
    

    public function destroy( $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully.');
    }


    public function show($id)
{
    $post = Post::findOrFail($id);
    return view('admin.post', compact('post')); // Assumes you have a 'post.show' view
}


}
