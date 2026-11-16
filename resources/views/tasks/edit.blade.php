@extends('layouts.app')

@section('title', 'Edit Task | Tasks for Today')

@section('content')
<section class="page-heading compact"><p class="eyebrow">Task management</p><h1>Edit task</h1><p class="lead">Update the task details. Marking a pending task as done sends the configured log email.</p></section>
<section class="content-panel form-panel"><form method="POST" action="{{ route('tasks.update', $task->id) }}">@csrf @method('PUT') @php($submitLabel = 'Save changes') @include('tasks._form')</form></section>
@endsection
