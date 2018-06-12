<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\InfoComment;
use App\User;

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
        ];

        return InfoComment::create($data);
    }

    public function destroy($id)
    {
        InfoComment::destroy($id);
    }
}
