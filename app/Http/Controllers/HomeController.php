<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo=Auth::user()->tipo;
         $variablex='Un String';
         if($tipo=='1'){
             return view('layouts.dashboard.super.index');
         }else if($tipo=='2'){
             return view('layouts.dashboard.clinica.index');
         }else if($tipo=='3'){
             return view('layouts.dashboard.admin.index');
         }
    }
}
