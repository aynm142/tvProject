<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Video;
use Illuminate\Support\Facades\Input;

class TvController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function test()
    {
        //
    }


}

