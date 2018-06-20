<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barengan;
use App\BarenganComment;
use App\User;
use View;
use Session;

class CariBarenganCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Barengan $id)
    {
        $data = [
            'user_id' => auth()->id(),               
            'barengan_id' => $id->id,
            'comment' => $request->comment,
        ];

        BarenganComment::create($data);

        Session::flash('success', 'Komentar Ditambah');
        return View::make('layouts/partials/_alertajax');

    }


    public function destroy(Barengan $barengan_id,$id)
    {
        BarenganComment::destroy($id);

        Session::flash('error', 'Komentar Dihapus');
        return View::make('layouts/partials/_alertajax');
    }
}
