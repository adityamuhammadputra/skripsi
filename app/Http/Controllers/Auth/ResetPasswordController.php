<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //custum agar user yang belum aktivasi tidak langsung masuk, tetapi harus aktivasi dulu saat lupa password

    protected function resetPassword($user, $password){
        $user->password = bcrypt($password);

        $user->setRememberToken(str_random(60));

        $user->save();

        if($user->active){
            $this->guard()->login($user);
        }
    }

    protected function sendResetResponse($response){
        return redirect()->route('login')
        ->withSucces('Password berhasil direset');
    }
}
