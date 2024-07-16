<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function index(Request $request)
    {
        $users = User::all();

        return view("products.index", compact("users"));
    }




}
