@extends('layouts.app')

@section('title', 'New Task | Tasks for Today')

@section('content')
<section class="page-heading compact"><p class="eyebrow">Task management</p><h1>Create a new task</h1><p class="lead">Add a task to your schedule. All fields are required.</p></section>
<section class="content-panel form-panel"><form method="POST" action="{{ route('tasks.store') }}">@csrf @php($submitLabel = 'Create task') @include('tasks._form')</form></section>
@endsection
