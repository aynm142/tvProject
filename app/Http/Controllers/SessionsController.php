<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.login');
    }

    public function store()
    {
        // Attempt to auth the user

        if (! Auth::attempt(request(['email', 'password']))) {
            return back()->withErrors([
               'message' => 'Please check your credentials and try again'
            ]);
        }

        return redirect('/');

    }

    public function destroy()
    {
        Auth()->logout();
        return redirect('/');
    }
}
