<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Mail\Registration;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Register a new user
     * 
     * @param request request data
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

                        $userId = $user->getUserId($user->name);
                        Mail::to($user->email)->send(new Registration($user->name, $userId));

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
                $userIsActive      = $user->isUserActive($credentials['name']);
                $accoutWasVerified = $user->wasAccountVerified($credentials['name']);

                if ($userIsActive[0]->active) {
                    if ($accoutWasVerified[0]->registration_verified) 
                        return redirect()->route('home')->with('authStatus', 'success');
                    else
                        return redirect()->route('login')->with('authStatus', 'accountNotVerified');
                } else
                    return redirect()->route('login')->with('authStatus', 'disabledUser');
            } else
                return redirect()->route('login')->with('authStatus', 'invalidCredentials');
        }
    }

    /**
     * Verifies user account
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifyAccount($id)
    {
        try {
            $user = User::find($id);
            $user->registration_verified = 1;
            $user->save();
            return redirect()->route('login')->with('authStatus', 'accountVerified');
        } catch (Exception $e) {
            return redirect()->route('login')->with('authStatus', 'errorInOperation');
        }
    }

    /**
     * Logs user out
     * 
     * @param request request data
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Unsubscribes an user
     * 
     * @param request request data
     * @param integer user id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        try {
            User::destroy($id);
            $this->logout($request);
            return redirect()->route('home')->with('userStatus', 'deleted');
        } catch (Exception $e) {
            return redirect()->route('home')->with('userStatus', 'errorInOperation');
        }
    }
}
