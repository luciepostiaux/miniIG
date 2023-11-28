<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->following()->attach($user->id);
        return back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return back();
    }
}
