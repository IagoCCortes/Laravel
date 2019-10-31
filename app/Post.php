<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
