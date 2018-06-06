<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Singgah;
use App\SinggahComment;

class SinggahCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,Singgah $id)
    {
        $data = [
            'user_id' => auth()->id(),               
            'singgah_id' => $id->id,
            'comment' => $request->comment,
        ];

        return SinggahComment::create($data);
    }

    public function destroy($id)
    {
        SinggahComment::destroy($id);
    }
}
