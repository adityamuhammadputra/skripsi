<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\PostComment;
use App\User;
use View;
use Illuminate\Support\Facades\Auth;
use Session;


class HomeCommentController extends Controller
{

    public function store(Request $request,Post $id)
    {
        $data = [
            'user_id' => auth()->id(),               
            'post_id' => $id->id,
            'comment' => $request->comment,
        ];

        PostComment::create($data);

        Session::flash('success', 'Komentar Ditambah');
        return View::make('layouts/partials/_alertajax');
    }
   
    public function destroy($id)
    {
        PostComment::destroy($id);
        Session::flash('error', 'Komentar Dihapus');
        return View::make('layouts/partials/_alertajax');
    }
}
