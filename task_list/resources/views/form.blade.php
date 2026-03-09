@extends ('layouts.app')

@section ('title', isset($task) ? 'Edit task' : 'Add Task')

@section ('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8 rem;
    }
</style>
@endsection

@section ('content')
<div>
    <form method="POST" action="{{ 
        isset($task) ? 
            route('tasks.update', ['task' => $task->id])
            : route('tasks.store')
         }}">
        @csrf
        @isset ($task)
            @method ('PUT')
        @endisset
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ isset($task->title) ? $task->title : old('title') }}"/>
            @error ('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" rows="5">
                {{ isset($task->title) ? $task->description : old('description') }}
            </textarea>
             @error ('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long description</label>
            <textarea name="long_description" rows="10">
                {{ isset($task->title) ? $task->description : old('long_description') }}
            </textarea>
             @error ('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">{{ isset($task) ? 'Update task' : 'Add task' }}</button>
        </div>  
    </form>
</div>
@endsection