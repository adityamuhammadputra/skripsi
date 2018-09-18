<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\InfoComment;
use App\User;

use View;
use Session;


class InfoCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function store(Request $request,Info $id)
    {
        $data = [
            'user_id' => auth()->id(),               
            'info_id' => $id->id,
            'comment' => $request->comment,
            'ratting' => $request->ratting
        ];

        InfoComment::create($data);
        Session::flash('success', 'Ulasan Ditambah');
        return View::make('layouts/partials/_alertajax');
    }

    public function destroy($id)
    {
        InfoComment::destroy($id);

        Session::flash('error', 'Ulasan Dihapus');
        return View::make('layouts/partials/_alertajax');
    }
}
