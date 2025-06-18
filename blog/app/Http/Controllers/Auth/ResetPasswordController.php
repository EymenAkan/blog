<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;

class ResetPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $token
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request, $token)
    {
        return view('frontend.auth.reset', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    /**
     * Handle an incoming password reset request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRule::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ]);

        // Şifre sıfırlama işlemini gerçekleştir
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // Başarılıysa kullanıcıyı giriş yap ve yönlendir
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __('Şifreniz başarıyla sıfırlandı! Şimdi giriş yapabilirsiniz.'));
        }

        // Hata varsa geri dön
        return back()->withErrors(['email' => [__($status)]]);
    }
}
