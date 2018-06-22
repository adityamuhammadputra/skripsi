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
        // $email = Crypt::decrypt($email);
        $data = User::where('email', $email)->first();
        // return $data;
        return view('profile',compact('data'));
        // return response()->json([
        //     $data
        // ]);
    }

    public function showuser($id)
    {
        
        // $id = Crypt::decrypt($id);
        // return $id;
        
        $dataprofile = User::where('email', $id)->first();
        // return $dataprofile;
        return view('profile', compact('dataprofile'));

        // $news = News::find($news);
        // return view('profile')->with('data' ,$email);
    }

    public function search()
    {
        $data = User::select('name','email','avatar','pekerjaan')->get();
        

        // return response()->json([
        //     $data
        // ]);

        return json_encode($data);
    }

    
}
