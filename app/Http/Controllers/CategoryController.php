<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\User;
use App\Video;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
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
        return view('newcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('/category/show/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('catedit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('/category/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/category/show');
    }

    public function api(Request $request)
    {
        $categories = ['category' => []];

        foreach (Category::all() as $category) {
            $categories['category'][] = $category->toArray();
        }

        return Response::json($categories);
    }

    public function showAll()
    {
        $categories = Category::All();
        return view('showcat', compact('categories'));
    }
}
