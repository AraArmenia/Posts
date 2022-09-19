<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function store(PostModel $post, Request $request) {

        // dd($post->likedBy($request->user()));

        if($post->likedBy($request->user())) {
            return response(null,409);
        }

        $post->likes()->create([
            'user_id'=>$request->user()->id
        ]);

        if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
            Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
        }

        return back();
    }

    public function destroy(PostModel $post, Request $request) {
        $request->user()->likes()->where("post_model_id", $post->id)->delete();
    
        return back();
    }

   
}
