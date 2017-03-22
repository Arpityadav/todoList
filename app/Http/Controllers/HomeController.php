<?php

namespace Todo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Todo\User;
use Todo\Task;

class HomeController extends Controller
{

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
        $user = User::find(Auth::id());

        return view('home', compact('user'));
    }

    public function store (User $user)
    {
        Task::create([
            'user_id' => Auth::id(),
            'body' => request('body'),
            'title' => request('title'),
        ]);

        return back();
    }
}
