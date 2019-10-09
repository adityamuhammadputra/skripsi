<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singgah;
use App\User;
use App\PostLikes;
use Session;
use View;
use Illuminate\Support\Facades\DB;

class HomeLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $checklike = PostLikes::where('post_id', '=', $request['post_id'])
            ->where('user_id', '=', auth()->id())
            ->first();

        if ($checklike === null) {
            $data = [
                'post_id' => $request['post_id'],
                'user_id' => auth()->id(),
                // 'likes' => 1
            ];
            PostLikes::create($data);
            Session::flash('info', 'Anda menyukai kiriman ini');
        } else {

            PostLikes::destroy($checklike->id);

            Session::flash('error', 'Anda batal menyukai kiriman ini');

        }


        return View::make('layouts/partials/_alertajax');
    }

    public function show($id)
    {
        $datalike = PostLikes::with('user')
            ->where('post_id', $id)->get();

        return $datalike;
    }

}
