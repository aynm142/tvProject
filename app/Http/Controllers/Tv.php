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

        $video = Video::create([
            'video_name' => request('video_name'),
            'description' => request('description'),
            'logo_url' => $name_logo,
            'category_id' => 1
        ]);

        $video->logo_url = $video->id . '.' . $extension_logo;
        $video->save();

        $file_logo = Input::file('logo_url');
        $path_logo = public_path('images/logo/');
        $file_logo->move($path_logo, $video->logo_url);

        return redirect('/');
    }


    public function categoryAPI()
    {
        return Category::all();
    }
}

