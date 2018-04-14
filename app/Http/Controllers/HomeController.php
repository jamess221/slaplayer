<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Event;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->only('room_id', 'text');

        $message['user'] = Auth::User()->name;
        
        broadcast(new Event($message));

        return 'Message sent';
      

    }

}
