<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Video;
use Trexology\Promocodes\Facades\PromocodesFacade;


class TvController extends Controller
{

    public function index()
    {
        $promo = PromocodesFacade::generate(5);
        dd($promo);
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

