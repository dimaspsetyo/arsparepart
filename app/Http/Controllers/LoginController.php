<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6'
        ]);
        //  dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('sparepart');
        };
        return back()->with('message', 'Password salah!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function index()
    {
        $var_title = "ARSparepart | Masuk";
        return view('auth.login', compact('var_title'));
    }
}
