<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getDashboard(){
        return view('dashboard');
    }
    public function getPrograma(){
        return view('programa');
    }
    public function getCalendario(){
        return view('calendario');
    }
}
