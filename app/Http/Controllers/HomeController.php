<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Event;

class HomeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
      
        $event = Event::first(); 

        return view('home', ['event' => $event]);
    }

}
