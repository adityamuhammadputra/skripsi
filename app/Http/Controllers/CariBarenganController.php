<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barengan;
use App\User;
use App\BarenganComment;
use Illuminate\Support\Facades\DB;

use Session;
use View;


class CariBarenganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {  
        // $barengan = Barengan::orderBy('created_at','desc')->get();
        $barengan = BarenganComment::with('Barengan')->where('barengan_id','!=',0)->get();
        // $barengan = Barengan::with('barengancomments')->get();
        // 
        return $barengan;
        $barengancomments = BarenganComment::all();

        // if($request->ajax()) {
        //     return [
        //         'barengan' => view('load.loadBarengan')->with(compact('barengan','barengancomments'))->render(),
        //         'next_page' => $barengan->nextPageUrl()
        //         ];
        // }

        return view('caribarengan',compact('barengan','barengancomments'));
    }
    

    
    public function store(Request $request)
    {
        $data = [
            'user_id' =>auth()->id(),
            'tujuan' => $request['tujuan'],
            'mepo' => $request['mepo'],
            'mulai' => $request['mulai'],
            'akhir' => $request['akhir'],
            'contact' => $request['contact'],
            'content' => $request['content']
        ];

        Barengan::create($data);

        Session::flash('success', 'Kiriman Ditambah');
        return View::make('layouts/partials/_alertajax');
    }

    public function edit($id)
    {
        $caribarengan = Barengan::find($id);

        return $caribarengan;
    }

    public function update(Request $request, $id)
    {
        $caribarengan = Barengan::find($id);
        $caribarengan->tujuan = $request['tujuan'];
        $caribarengan->mepo = $request['mepo'];
        $caribarengan->mulai = $request['mulai'];
        $caribarengan->akhir = $request['akhir'];
        $caribarengan->contact = $request['contact'];
        $caribarengan->content = $request['content'];
        $caribarengan->update();

        Session::flash('info', 'Kiriman Rubah');
        return View::make('layouts/partials/_alertajax');
    }

    
    public function destroy($id)
    {
        Barengan::destroy($id);
        Session::flash('error', 'Kiriman Dihapus');
        return View::make('layouts/partials/_alertajax');
    }

}