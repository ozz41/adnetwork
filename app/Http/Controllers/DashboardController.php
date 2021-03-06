<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Stats;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $stats = Stats::where('user_id', $user->id)->orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        $count = 31;
        if ( count($stats) > $count ) {
            $stats = Stats::where('user_id', $user->id)->orderBy('date', 'desc')->orderBy('id', 'desc')->paginate($count);
        }

        return view('dashboard', compact('stats'));
    }
}
