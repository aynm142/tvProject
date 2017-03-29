<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Video;
use Illuminate\Support\Facades\Input;

class Tv extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function createCategory()
    {
        return view('newcat');
    }

    public function storeCategory(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('/');
    }

    public function createVideo()
    {
        return view('newvideo');
    }

    public function storeVideo()
    {
        $name_logo = Input::file('logo_url')->getClientOriginalName();
        $extension_logo = Input::file('logo_url')->getClientOriginalExtension();

        $name_background = Input::file('background_url')->getClientOriginalName();
        $extension_background = Input::file('background_url')->getClientOriginalExtension();

        $name_video = Input::file('video_url')->getClientOriginalName();
        $extension_video = Input::file('video_url')->getClientOriginalExtension();

        $video = Video::create([
            'video_name' => request('video_name'),
            'description' => request('description'),
            'video_url' => $name_video,
            'logo_url' => $name_logo,
            'background_url' => $name_background,
            'category_id' => 1
        ]);

        $video->logo_url = '/pubic/images/logo/' . $video->id . 'l.' . $extension_logo;
        $video->background_url = '/public/images/background/' . $video->id . 'b.' . $extension_background;
        $video->video_url = '/public/videos/' . $video->id . 'v.' . $extension_video;
        $video->save();

        $file_logo = Input::file('logo_url');
        $path_logo = public_path('images/logo/');
        $file_logo->move($path_logo, $video->logo_url);

        $file_background = Input::file('background_url');
        $path_background = public_path('images/background/');
        $file_background->move($path_background, $video->background_url);

        $file_video = Input::file('video_url');
        $path_video = public_path('videos/');
        $file_video->move($path_video, $video->video_url);

        return redirect('/');
    }


    public function categoryAPI()
    {
        return Category::all();
    }

    public function videoAPI()
    {
        return Video::all();
    }
}

