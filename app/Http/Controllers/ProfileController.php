<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($email)
    {
        $email = Crypt::decrypt($email);
        $data = User::where('email', $email)->first();

        return view('profile',compact('data'));
        // return response()->json([
        //     $data
        // ]);
    }

    public function search()
    {
        $data = User::select('name','email','avatar')->get();
        

        // return response()->json([
        //     $data
        // ]);

        return json_encode($data);
    }

    
}
