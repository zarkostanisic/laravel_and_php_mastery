@extends ('layouts.app')

@section ('title', $task->title)

@section ('content')
    <p  class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p  class="mb-4 text-slate-700">{{ $task->long_description }}
    @endif

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>

    <p class="mb-4 text-sm text-slate-500">
        Created {{ $task->created_at->diffForHumans() }} | Updated {{ $task->updated_at->diffForHumans() }}
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
        class="btn">Edit</a>

        <form action="{{ route('tasks.toggle_complete', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method ('PUT')

            <div>
                <button type="submit" class="btn">
                    {{ $task->completed ? 'Mark as not completed' : 'Mark as completed' }}
                </button>
            </div>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method ('DELETE')

            <div>
                <button type="submit" class="btn">
                    Delete task
                </button>
            </div>
        </form>
    </div>
@endsection