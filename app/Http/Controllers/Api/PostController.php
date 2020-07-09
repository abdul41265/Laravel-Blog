<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostIndexResource;
use App\Http\Resources\PostShowResource;

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
}
