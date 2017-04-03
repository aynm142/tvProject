<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageRequest;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'logo_url' => 'required|image|mimes:jpeg,bmp,png,jpg',
            'background_url' => 'required|image|mimes:jpeg,bmp,png,jpg',
            'video_url.*' => 'required|mimetypes:video/mp4',
        ]);

        die('xsxsx');

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

        $video->logo_url = url('images/logo') . '/' .$video->id . 'l.' . $extension_logo;
        $video->background_url = url('images/background') . '/' . $video->id . 'b.' . $extension_background;
        $video->video_url = url('videos/') . '/' . $video->id . 'v.' . $extension_video;

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $video = Video::findOrFail($id);
            return $video;
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect('/video/showAll');
    }

    public function videoApi()
    {
        return Video::all();
    }

    public function showAll()
    {
        $videos = Video::All();
        return view('showvideos', compact('videos'));
    }
}
