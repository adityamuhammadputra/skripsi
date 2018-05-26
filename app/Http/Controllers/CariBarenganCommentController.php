<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barengan;
use App\BarenganComment;
use App\User;

class CariBarenganCommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }

    public function create()
    {
        //
    }


    public function store(Request $request,Barengan $id)
    {
        $data = [
            'user_id' => auth()->id(),               
            'barengan_id' => $id->id,
            'comment' => $request->comment,
        ];

        return BarenganComment::create($data);
    }

    public function destroy($id)
    {
        //
    }
}
