<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->admin==1){
            return view('admin\homepage');
        }
        elseif (auth()->user()->admin==0){
            return view('operatorController\homepage');
        }
    }
}
