<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login(): mixed
    {
        return Response('Login');
    }

    public function register(): mixed
    {
        return Response('Register');
    }

    public function forgotPassword(): mixed
    {
        return Response('Forgot Password');
    }

    public function resetPassword(string $token): mixed
    {
        return Response('Reset Password On Token');
    }

    public function logout(): RedirectResponse
    {
        $user = user('web');

        if (filled($user)) {
            activity()->causedBy($user)
                ->log('Logout');
        }

        Auth::logout();

        Session::flush();

        Session::regenerate();

        return redirect()->route('auth.login');
    }

    // public function createVerificationEmail(User $user): bool
    // {
    //     $token = Str::random(64);
    //     $mail = Mail::to($user->email);

    //     if (filled($user->email_verified_at)) {
    //         return false;
    //     }

    //     EmailVerificationToken::updateOrCreate(['email' => $user->email], [
    //         'type' => 'base64',
    //         'token' => $token,
    //         'created_at' => now(),
    //     ]);

    //     $mail->queue(new EmailVerificationMail($user, route('auth.verify.email', ['token' => $token])));

    //     return true;
    // }

    // public function verifyEmail(string $token): RedirectResponse
    // {
    //     $emailVerification = EmailVerificationToken::firstWhere('token', $token);

    //     if (empty($emailVerification)) {
    //         return redirect()->route('auth.login', ['statusmsg' => false, 'successmsg' => __('verification.token')]);
    //     }

    //     $user = User::firstWhere('email', $emailVerification->email);
    //     if (empty($user)) {
    //         return redirect()->route('auth.login', ['statusmsg' => false, 'successmsg' => __('verification.user')]);
    //     }

    //     $tokenExpiresAt = $emailVerification->created_at->addHours(config('auth.verification_timeout'));
    //     if (now()->gt($tokenExpiresAt)) {
    //         return redirect()->route('auth.login', ['statusmsg' => false, 'successmsg' => __('verification.expired')]);
    //     }

    //     $user->update(['email_verified_at' => date('Y-m-d H:i:s')]);

    //     Mail::to($user->email)->queue(new UserEmailVerifiedMail($user));

    //     return redirect()->route(
    //         auth('web')->check() ? 'my-profile' : 'auth.login',
    //         ['statusmsg' => true, 'successmsg' => __('verification.verified')]
    //     );
    // }
}
