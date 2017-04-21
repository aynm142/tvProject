<?php

namespace App\Http\Controllers;


use App\Libs\PromocodeGenerator;
use App\Promocode;
use Carbon\Carbon;

class PromocodeController extends Controller
{
    public function index()
    {
        $all_promo = Promocode::paginate(25);

        return view('promocodes.promo', compact('all_promo'));
    }

    public function add()
    {
        $delete_time = Carbon::now()->addHours(10);

        $promo = new PromocodeGenerator();
        dd(

            $promo->generateAndSave(10, $delete_time)

        );

        return view('promocodes.add');
    }
}
