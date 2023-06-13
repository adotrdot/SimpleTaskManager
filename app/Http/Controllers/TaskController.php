<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Task.index', [
            'tasks' => Task::all()
        ]);
    }

    public function show_completed() {
        return view('Task.index', [
            'tasks' => Task::all()->where('status', true)
        ]);
    }

    public function show_incomplete() {
        return view('Task.index', [
            'tasks' => Task::all()->where('status', false)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Task.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required|boolean'
        ]);

        $new_task = new Task;
        $new_task->judul = $request->judul;
        $new_task->deskripsi = $request->deskripsi;
        $new_task->status = $request->status;
        $new_task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Task.form', [
            'task' => Task::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required|boolean'
        ]);

        $task = Task::find($id);
        $task->judul = $request->judul;
        $task->deskripsi = $request->deskripsi;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);

        return redirect()->route('tasks.index');
    }
}
