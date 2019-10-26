<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //telling laravel don't guard anything, i'm goingo to do things my own way
    protected $guarded = []; 
    public function user(){
        return $this->belongsTo(User::Class);
    }
}
