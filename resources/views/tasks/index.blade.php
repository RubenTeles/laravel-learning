<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>All Tasks</h1>
    @foreach($tasks as $task)
        @if ($task->completed)
            <strike><li>{{ $task->description }}</li></strike>
        @else
            <li>{{ $task->description }}</li>
        @endif
    @endforeach

    <h2>Add New Task</h2>
    <form method="POST" action="/tasks">
        {{ csrf_field() }}
        <input type="text" name="description" placeholder="description" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
