<?php

namespace App\Http\Controllers;


use App\Libs\PromocodeGenerator;
use Carbon\Carbon;

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
}
