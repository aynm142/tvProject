<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Video;

class DashboardController extends Controller
{
    public function index()
    {
        $statistic = [];
        $statistic["totalUsers"] = User::count();
        $statistic["totalVideos"] = Video::count();
        $statistic["totalCategories"] = Category::count();
        $statistic["totalSubscribes"] = 0;
        return view('index', compact('statistic'));
    }
}
