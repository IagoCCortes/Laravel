<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{

    //turning off mass assignment protection can use 
    //protected fillable = ['Description',....]
    //to do that to specific fields
    protected $guarded = []; 
    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function liked(){
        return $this->belongsToMany(User::class);
    }

    public function getIndexPosts(){
        return DB::select('select p.id as post, 
                                    pu.id as liked,   
                                    (select count(post_id) from post_user where post_id = p.id) as likes, 
                                    image 
                             from posts p 
                             left join post_user pu on p.id = pu.post_id and pu.user_id = ?
                             where p.user_id in (select follower_id from followers where following_id = ?)', [auth()->user()->id, auth()->user()->id]);
    }
}
