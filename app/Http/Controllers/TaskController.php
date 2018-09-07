<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index () {
        return view('tasks.index', [
            'tasks'  => Task::get(),
        ]);
    }

    public function store (Request $request) {
        Task::create($request->all());
        return Task::get();
    }

    public function create()
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }


    public function destroy()
    {
        //
    }
}
