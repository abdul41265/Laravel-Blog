<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;
use Gate;
use App\Http\Resources\PostIndexResource;
use App\Http\Resources\PostShowResource;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(){
        // return Post::all();
        return PostIndexResource::collection(
            Post::all()
        );

    }

    public function show($id){
        return new PostShowResource(Post::findorFail($id));

    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $user=Auth::user();
        if(!$user){
            return redirect()->back();
        }
        $post = new Post([
            'title' =>$request->input('title'),
            'content'=>$request->input('content')
        ]);
        $user->posts()->save($post);
        
        // $post->tags()->attach($request->input('tags')===null ? []: $request->input('tags'));
      return response(null, 204);
    }

    public function postAdminUpdate(Request $request)
    {
        if(!Auth::check()){
            return response(null, 401);
        }
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = Post::find($request->input('id'));
       if(Gate::denies('manipulate-post',$post)){
        return response(null, 401);
        //    return redirect()->back()->with('allow', 'Your are not the creater of the post');
       }
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->save();
        return response(null, 204);
        // return redirect()->route('admin.index')->with('info', 'Post edited, new Title is: ' . $request->input('title'));
    }

    public function getLikePost($id)
    {
        $post = Post::where('id',$id)->with('likes')->first();
        $like = new Like();
        $post->likes()->save($like);

        return redirect()->back();
    }
}
