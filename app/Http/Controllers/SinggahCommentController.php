<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Singgah;
use App\SinggahComment;

use View;
use Session;


class SinggahCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,Singgah $id)
    {
        // return $request;
        $data = [
            'user_id' => auth()->id(),               
            'singgah_id' => $id->id,
            'comment' => $request->comment,
            'ratting' => $request->ratting
        ];

        SinggahComment::create($data);

        Session::flash('success', 'Ulasan Ditambah');
        return View::make('layouts/partials/_alertajax');
    }

    public function destroy($id)
    {
        SinggahComment::destroy($id);

        Session::flash('error', 'Ulasan Dihapus');
        return View::make('layouts/partials/_alertajax');
    }
}
