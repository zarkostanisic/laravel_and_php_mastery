<!DOCTYPE html>
<html>
    <head>
        <title>
            Laravel 12 Task list App
        </title>

        {{-- blade-formatter-disable --}}
        <style type="text/tailwindcss">
            .btn {
                @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700 hover:bg-slate-50
            }

            .link{
                @apply font-medium text-gray-700 underline decoration-pink-500
            }

            label{
                @apply block uppercase text-slate-700 mb-2
            }

            input, 
            textarea{
                @apply shadow-sm appearance-none border w-full py-5 px-3 text-slate-700 leading-tight focus:outline-none
            }

            .error{
                @apply text-red-500 text-sm
            }
        </style>
        {{-- blade-formatter-enable --}}

        @yield ('styles')

        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="container mx-auto mt-10 mb-10 max-w-lg">

         <h1 class="mb-4 text-2xl">
            @yield ('title')
        </h1>

        <nav class="mb-4">
            <a href="{{ route('tasks.index') }}">Home</a>
            <a href="{{ route('tasks.create') }}"
            class="link">Add task</a>
        </nav>

        <div>
            @if (session()->has('success'))
                <div>{{ session('success') }}</div>
            @endif
            @yield ('content')
        </div>
    </body>
</html>