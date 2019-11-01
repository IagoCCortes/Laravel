<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'following_id', 'follower_id',
    ];

    protected $table = 'followers';

    public function toggleFollow(User $user){
        $result = $this->where([
            ['follower_id', '=', $user->id], 
            ['following_id', '=', auth()->user()->id]    
        ])->first();
        if($result){
            $delId = $result->id; 
            $result->delete();
            return $delId;
        }else{
            return $this->create([
                'follower_id' => $user->id,
                'following_id' => auth()->user()->id,
            ])->id;
        }
    }
}
