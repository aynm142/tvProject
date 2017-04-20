<?php

namespace App\Http\Controllers\Main;


use App\Http\Controllers\Controller;
use App\Category;

class MainSiteController extends Controller
{
    public function __construct()
    {
        $categories = Category::
        where('category_name', '!=', 'None Category')
            ->orderBy('category_name')
            ->get();

        view()->share('categories', $categories);
    }

    public function index()
    {
        

        return view('main.index.home');
    }

    public function video()
    {
        //
    }

    public function category()
    {
        //
    }
}
