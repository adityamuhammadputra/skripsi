<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barengan;
use App\User;
use App\BarenganComment;
use Illuminate\Support\Facades\DB;

class CariBarenganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {  
        $barengan = Barengan::all(); 
        $barengancomments = BarenganComment::all()->toArray();     
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

        return Barengan::create($data);
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

        return $caribarengan;
    }

    
    public function destroy($id)
    {
        Barengan::destroy($id);
    }

}