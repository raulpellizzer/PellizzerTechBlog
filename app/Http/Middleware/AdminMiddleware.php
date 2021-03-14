<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Auth::user()->isAdmin === 1)
                return $next($request);
            else {
                $userController = new UserController;
                $userController->logout($request);
                return redirect(route('login'));
            }

        } catch (Exception $e) {
            $userController = new UserController;
            $userController->logout($request);
            return redirect(route('login'));
        }
    }
}
