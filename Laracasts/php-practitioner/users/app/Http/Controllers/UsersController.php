<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        // if you were to just return $users here instead, it'd be converted to json
        // Useful for APIs
         // return $users;

        return view('users/index', ["users" => $users]);
    }

    public function store()
    {
        $user = new User();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('name'));
        $user->save();

        return back();

        // User::create(request()->all()) shorthand with the proper production in place
    }
}
