<?php

namespace App\Http\Controllers;

use App\Device;
use App\PhysicalProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sessionId = Auth::id();
        $devices = Device::where('user_id', '=', $sessionId)->get();
        
        return view('home', ['devices'=>$devices]);
    }
}
