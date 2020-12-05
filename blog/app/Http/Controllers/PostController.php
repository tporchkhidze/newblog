<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
//        $posts = Post::all();
        $posts = Post::with(['tags'])->get();
//        return view with this information
        return view('posts')->with('posts', $posts);

    }
    public function show($id){
        $post = Post::findOrfail($id);
//        return view
        return view('post')->with('post', $post);
    }

    public function create(){
        $tags = Tag::all();
        return view('create', compact('tags'));
    }
    public function save(SavePostRequest $request){
//        dd($request->all());
        $post = new Post($request->all());
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach($request->tags);
        return redirect()->back();
    }
    public function edit($postId){
        return view('edit')->with('postId', $postId);
    }


    public function update(Request $request, $postId){
        $post = Post::findOrfail($postId);
        $post->update([
            'title' => $request->title,
            'text' => $request->text,
            'likes' => $request->likes,
        ]);
        return redirect()->route('posts');
    }

    public function delete($id){
            $post = Post::findOrfail($id);
            $post->delete();
            return redirect()->back();


    }
    public function approve($id){
        $post = Post::findOrfail($id);
        $this->authorize('approve', $id);
        $post->is_approved = true;

        $post->save();

        return redirect()->route('posts');
    }
}
