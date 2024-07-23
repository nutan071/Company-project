<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{

    public function index()
    {
        return view('user.dashboard');
    }

    public function dashboard()
    {
        $products = Products::all();
        // dd($products);
        return view('user.dashboard', compact('products'));
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|min:6',
            ]);

            // if ($validator->fails()) {
            //     // echo "<pre>";print_r($validator->fails());die();
            //     return redirect()->back()->withErrors($validator)->withInput();
            // }

            try {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role_id' => 2,
                ]);
                event(new Registered($user));

                Auth::login($user);

                if ($user->role_id === 1) {
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('user.dashboard');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Registration failed! Please try again.');
            }
        }

    //         } catch (\Exception $e) {
    //             print_r($e->getMessage());die();
    //         }


    //         return redirect('login')->with('success', 'Registration successful! Please log in.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Registration failed! Please try again.');



    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        

        if (Auth::attempt($credentials)) {
            // echo '<pre>';print_r(Auth::user());die;

            $user = Auth::user();

            // echo "<pre>";print_r($user);die;
            if ($user->role_id === 1) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
