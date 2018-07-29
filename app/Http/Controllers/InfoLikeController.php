<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Info;
use App\InfoComment;
use App\InfoLikes;
use Session;
use View;
use Illuminate\Support\Facades\DB;

class InfoLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $checklike = InfoLikes::where('info_id', '=', $request['info_id'])
        ->where('user_id', '=', auth()->id())
        ->first();

        if ($checklike === null) {
            $data = [
                'info_id' => $request['info_id'],
                'user_id' => auth()->id()
            ];
            InfoLikes::create($data);
            Session::flash('info', 'Anda menyukai kiriman ini');
        }
        else{
       
            InfoLikes::destroy($checklike->id);

            Session::flash('error', 'Anda batal menyukai kiriman ini');

        }

       
        return View::make('layouts/partials/_alertajax');
    }

    public function show($id)
    {
        $datalike = InfoLikes::with('user')
        ->where('info_id',$id)->get();

        return $datalike;
    }

}
