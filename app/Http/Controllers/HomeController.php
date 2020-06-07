<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //   $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'asc')->take(8)->get();

        return view('home', [ 'announcements' => $announcements]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function resetPassword()
    {
        return view('auth.reset');
    }

    public function announcements()
    {
        $announcements = Announcement::orderBy('created_at', 'asc')->get();

        return view('announcement', [ 'announcements' => $announcements ]);
    }
}
