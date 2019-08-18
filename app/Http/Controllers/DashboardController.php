<?php

namespace App\Http\Controllers;
use Illumintate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        $user = User::find(1)->progress;

        echo $user;
                
        return view('app.dashboard');
    }
    
}
