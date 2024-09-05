<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); // Mengambil semua tugas dari database
        return view('todo', compact('tasks')); // Mengirimkan data tugas ke view
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Task::create(['name' => $request->name]);
        return redirect()->back();
    }

    public function complete(Task $task)
    {
        $task->update(['completed' => true]);
        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
