<?php

namespace App\Http\Controllers\Main;


use App\Http\Controllers\Controller;
use App\Category;
use App\Video;
use App\Settings;

class MainSiteController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $categories = Category::where('category_name', '!=', 'None Category')
            ->orderBy('category_name')
            ->get();
        view()->share('categories', $categories);

        $settings = Settings::all()->first();
        view()->share('site_name', $settings->site_name);
        view()->share('main_bg', $settings->background_image);
        view()->share('logo_image', $settings->logo_image);
        view()->share('banner', $settings->banner);
    }

    /**
     * Show main page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        return view('main.index.home');
    }

    /**
     * Show page with current video
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function video($id)
    {
        $video = null;
        try {
            $video = Video::findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }

        view()->share('main_bg', $video->background_url);

        return view('main.video.show', compact('video'));
    }

    public function category()
    {
        //
    }

    public function main()
    {
        //
    }
}
