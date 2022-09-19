<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{


    public function index() {
        $posts = PostModel::latest()->with('user','likes')->paginate(2);
        return view("posts.post", [
            "posts"=> $posts
        ]);
    }


    public function show(PostModel $post){
        return view('posts.show', [
            'post'=>$post
        ]);
    }

    public function store(Request $request) {
        
        // if(auth()->user()) {
            $this->validate($request, [
                'body' => 'required'
            ]);

            $request->user()->posts()->create([
                'body' => $request->body
            ]);

            return back();

        // }
        // else{
        //     return back()->withErrors('Login to post!');
        // }
       
    }

    public function remove(PostModel $post)
    {
        // if(!$post->ownedBy(auth()->user())){
        //     return back();
        // }

        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
