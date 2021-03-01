<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //For Enlish Language
    public function English(){

        session()->get('language');
        session()->forget('language');

        Session::put('language','english');
        return Redirect()->back();
    }

    //For Bangla Language

    public function Bangla(){
        session()->get('language');
        session()->forget('language');

        Session::put('language','bangla');
        return Redirect()->back();
    }
}
