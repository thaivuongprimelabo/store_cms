<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use App\Models\User;
use Auth;
use Route;
use Hash;

class LoginController extends AppController
{
    /**
     * login
     */
    public function login(Request $request) {
        if($request->isMethod('post')) {

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|min:8|max:30'
            ];

            $validator = $request->validate($rules);

            // do login
            $email = $request->input('email');
            $password = $request->input('password');
            $credential = [
                'email' => $email,
                'password' => $password
            ];

            if(Auth::attempt($credential)) {
                return redirect(route($this->prefix_route . 'dashboard'));
            } else {
                return back()->withInput()->with('login.error', 'Tài khoản hoặc mật khẩu không chính xác.');
            }
        }
        return view($this->prefix_view . 'login');
    }

    /**
     * login
     */
    public function register(Request $request) {

        if($request->isMethod('post')) {
            $email = $request->input('email');
            $password = $request->input('password');

            $user = new User();
            $user->name = 'sample user';
            $user->email = $email;
            $user->password = Hash::make($password);
            
            if($user->save()) {
                return redirect(route($this->prefix_route . 'login'));
            }
            
        }

        return view($this->prefix_view . 'register');
    }

    /**
     * logout
     */
    public function logout(Request $request) {
        Auth::logout();
        return redirect(route($this->prefix_route . 'login'));
    }
}
