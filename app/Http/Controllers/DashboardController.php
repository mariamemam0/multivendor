<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth'])->only('index');

    }
    //Actions
    public function index(){
        $user = Auth::user();
        
        $user = 'Mariam Emam';
       return view('dashboard.index',compact('user')); 
    }
}
