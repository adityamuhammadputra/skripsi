<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

///didie
class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //tambahan untuk login 
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => [
                'required','string',
                Rule::exists('users')->where(function($query){
                    $query->where('active',true);
                })
            ],
            'password' => 'required|string',
        ], $this->validationError());
    }

    //untuk memanggul suatu validasi error dan nilai baliknya array
    public function validationError(){
        return [
            $this->username() . '.exists' => 'Silahkan cek kembali akun anda atau Email anda mungkin belum diaktivasi'
        ];
    }
}
///didie
