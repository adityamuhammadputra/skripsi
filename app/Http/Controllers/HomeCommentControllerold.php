<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\PostComment;


class HomeCommentController extends Controller
{
    public function store(Request $request,Post $id)
    {

        PostComment::create([
            'post_id' => $id->id,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);
        return redirect()->back()->withInfo('Comment berhasil ');
    }

    public function destroy(PostComment $id)
    {
        $id->delete();

        return redirect()->back()->withDanger('Data berhasil dihapus');
    }

}
