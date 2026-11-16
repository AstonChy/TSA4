<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompleted;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::where('is_archived', false)
            ->orderBy('task_date')
            ->orderBy('id')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,in progress,done'],
            'task_date' => ['required', 'date'],
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(int $id): View
    {
        $task = $this->activeTask($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $task = $this->activeTask($id);
        $wasDone = $task->status === 'done';

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,in progress,done'],
            'task_date' => ['required', 'date'],
        ]);

        $task->update($validated);

        if ($task->status === 'done' && ! $wasDone) {
            Mail::to(config('mail.task_recipient'))->send(new TaskCompleted($task));
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $task = $this->activeTask($id);
        $task->update(['is_archived' => true]);

        return redirect()->route('tasks.index')->with('success', 'Task archived successfully.');
    }

    private function activeTask(int $id): Task
    {
        return Task::where('is_archived', false)->findOrFail($id);
    }
}
