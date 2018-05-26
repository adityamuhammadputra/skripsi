<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use App\Barengan;
use App\User;


class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.partials._calendarbarengan');
    }

    public function loadData()
    {
        $user = auth()->id();
        $caribarengan = Barengan::where('user_id', $user)->get();
        $calendar = Calendar::all();

        foreach ($calendar as $row)
        {

            $arr[] = array(

                'title' => $row->tujuan,
                'description' => $row->content,
                'start' => $row->mulai,
                'end' => $row->akhir,
                'backgroundColor' => '#dd4b39',
                'borderColor' => $row->COLOR
            );

        }
        foreach ($caribarengan as $row) {

            $arr[] = array(

                'title' => $row->tujuan,
                'description' => $row->content,
                'start' => $row->mulai,
                'end' => $row->akhir,
                'backgroundColor' => '#3097D1',
                'borderColor' => $row->COLOR
            );

        }
        return json_encode($arr);        
    }
}
