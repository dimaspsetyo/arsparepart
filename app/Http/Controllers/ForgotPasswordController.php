<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ForgotPassword;
use Illuminate\Support\Str;

use Auth, DB, Hash, Mail, Carbon\Carbon;

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
            'email' => 'required|email'
        ]);

        $token = Str::random(64);
        $users = User::where('email', '=', $request->input('email'))->first();

        if ($users === null) {
            return back()->with('message', 'Link tautan sudah dikirimkan. Silahkan cek Email Anda!');
        }

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);


        Mail::send('auth.sendEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'Link tautan sudah dikirimkan. Silahkan cek Email Anda!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function reset($token)
    {
        $var_title = "ARSparepart | Ubah Password";
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
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function password()
    {
        $var_title = "ARSparepart | Ubah Password";
        return view('admin.password', compact('var_title'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postPassword(Request $request)
    {

        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:6|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'min:6'
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            if (!Hash::check($request->password, auth()->user()->password)) {

                auth()->user()->update(['password' => Hash::make($request->password)]);
                return redirect('password')->with(['toast_success' => 'Password Berhasil Diubah!']);
                // dd('success');
            }
            return back()->with('message', 'Password Baru tidak boleh sama dengan Password Lama!');
        }
    }
}
