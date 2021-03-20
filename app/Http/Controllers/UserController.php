<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Register a new user
     * 
     * @param request request data
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->method() === "POST") {
            try {
                $user         = new User;
                $credentials  = $request->only('userNameRegister', 'passwordRegister', 'confPasswordRegister', 'email');
                $validation   = $user->validateData($credentials);

                if ($validation) {
                    $validation = $user->checkUserInDB($credentials['userNameRegister'], $credentials['email']);

                    if ($validation) {
                        $encryptedPassword = $user->encryptPassword($credentials['passwordRegister']);

                        $user->name        = $credentials['userNameRegister'];
                        $user->password    = $encryptedPassword;
                        $user->email       = $credentials['email'];
                        $user->save();
                        return redirect()->route('register')->with('registerStatus', 'success');
                    } else
                        return redirect()->route('register')->with('registerStatus', 'userExists');

                } else
                    return redirect()->route('register')->with('registerStatus', 'invalidCredentials');

            } catch (Exception $e) {
                return redirect()->route('register')->with('registerStatus', 'error');
            }
        }
    }

    /**
     * Authenticates user
     * 
     * @param request request data
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        if ($request->method() === "POST") {
            $request->session()->regenerate();

            $user         = new User;
            $credentials  = $request->only('name', 'password');
            $auth         = $user->authenticate($credentials);

            if ($auth) {
                $userIsActive = $user->isUserActive($credentials['name']);

                if ($userIsActive[0]->active)
                    return redirect()->route('home')->with('authStatus', 'success');
                else
                    return redirect()->route('login')->with('authStatus', 'disabledUser');
            } else
                return redirect()->route('login')->with('authStatus', 'invalidCredentials');
        }
    }

    /**
     * Logs user out
     * 
     * @param request request data
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
