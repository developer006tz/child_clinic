<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baby;
use App\Models\Mother;
use App\Models\User;
use App\Models\Pregnant;


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

        $babies = Baby::all();
        $mothers = Mother::all();
        $users = User::all();
        $pregnants = Pregnant::all();
        return view('home', compact('babies', 'mothers', 'users', 'pregnants'));
    }
}
