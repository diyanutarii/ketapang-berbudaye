<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function login()
    {
        $data['title'] = __('contents.login.head-title');

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
                    'status' => 'authorized',
                    'message' => __('responses.login.success.caption'),
                ])
                : redirect('/dashboard')->with([
                    'message' => __('responses.login.success.message') . "\t" . __('responses.login.success.caption'),
                ]);
        } else {
            return $request->ajax()
                ? response()->json([
                    'code' => 401,
                    'status' => 'unauthorized',
                    'message' => __('responses.login.error.caption'),
                ])
                : back()->withErrors([
                    'message' => __('responses.login.error.message') . "\t" . __('responses.login.error.caption'),
                ]);
        }
    }

    function forgotPassword()
    {
        $data['title'] = __('contents.forgot-password.head-title');

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
                    'code' => 200,
                    'status' => 'sent',
                    'message' => __('responses.forgot-password.success.caption'),
                ])
                : back()->with([
                    'message' => __('responses.forgot-password.success.message') . "\t" . __('responses.forgot-password.success.caption'),
                ]);
        } else {
            return $request->ajax()
                ? response()->json([
                    'code' => 401,
                    'status' => 'failed',
                    'message' => __('responses.forgot-password.error.caption'),
                ])
                : back()->withErrors([
                    'message' => __('responses.forgot-password.error.message') . "\t" . __('responses.forgot-password.error.caption'),
                ]);
        }
    }

    function resetPassword(Request $request)
    {

        $data['title'] = __('contents.reset-password.head-title');
        $data['user'] = User::where('email', $request->email)->firstOrFail();
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
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($response === Password::PASSWORD_RESET) {
            return $request->ajax()
                ? response()->json([
                    'code' => 200,
                    'status' => 'success',
                    'message' => __('responses.reset-password.success.caption'),
                ])
                : redirect('/login')->with([
                    'message' => __('responses.reset-password.success.message') . "\t" . __('responses.reset-password.success.caption'),
                ]);
        } else {
            return $request->ajax()
                ? response()->json([
                    'code' => 401,
                    'status' => 'failed',
                    'message' => __('responses.reset-password.error.caption'),
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
