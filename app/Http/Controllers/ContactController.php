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
    public function sendContactMessage(Request $request)
    {
        try {
            $userMessage  = trim($request->only('contactform')['contactform']);

            if ($userMessage) {
                $emailFrom    = Auth::user()->email;
                $userNameFrom = Auth::user()->name;
                $emailTo      = "pellizdeva7@gmail.com";

                Mail::to($emailTo)->send(new Contact($emailFrom, $userNameFrom, $userMessage));
                return redirect()->route('contact')->with('messagestatus', 'success');
            } else
                return redirect()->route('contact')->with('messagestatus', 'noMessageProvided');

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('contact')->with('messagestatus', 'error');
        }
    }
}
