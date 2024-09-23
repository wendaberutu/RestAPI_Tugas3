<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('todo', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Task::create([
            'name' => $request->name,
            'completed' => false, // Set default status
        ]);
        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function complete(Task $task)
    {
        $task->update(['completed' => true]);
        return redirect()->back()->with('success', 'Tugas berhasil ditandai selesai!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }
}

