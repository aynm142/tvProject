<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\NewUserWelcome;
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


    public function showUsers()
    {
        $users = User::all();
        return view("showusers", compact("users"));
    }

}

