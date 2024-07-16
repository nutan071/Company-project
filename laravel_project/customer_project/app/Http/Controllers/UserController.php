<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; 


class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
 
    
    
    // public function register(Request $request)
    // {
    //           try{
        
    //        $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6',
        
    //     ]);
 
 
            
    //         // echo "<pre>";print_r($request->all());die();
    //         User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
 
    //     return redirect('/login')->with('success', 'Registration successful! Please log in.');
    // }catch (\Exception $e) {

    //     return redirect()->back()->with('error', 'Registration failed! Please try again.');
    //     }
    // }

    

    public function register(Request $request)
    {
    try {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Registration failed! Please try again.');
    }
}




     
    public function showLoginForm()
    {
        return view('loginform');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // return redirect()->intended('/dashbord');
            return view('/dashbord');
        }
        
        return redirect('/')->with('error', 'Invalid credentials. Please try again.');
    }
}


