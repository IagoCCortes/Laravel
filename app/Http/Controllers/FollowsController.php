<?php

namespace App\Http\Controllers;

use App\User;
use App\Follower;

class FollowsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(User $user){
        $follow = new Follower();
        $result = $follow->toggleFollow($user);
        return $result;
    }
}
