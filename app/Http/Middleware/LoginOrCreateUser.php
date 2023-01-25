<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginOrCreateUser
{
    /*
    this middle ware creates a user and keep it rememberd in the session
    */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user())
        {
            $user = User::factory(1)->create()[0];
            Auth::loginUsingId($user->id,true);
        }
        return $next($request);
    }
}
