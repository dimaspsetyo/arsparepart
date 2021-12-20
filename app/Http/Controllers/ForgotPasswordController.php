<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ForgotPassword;
use Illuminate\Support\Str;

use DB;
use Mail;
use Hash;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function forgot()
    {
        $var_title = "ARSparepart | Lupa Password";
        return view('auth.forgot', compact('var_title'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postForgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);


        Mail::send('auth.sendEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'Kami sudah mengirimkan link ke email Anda!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function reset($token)
    {
        $var_title = "ARSparepart | Ganti Password";
        return view('auth.reset', ['token' => $token],  compact('var_title'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'min:6'
        ]);

        $updatePassword = ForgotPassword::where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        ForgotPassword::where(['email' => $request->email])->delete();

        return redirect('login')->with(['toast_success' => 'Password Berhasil Diubah!']);
    }
}
