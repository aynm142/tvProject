<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\PromocodeGenerator;
use App\Promocode;
use Carbon\Carbon;
use App\User_promo;

class PromocodeController extends Controller
{
    public function index()
    {
        $all_promo = Promocode::paginate(25);

        return view('promocodes.promo', compact('all_promo'));
    }

    public function delete($id)
    {
        $code = Promocode::find($id);
        if ($code) {
            $code->delete();
        }

        return redirect()->route('promo.show');
    }

    public function add()
    {
        return view('promocodes.add');
    }

    public function addPost(Request $request)
    {
    	if ( $promo_number = (int) $request->get('__generate_random') ) {
    		// make positive
    		$promo_number = max(1, $promo_number);
    		// generate promo codes and save to DB
    		(new PromocodeGenerator)->generateAndSave($promo_number);

    		return redirect()->route('promo.show');
    	}

    	$this->validate($request, [
    		'code' => 'required',
    		'delete_time' => 'required'
    	]);

    	$code = $request->get('code');
    	$generator = new PromocodeGenerator();

    	if (!$generator->validate($code)) {
    		return back()->withErrors([
    			'code' => 'This promo code already taken'
    		]);
    	}

    	$delete_time = Carbon::createFromFormat('d/m/Y H:i', $request->get('delete_time'));
    	$promo = $generator->generateCodeName($code, $delete_time);

    	if (false === $promo) {
    		return back()->withErrors(['error' => 'Whoops some error..']);
    	}

    	return redirect()->route('promo.show');
    }

    public function generateCode()
    {
    	$code = (new PromocodeGenerator)->generate();

    	return response()->json([
    		'code' => $code[0]
    	]);
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
