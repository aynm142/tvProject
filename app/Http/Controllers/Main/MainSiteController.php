<?php

namespace App\Http\Controllers\Main;


use App\Http\Controllers\Controller;
use App\Category;

class MainSiteController extends Controller
{
    public function index()
    {
        $categories = Category::
        where('category_name', '!=', 'None Category')
            ->orderBy('category_name')
            ->get();

        return view('main.index.home', compact('categories'));
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
