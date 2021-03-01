<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /////////////////// Reports////////
    public function index(){

        return view('admin.report.index');
    }
    //Search By Date
    public function searchDate(Request $request){

       $date = new DateTime($request->date);
       $formatDate = $date->format('d F Y');

       $orders = Order::where('order_date', $formatDate)->latest()->get();
       return view('admin.report.reports', compact('orders'));
    }
    //Search by Month
    public function searchMonth(Request $request){
        $orders = Order::where('order_month',$request->month_name)->where('order_year',$request->year_name)->latest()->get();
        return view('admin.report.reports',compact('orders'));
    }
    // search By Year
    public function searchYear(Request $request){
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('admin.report.reports',compact('orders'));
    }
}
