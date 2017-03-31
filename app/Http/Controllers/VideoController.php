<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\User;
use App\Video;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function createVideo()
    {
        $categories_list = Category::pluck('category_name', 'id');
        return view('newvideo', compact('categories_list'));
    }

    public function storeVideo()
    {
        $this->validate(request(), [
            'logo_url' => 'required|image|mimes:jpeg,bmp,png,jpg',
            'background_url' => 'required|image|mimes:jpeg,bmp,png,jpg',
            'video_url' => 'required|mimetypes:video/mp4',
        ]);
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
            'category_id' => request('category'),
        ]);

        $video->logo_url = 'http://test1.a2-lab.com/images/logo/' . $video->id . 'l.' . $extension_logo;
        $video->background_url = 'http://test1.a2-lab.com/images/background/' . $video->id . 'b.' . $extension_background;
        $video->video_url = 'http://test1.a2-lab.com/videos/' . $video->id . 'v.' . $extension_video;
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

    public function videoAPI()
    {
        return Video::all();
    }
}
