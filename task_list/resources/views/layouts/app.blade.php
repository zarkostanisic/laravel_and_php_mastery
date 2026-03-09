<!DOCTYPE html>
<html>
    <head>
        <title>
            Laravel 12 Task list App
        </title>
        @yield ('styles')
    </head>
    <body>
        <h1>@yield ('title')</h1>
        <a href="{{ route('tasks.index') }}">Back to tasks</a>
        <br>
        <a href="{{ route('tasks.create') }}">Add task</a>
        <hr>
        <div>
            @if (session()->has('success'))
                <div>{{ session('success') }}</div>
            @endif
            @yield ('content')
        </div>
    </body>
</html>