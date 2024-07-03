<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function organizer(){
                                 
        return view('organizer.dashboard',);
    }
}
