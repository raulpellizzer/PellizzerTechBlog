<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __invoke()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        }
    }

    public function authenticate(Request $request)
    {
        if ($request->method() === "POST") {
            $request->session()->regenerate();

            $user         = new User;
            $credentials  = $request->only('name', 'password');
            $user->authenticate($credentials);

            // TO DO: Redirect or do something, login message ...
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
