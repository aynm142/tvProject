<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\PromocodeGenerator;
use Carbon\Carbon;
use App\User_promo;

class PromocodeController extends Controller
{
    public function index()
    {
        $delete_time = Carbon::now()->addHours(10);

        $promo = new PromocodeGenerator();
        dd(

            $promo->generateAndSave(10, $delete_time)

        );

        return 'promo';
    }

    public function add()
    {
        return view('promocodes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function input(Request $request)
    {
        $data = $request->all();
    }
}
