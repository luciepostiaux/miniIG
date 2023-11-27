<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function follow(User $user)
    {
        // Vérifie si l'utilisateur n'est pas déjà suivi
        if (!Auth::user()->following()->where('followed_id', $user->id)->exists()) {
            Auth::user()->following()->attach($user->id);
            return response()->json(['message' => 'Vous suivez maintenant cet utilisateur.']);
        }

        return response()->json(['message' => 'Vous suivez déjà cet utilisateur.']);
    }

    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user->id);
        return response()->json(['message' => 'Vous ne suivez plus cet utilisateur.']);
    }
}
