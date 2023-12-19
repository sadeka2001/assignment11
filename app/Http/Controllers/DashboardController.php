<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Sells;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        
        return view('backend.dashboard');

    }
    public function card(){
        $today = Sells::whereDate('created_at', Carbon::today())->sum('total_price');
        $yesterday = Sells::whereDate('created_at', Carbon::yesterday())->sum('total_price');
        $thisMonth = Sells::whereMonth('created_at', Carbon::now()->month)->sum('total_price');
        $lastMonth = Sells::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('total_price');
        return view('backend.product.card',compact('today','yesterday','thisMonth','lastMonth' ));
    }


}
