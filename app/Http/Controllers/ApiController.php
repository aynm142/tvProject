<?php

namespace App\Http\Controllers;

use App\Video;
use App\Category;
use Illuminate\Support\Facades\Response;


class ApiController extends Controller
{
    public function categoryApi()
    {
        $categories = ['category' => []];

        foreach (Category::all() as $category) {
            $categories['category'][] = $category->toArray();
        }

        return \response()->json($categories);
    }

    public function videoApi()
    {
        $videos = Video::all();
        foreach ($videos as $video) {
            $video->video_url = $video->getVideoUrl();
        }
        return $videos;
    }

    public function categoryShow($id)
    {
        try {
            Category::findOrFail($id);
            $category = [];
            $videos = (Video::where('category_id', $id)->get());
            foreach ($videos as $video) {
                if (isset($video)) {
                    $video->video_url = $video->getVideoUrl();
                } else {
                    $video->video_url = [];
                }
                $category['videos'][] = $video->toArray();
            }

            return Response::json($category);

        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function videoShow($id)
    {
        try {
            $video = Video::findOrFail($id);
            return $video;
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
