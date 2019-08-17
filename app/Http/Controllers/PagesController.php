<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    //Autenticacion
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    //Pages
    public function getPrograma(){
        return view('app.programa');
    }
    public function getCalendario(){
        return view('app.calendario');
    }
    public function getConfig(){
        $user = Auth::user();

        return view('app.config')->with('user',$user);
    }        
}
