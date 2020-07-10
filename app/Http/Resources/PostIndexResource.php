<?php

namespace App\Http\Resources;
use App\User;
use App\Like;

use Illuminate\Http\Resources\Json\JsonResource;

class PostIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $posts = User::find($this->user_id);
        $likes= Like::where('post_id',$this->id)->count();
        return [


            'name'=> $posts->name,
            'id'=> $this->id,
            'title'=> $this->title,
            'content'=>$this->content,
            'likes'=>$likes
        ];
    }
}
