<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json([
            'data' => $tasks,
            'errors' => null,
            'message' => 'Berhasil menampilkan todos',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari permintaan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'completed' => 'boolean', // Validasi boolean
        ]);

        // Buat instance baru dari Task
        $task = new Task;

        // Set nilai untuk kolom yang diperlukan
        $task->name = $validated['name'];
        // Set nilai completed berdasarkan input dari permintaan
        $task->completed = $validated['completed'] ?? false; // Default ke false jika tidak ada nilai

        // Simpan data ke database
        $task->save();

        return response()->json([
            'status' => true,
            'message' => 'Data Todo berhasil ditambahkan :)',
            'data' => $task,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari task berdasarkan ID
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Todo tidak ditemukan',
                'errors' => 'Resource not found',
            ], 404);
        }

        return response()->json([
            'data' => $task,
            'message' => 'Berhasil menampilkan todo',
            'errors' => null,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cari task berdasarkan ID
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Todo tidak ditemukan',
                'errors' => 'Resource not found',
            ], 404);
        }

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'completed' => 'nullable|boolean',
        ]);

        // Update task
        $task->update([
            'name' => $validatedData['name'] ?? $task->name,
            'completed' => $validatedData['completed'] ?? $task->completed,
        ]);

        return response()->json([
            'data' => $task,
            'message' => 'Todo berhasil diperbarui',
            'errors' => null,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari task berdasarkan ID
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Todo tidak ditemukan',
                'errors' => 'Resource not found',
            ], 404);
        }

        // Hapus task jika ditemukan
        $task->delete();

        return response()->json([
            'message' => 'Todo berhasil dihapus',
            'errors' => null,
        ], 200);
    }
}
