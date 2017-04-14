<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;
use App\Category;
use App\Video;

class TvController extends Controller
{

    public function index()
    {
        $statistic = [];
        $totalUsers = User::count();
        $totalVideos = Video::count();
        $totalCategories = Category::count();
        $totalSubscribers = 0;
        $statistic["totalUsers"] = $totalUsers;
        $statistic["totalVideos"] = $totalVideos;
        $statistic["totalCategories"] = $totalCategories - 1;
        $statistic["totalSubscribes"] = $totalSubscribers;
        return view('index', compact('statistic'));
    }
}

