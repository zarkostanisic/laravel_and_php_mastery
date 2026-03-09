@extends ('layouts.app')

@section ('title', $task->title)

@section ('content')
    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}
    @endif

    @if ($task->completed)
        <p>Completed</p>
    @else
        <p>Not completed</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <div>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
    </div>
    <hr>

    <div>
        <form action="{{ route('tasks.toggle_complete', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method ('PUT')

            <div>
                <button type="submit">{{ $task->completed ? 'Mark as not completed' : 'Mark as completed' }}</button>
            </div>
        </form>
    </div>
    <hr>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method ('DELETE')

            <div>
                <button type="submit">Delete task</button>
            </div>
        </form>
    </div>
@endsection