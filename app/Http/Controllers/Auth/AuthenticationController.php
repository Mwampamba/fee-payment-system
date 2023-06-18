<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticationController extends Controller
{
    public function get_login()
    {
        return view('authentication.login');
    }

    public function post_login(LoginRequest $request)
    {
        if (Auth::attempt($request->only([
            'email', 'password'
        ]))) {
            return redirect()->route('dashboard');
        } else {

            if (Auth::guard('student')->attempt($request->only([
                'email', 'password'
            ]))) {
                return redirect()->route('studentDashboard');
            } else {
                return redirect()->back()->with('error', 'You have entered invalid credentials');
            }

            return redirect()->back()->with('error', 'You have entered invalid credentials');
        }
    }

    public function get_forgot_password()
    {
        $title = [
            'title' => 'Password recovery'
        ];
        return view('authentication.forget-password', $title);
    }

    public function post_forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $activation_link = route('resetPassword', [
            'token' => $token,
            'email' => $request->email,
        ]);
        
        $body = "Reset password by clicking the link below";

        Mail::send(
            'authentication.email-verification',
            ['activation_link' => $activation_link, 'body' => $body],
            
            function ($message) use ($request) {
                $message->from('info@uaut.ac.tz', 'Fee Payment System');
                $message->to($request->email, $request->email)
                    ->subject('Reset Your Password');
            }
        );

        return redirect()->back()->with('success', 'The link has been sent to your email');
    }

    public function reset_password(Request $request, $token = null)
    {
        return view('authentication.update-password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
            'repeat_password' => 'required|same:password'
        ]);

        $verified_token = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$verified_token) {
            return back()->withInput()->with('error', 'Activation link is arleady expired!');
        } else {
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_reset_tokens')->where([
                'email' => $request->email
            ])->delete();

            return redirect()->route('getLogin')->with('success', 'Your password has been changed.');
        }
    }

    public function studentGetForgotPassword()
    {
        $title = [
            'title' => 'Password recovery'
        ];
        return view('authentication.student.forget-password', $title);
    }

    public function studentPostForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email'
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $activation_link = route('studentResetPassword', [
            'token' => $token,
            'email' => $request->email,
        ]);
        
        $body = "Reset password by clicking the link below";

        Mail::send(
            'authentication.email-verification',
            ['activation_link' => $activation_link, 'body' => $body],
            
            function ($message) use ($request) {
                $message->from('info@uaut.ac.tz', 'Fee Payment System');
                $message->to($request->email, $request->email)
                    ->subject('Reset Your Password');
            }
        );

        return redirect()->back()->with('success', 'The link has been sent to your email');
    }

    public function studentResetPassword(Request $request, $token = null)
    {
        return view('authentication.student.update-password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function studentUpdatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email',
            'password' => 'required|min:8',
            'repeat_password' => 'required|same:password'
        ]);

        $verified_token = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$verified_token) {
            return back()->withInput()->with('error', 'Activation link is arleady expired!');
        } else {
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_reset_tokens')->where([
                'email' => $request->email
            ])->delete();

            return redirect()->route('getLogin')->with('success', 'Your password has been changed.');
        }
    }

}
