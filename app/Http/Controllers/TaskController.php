<?php

namespace App\Http\Controllers;

use App\Models\todos;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = todos::all();

        //tasks::where('completed', '>=', 1)->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create_task()
    {
        $task = new todos();

        $task->description = request('description');
        $task->completed = 0;
        $task->save();

        return back();
        //return redirect('/');
    }
}
