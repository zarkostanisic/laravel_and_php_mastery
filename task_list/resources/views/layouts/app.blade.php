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
        <script src="//unpkg.com/alpinejs" defer></script>
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

        <div 
        class="relative mb-10 rounded border-green-400 bg-green-100 px-4 text-lg text-green-700"
        x-data="{ flash: true }"
        role="alert">
            <span x-show="flash">
                @if (session()->has('success'))
                    <strong class="font-bold">Success!</strong>
                    <div>{{ session('success') }}</div>
                @endif
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" @click="flash = false"
                        stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </span>
        </div>
        @yield ('content')
    </body>
</html>