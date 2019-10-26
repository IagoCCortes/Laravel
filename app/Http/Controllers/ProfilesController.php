<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        //App\User substitutes code below
        //$user = User::findOrFail($user);
        //using only User because of 'use App\User;'
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            //in case i have a field that does not require validation
            //'field' => '',
            //'url' => 'url'
            'description' => 'required',
            'image' => ''
        ]);

        $user->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
