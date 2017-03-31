<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\User;
use App\Video;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function create()
    {
        return view('newcat');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('/');
    }

    public function show($id)
    {
        $videos = Video::where('category_id', $id)->get();
        if (empty($videos)) {
            return redirect('/');
        }
        return $videos;
    }

    public function showAll()
    {
        $categories = DB::table('categories')->pluck('category_name');
        return view('showcat', compact('categories'));
    }

    public function api()
    {
        return Category::all();
    }
}
