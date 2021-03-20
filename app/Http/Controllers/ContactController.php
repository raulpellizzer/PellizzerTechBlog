<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\Contact;
use Exception;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        try {
            $input        = $request->all();
            $emailFrom    = Auth::user()->email;
            $userNameFrom = Auth::user()->name;
            $emailTo      = "pellizdeva7@gmail.com";

            Mail::to($emailTo)->send(new Contact($emailFrom, $userNameFrom, $input['contactform']));
            return redirect()->route('contact')->with('messagestatus', 'success');

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('contact')->with('messagestatus', 'error');
        }


        // echo "Aqui: " . $input['contactform'] . "<br>";
        // echo "emailFrom: " . $emailFrom . "<br>";
        // echo "userNameFrom: " . $userNameFrom . "<br>";
        // die;
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
}
