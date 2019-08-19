<?php

namespace App\Http\Controllers;
use Illumintate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        //If Autenticated, redirect to proper url
        $id = Auth::id();
        return redirect('dashboard/'.$id);
    }

    public function view()
    {   
        // My Authentication with url
        $id = Auth::id();
        $id_url = $_SERVER['REQUEST_URI']; 
        $id_url = substr($id_url,11,12);
        
        if($id == $id_url){
            return view('app.dashboard');
        }
        else{
            return redirect('dashboard');
        }
    }
}
