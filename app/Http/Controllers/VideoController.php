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

        $links = $this->__saveVideoFiles(request()->video_url);

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
        // validation rules
        $validation_rules = [];
        if ( request('logo_url') ) {
            $validation_rules['logo_url'] = 'required|image|mimes:jpeg,bmp,png,jpg';
        }

        if ( request('background_url') ) {
            $validation_rules['background_url'] = 'required|image|mimes:jpeg,bmp,png,jpg';
        }

        if ( request('video_url') ) {
            $validation_rules['video_url.*'] = 'required|mimetypes:video/mp4';
        }

        if (count($validation_rules)) {
            $this->validate(request(), $validation_rules);
        }

        $video = Video::findOrFail($id);

        $old_video_links = (array)$request->old_video;
        foreach ($video->getVideoUrl() as $link) {
            if (!in_array($link, $old_video_links)) {
                // delete video file
                $this->__deleteOldFileByLink($link);
            }
        }

        // merge old links with new
        $links = array_merge($old_video_links, $this->__saveVideoFiles(request()->video_url));

        $video->video_name = request('video_name');
        $video->description = request('description');
        $video->category_id = request('category');
        $video->video_url = serialize($links);

        // logo image
        if (request('logo_url') && $logo_image = Input::file('logo_url')) {
            $this->__deleteOldFileByLink($video->logo_url);

            // update logo image url
            $video->logo_url = url('images/logo') . '/' . uniqid($video->id . 'l_') . '.' . $logo_image->getClientOriginalExtension();

            $logo_image->move(public_path('images/logo/'), $video->logo_url);
        }

        // background image
        if (request('background_url') && $background_image = Input::file('background_url')) {
            $this->__deleteOldFileByLink($video->background_url);

            // update background image url
            $video->background_url = url('images/background') . '/' . uniqid($video->id . 'b_') . '.' . $background_image->getClientOriginalExtension();

            $background_image->move(public_path('images/background/'), $video->background_url);
        }

        try {
            // try to update video
            if (!$video->save()) throw new \Exception("Unable to save");
        } catch (\Exception $e) {
            // return to back and display error message
            return back()->withErrors(
                ['message' => 'Unable to update video.']
            );
        }

        return redirect('video/showAll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        $this->__deleteOldFileByLink($video->logo_url);
        $this->__deleteOldFileByLink($video->background_url);

        foreach ($video->getVideoUrl() as $vid) {
            $this->__deleteOldFileByLink($vid);
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

    protected function __deleteOldFileByLink($link)
    {
        $old_file = public_path(str_replace(\Request::root(), '', $link));
        if (file_exists($old_file)) {
            // delete old file
            \File::delete($old_file);
        }
    }

    protected function __saveVideoFiles($files)
    {
        $links = [];
        if (is_array($files) && count($files)) {
            foreach ($files as $video) {
                $extension_video = $video->getClientOriginalExtension();

                $url = url('videos/') . date("") . '/' . rand(255, 2155) . uniqid() . 'v.' . $extension_video;
                $video->move(public_path('videos/'), $url);

                $links[] = $url;
            }
        }

        return $links;
    }
}
