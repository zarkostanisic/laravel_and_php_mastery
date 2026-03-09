<!DOCTYPE html>
<html>
    <head>
        <title>
            Laravel 12 Task list App
        </title>
        @yield ('styles')

        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="container mx-auto mt-10 mb-10 max-w-lg">

         <h1 class="mb-4 text-2xl">
            @yield ('title')
        </h1>

        <nav class="mb-4">
            <a href="{{ route('tasks.index') }}">Back to tasks</a>
            <a href="{{ route('tasks.create') }}"
            class="font-medium text-gray-700 underline decoration-pink-500">Add task</a>
        </nav>

        <div>
            @if (session()->has('success'))
                <div>{{ session('success') }}</div>
            @endif
            @yield ('content')
        </div>
    </body>
</html>