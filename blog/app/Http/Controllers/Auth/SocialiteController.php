<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            // Stateless modunu devre dışı bırakarak state kontrolünü sağla
            $socialUser = Socialite::driver($provider)->stateless()->user();

            $user = User::firstOrCreate(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider],
                [
                    'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'Unknown User',
                    'email' => $socialUser->getEmail() ?? ($socialUser->getId() . '@' . $provider . '.local'),
                ]
            );

            $role = Role::firstOrCreate(['name' => 'user']);
            $user->roles()->syncWithoutDetaching([$role->id]);

            auth()->login($user, true);

            return redirect()->route('index');
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            \Log::error('Socialite InvalidStateException: ' . $e->getMessage(), ['provider' => $provider]);
            return redirect()->route('login.form')->withErrors(['error' => 'Sosyal giriş başarısız: Geçersiz durum (state). Lütfen tekrar deneyin.']);
        } catch (\Exception $e) {
            \Log::error('Socialite callback error: ' . $e->getMessage(), ['provider' => $provider]);
            return redirect()->route('login.form')->withErrors(['error' => 'Sosyal giriş başarısız: ' . $e->getMessage()]);
        }
    }
}
