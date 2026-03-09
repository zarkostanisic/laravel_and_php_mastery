@extends ('layouts.app')

@section ('title', $task->title)

@section ('content')
    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method ('DELETE')

        <div>
            <button type="submit">Delete task</button>
        </div>
    </form>
@endsection