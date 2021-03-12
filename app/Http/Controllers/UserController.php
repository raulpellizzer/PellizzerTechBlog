<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

            $userName     = $request->userNameRegister;
            $password     = $request->passwordRegister;
            $confPassword = $request->confPasswordRegister;
            $email        = $request->email;

            $validation = $user->validateData($userName, $email, $password, $confPassword);

            if ($validation) {
                $validation = $user->checkUserInDB($userName, $email);

                if ($validation) {
                    $user->name     = $userName ;
                    $user->password = $password;
                    $user->email    = $email;
                    $user->save();
                    return redirect()->route('register')->with('registerStatus', 'success');
                } else
                    return redirect()->route('register')->with('registerStatus', 'userExists');

            } else
                return redirect()->route('register')->with('registerStatus', 'invalidCredentials');
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
