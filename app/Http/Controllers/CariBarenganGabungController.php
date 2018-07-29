<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Barengan;
use App\BarenganGabung;
use Session;
use View;
use Illuminate\Support\Facades\DB;


class CariBarenganGabungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $check = BarenganGabung::where('barengan_id', '=', $request['barengan_id'])
        ->where('user_id', '=', auth()->id())
        ->first();

        if ($check === null) {
            $data = [
                'barengan_id' => $request['barengan_id'],
                'user_id' => auth()->id(),
            ];
            BarenganGabung::create($data);
            Session::flash('info', 'Anda Bergabung');
        }
        else{
            BarenganGabung::destroy($check->id);
            Session::flash('error', 'Anda batal batal bergabung');
        }
        return View::make('layouts/partials/_alertajax');
    }

    public function show($id)
    {
        $databarengan = BarenganGabung::with('user')
        ->where('barengan_id',$id)->get();

        return $databarengan;
    }

}
