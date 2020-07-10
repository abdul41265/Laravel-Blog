<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content'];



    //Mutator Example


    public function user(){

        return $this->blongsTo('\App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id');
    }

}
