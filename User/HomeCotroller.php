<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        $user_all = user::all();
			
		return view('home', compact('user_all'));
    }
    public function users()
    {
        $user_all = user::paginate(10);
			
		return view('/users/index', compact('user_all'));
    }
}
