@extends('layouts.app')

@section('title', 'Task List | Tasks for Today')

@section('content')
<section class="page-heading compact"><p class="eyebrow">Task management</p><div class="heading-row"><div><h1>Complete task list</h1><p class="lead">All active tasks retrieved through Eloquent and ordered by date.</p></div>@auth<a class="button primary" href="{{ route('tasks.create') }}">+ New task</a>@endauth</div></section>
<section class="table-panel"><div class="table-meta"><h2>All active tasks</h2><span class="count-pill">{{ $tasks->count() }} records</span></div><div class="table-wrap"><table><thead><tr><th>ID</th><th>Task</th><th>Status</th><th>Task date</th>@auth<th>Actions</th>@endauth</tr></thead><tbody>
@forelse ($tasks as $task)
<tr><td class="muted">{{ $task->id }}</td><td class="strong">{{ $task->title }}</td><td><span class="task-status {{ str_replace(' ', '-', $task->status) }}">{{ ucfirst($task->status) }}</span></td><td>{{ $task->task_date->format('F j, Y') }}</td>@auth<td class="actions"><a href="{{ route('tasks.edit', $task->id) }}">Edit</a><form method="POST" action="{{ route('tasks.destroy', $task->id) }}" onsubmit="return confirm('Archive this task?')">@csrf @method('DELETE')<button type="submit">Archive</button></form></td>@endauth</tr>
@empty
<tr><td colspan="5" class="empty-state">No active tasks found.</td></tr>
@endforelse
</tbody></table></div></section>
@endsection
