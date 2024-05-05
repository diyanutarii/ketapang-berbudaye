<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function login()
    {
        $data['title'] = Lang::get('auth/login.head-title');

        return view('admin.auth.login', $data);
    }

    function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $request->ajax()
                ? response()->json([
                    'code' => 200,
                    'status' => 'Authorized',
                    'message' => __('responses.login.success.message'),
                    'caption' => __('responses.login.success.caption'),
                ])
                : redirect('/dashboard')->with([
                    'message' => __('responses.login.success.message'),
                ]);
        } else {
            return $request->ajax()
                ? response()->json([
                    'code' => 401,
                    'status' => 'Unauthorized',
                    'message' => __('responses.login.error.message'),
                    'caption' => __('responses.login.error.caption'),
                ])
                : back()->withErrors([
                    'message' => __('responses.login.error.message') . "\t" . __('responses.login.error.caption'),
                ]);
        }
    }

    function forgotPassword()
    {
        $data['title'] = Lang::get('auth/forgot-password.head-title');

        return view('admin.auth.forgot-password', $data);
    }

    function forgotPasswordProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return $request->ajax()
                ? response()->json([
                    'code' => 202,
                    'status' => 'Email Sent',
                    'message' => __('responses.forgot-password.success.message'),
                    'caption' => __('responses.forgot-password.success.caption'),
                ])
                : back()->with([
                    'message' => __('responses.forgot-password.success.message') . "\t" . __('responses.forgot-password.success.caption'),
                ]);
        } else {
            return $request->ajax()
                ? response()->json([
                    'code' => 404,
                    'status' => 'Email Not Send',
                    'message' => __('responses.forgot-password.error.message'),
                    'caption' => __('responses.forgot-password.error.caption'),
                ])
                : back()->withErrors([
                    'message' => __('responses.forgot-password.error.message') . "\t" . __('responses.forgot-password.error.caption'),
                ]);
        }
    }

    function resetPassword(Request $request)
    {
        $data['title'] = Lang::get('auth/reset-password.head-title');
        $data['user'] = Admin::where('email', $request->email)->firstOrFail();
        $data['token'] = $request->token;

        return view('admin.auth.reset-password', $data);
    }

    function resetPasswordProcess(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ], [
            'password_confirmation.required' => 'konfirmasi password wajib diisi.',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Admin $admin, string $password) {
                $admin->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $admin->save();

                event(new PasswordReset($admin));
            }
        );

        if ($response === Password::PASSWORD_RESET) {
            return $request->ajax()
                ? response()->json([
                    'code' => 200,
                    'status' => 'Password Resetted',
                    'message' => __('responses.reset-password.success.message'),
                    'caption' => __('responses.reset-password.success.caption'),
                ])
                : redirect('/login')->with([
                    'message' => __('responses.reset-password.success.message') . "\t" . __('responses.reset-password.success.caption'),
                ]);
        } else {
            return $request->ajax()
                ? response()->json([
                    'code' => 401,
                    'status' => 'Failed',
                    'message' => __('responses.reset-password.error.message'),
                    'caption' => __('responses.reset-password.error.caption'),
                ])
                : back()->withErrors([
                    'message' => __('responses.reset-password.error.message') . "\t" . __('responses.reset-password.error.caption'),
                ]);
        }
    }

    function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
