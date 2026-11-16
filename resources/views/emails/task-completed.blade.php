<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Task completed</title></head>
<body>
    <h1>Task completed</h1>
    <p>The following task has been marked as done:</p>
    <p><strong>{{ $task->title }}</strong></p>
    <p>Scheduled date: {{ $task->task_date->format('F j, Y') }}</p>
</body>
</html>
