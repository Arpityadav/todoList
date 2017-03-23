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

    public function store ()
    {
        $this->validate(request(), [
            'title' => 'required|min:2|max:50',
        ]);
        Task::create([
            'user_id' => Auth::id(),
            'title' => request('title'),
        ]);

        return back();
    }
    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
     
        return back();
    }
    public function update(Task $task)
    {
        $task->isComplete = true;
        $task->save();

        return back();
    }
}
