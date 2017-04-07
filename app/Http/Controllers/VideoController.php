<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageRequest;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\User;
use App\Video;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_list = Category::pluck('category_name', 'id');
        return view('newvideo', compact('categories_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'logo_url' => 'required|image|mimes:jpeg,bmp,png,jpg',
            'background_url' => 'required|image|mimes:jpeg,bmp,png,jpg',
            'video_url.*' => 'required|mimetypes:video/mp4',
        ]);

        $name_logo = Input::file('logo_url')->getClientOriginalName();
        $extension_logo = Input::file('logo_url')->getClientOriginalExtension();

        $name_background = Input::file('background_url')->getClientOriginalName();
        $extension_background = Input::file('background_url')->getClientOriginalExtension();

        $videos = request()->video_url;
        $links = [];
        if (is_array($videos) && count($videos)) {
            foreach ($videos as $video) {
                $extension_video = $video->getClientOriginalExtension();

                $url = url('videos/') . '/' . rand(255, 2155) . uniqid() . 'v.' . $extension_video;
                $video->move(public_path('videos/'), $url);

                $links[] = $url;
            }
        } else {
            die('some problem');
        }

        $video = Video::create([
            'video_name' => request('video_name'),
            'description' => request('description'),
            'video_url' => serialize($links),
            'logo_url' => $name_logo,
            'background_url' => $name_background,
            'category_id' => request('category'),
        ]);

        $video->logo_url = url('images/logo') . '/' . $video->id . 'l.' . $extension_logo;
        $video->background_url = url('images/background') . '/' . $video->id . 'b.' . $extension_background;

        $file_logo = Input::file('logo_url');
        $path_logo = public_path('images/logo/');
        $file_logo->move($path_logo, $video->logo_url);

        $file_background = Input::file('background_url');
        $path_background = public_path('images/background/');
        $file_background->move($path_background, $video->background_url);

        $video->save();

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $categories_list = Category::pluck('category_name', 'id');
        return view('videdit', compact('video', 'categories_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $videoArray = $request->video_url;
        $links = [];
        if (is_array($videoArray) && count($videoArray)) {
            foreach ($videoArray as $video) {
                $links[] = $video;
            }
        }

        $video = Video::findOrFail($id);
        $video->update([
            'video_name' => request('video_name'),
            'description' => request('description'),
            'video_url' => serialize($links),
            'logo_url' => request('logo_url'),
            'background_url' => request('background_url'),
            'category_id' => request('category_id'),
        ]);
        $video->save();

        return redirect('video/showAll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $video = Video::findOrFail($id);
        foreach ($video->getVideoUrl() as $vid) {
            $arr = explode('/public', $vid);
            if (isset($arr[1])) {
                \File::delete(public_path($arr[1]));
            }
        }
        $video->delete();
        return redirect('/video/showAll');
    }

    public
    function showAll()
    {
        $videos = Video::All();
        return view('showvideos', compact('videos'));
    }
}
