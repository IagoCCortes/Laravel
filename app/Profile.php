<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    public function profileImage(){
        return '/storage/' . (($this->image) ? $this->image : 'profile/vrsqWIb7LHviWdYddgUtizrezQvTWyan8C9WN8lQ.jpeg');
    }

    public function user(){
        return $this->belongsTo(User::Class);
    }
}
