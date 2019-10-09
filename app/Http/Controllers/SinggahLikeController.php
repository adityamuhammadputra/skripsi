<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singgah;
use App\User;
use App\SinggahLikes;
use Session;
use View;
use Illuminate\Support\Facades\DB;

class SinggahLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $checklike = SinggahLikes::where('singgah_id', '=', $request['singgah_id'])
        ->where('user_id', '=', auth()->id())
        ->first();

        if ($checklike === null) {
            $data = [
                'singgah_id' => $request['singgah_id'],
                'user_id' => auth()->id(),
                'likes' => 1
            ];
            SinggahLikes::create($data);
            Session::flash('info', 'Anda Begabung dengan barengan ini');
        }
        else{
       
            SinggahLikes::destroy($checklike->id);

            Session::flash('error', 'Anda batal bergabung dengan barengan ini');

        }
       
        return View::make('layouts/partials/_alertajax');
    }

    public function show($id)
    {
        $datalike = SinggahLikes::with('user')
        ->where('singgah_id',$id)->get();

        return $datalike;
    }

}
