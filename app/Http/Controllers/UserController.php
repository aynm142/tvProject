<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
        return view('users.newuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["device_token"] = str_random();
        User::create($data);
        return redirect('/user/showAll');
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
            $user = User::findOrFail($id);
        } catch (\Exception $exception) {
            abort(404);
        }
        return view('users.userprofile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Exception $exception) {
            abort(404);
        }
        return view('users.edituser', compact('user'));
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
        $this->validate(request(), [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();

        // check username in database
        if ($data['name'] != $user->name) {
            $this->validate(request(), [
               'name' => 'unique:users'
            ]);
        } else {
            // else set new username
        }

        // check email in database
        if ($data['email'] != $user->email) {
            $this->validate(request(), [
                'email' => 'unique:users'
            ]);
        } else {
            // else set new email
        }

        // check if user put new password
        if ($data['password']) {
            $this->validate(request(), [
                'password' => 'min:6',
            ]);
            $data['password'] = bcrypt($data['password']);
        } else { // else set old password
            $data["password"] = $user->password;
        }
        $user->update($data);


        return redirect('/user/showAll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response|mixed
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // allow to delete all users,
        // but prevent to delete current admin account
        if ($user->is_admin === 1 && intval($user->id) === \Auth::id()) {
            $message = ["error" => "You can't remove self admin account"];
            // if is ajax request -> send json data
            if (request()->ajax()) {
                return response()->json($message);
            }
            // or just go back with error message
            return back()->withErrors($message);
        }

        $user->delete();

        if (request()->ajax()) {
            return response()->json(["success" => "Successfully remove"]);
        }

        return redirect('/user/showAll');
    }

    public function api(Request $request)
    {
        $data = $request->All();
        $login = $data['login'];
        $password = $data['password'];
        $token = $data['token'];
        $isLoginTrue = false;
        $isPasswordTrue = false;

        // Check the login
        if (User::where('email', $login)->count()) {
            $isLoginTrue = true;
        } else {
            return response()->json(['response' => 'Login not found'], 401);
        }

        // check the password
        $userInfo = User::where('email', $login)->get();
        if (isset($userInfo[0])) {
            if (password_verify($password, $userInfo[0]->password)) {
                $isPasswordTrue = true;
            } else {
                return response()->json(['response' => 'Wrong password'], 401);
            }
        }

        // Generate new device token
        if ($isLoginTrue && $isPasswordTrue) {
            $userInfo[0]->device_token = $token;
            $userInfo[0]->save();
            return response()->json(['response' => 'All right!'], 200);
        } else {
            return response()->json(['response' => 'Something wrong'], 401);
        }
    }

    public function showAllUsers()
    {
        $users = User::all();
        return view("users.showusers", compact("users"));
    }
}
