<?php

namespace App\Http\Controllers;

use App\SaleReportsDaily;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReportsController extends Controller
{
    public function dailySales()
    {
        $daily = SaleReportsDaily::all();
//        dd($daily);
//        $day = array();
//        $totals = array();
//        foreach ($daily as $value) {
//            $day[] = $value->day;
//            $totals[] = $value->total;
//        }
        $days = $daily->pluck('day');
        $totals = $daily->pluck('total');
//        dd($days);
//        dd($totals);
        return view('reports.dailySales',compact("days","totals"));
//        return view('reports.dailySales',["days" => $days ,
//                                          "totals"] => $totals);
    }
}
