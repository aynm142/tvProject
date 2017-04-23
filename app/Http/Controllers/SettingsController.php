<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Support\Facades\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $data = Settings::all()->first();
        return view('settings.settings', compact('data'));
    }

    public function update()
    {
        Settings::all()->first()->update(Request::all());
        return redirect('/dashboard');
    }
}
