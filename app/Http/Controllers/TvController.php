<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\NewUserWelcome;
use Auth;
use App\User;
//use App\Http\Requests\CategoryRequest;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
//use App\Category;
//use App\Video;
//use Illuminate\Support\Facades\Input;

class TvController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function email()
    {
        $userEmails = User::all();
        foreach ($userEmails as $userEmail) {
            Mail::to($userEmail->email)->send(new NewUserWelcome());
        }
        return redirect('/');
    }


}

