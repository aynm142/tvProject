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
    public function createCategory()
    {
        return view('newcat');
    }

    public function storeCategory(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('/');
    }

    public function showCategory($id)
    {
        $videos = Video::where('category_id', $id)->get();
        return $videos;
    }

    public function showCategories()
    {
        $categories = DB::table('categories')->pluck('category_name');
        return view('showcat', compact('categories'));
    }

    public function categoryAPI()
    {
        return Category::all();
    }
}
