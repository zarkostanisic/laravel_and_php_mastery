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
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ isset($task->title) ? $task->title : old('title') }}"
            @class(['border-red-500' => $errors->has('title')])/>
            @error ('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" rows="5"
            class="@error('description') border border-red-500 @enderror">
                {{ isset($task->title) ? $task->description : old('description') }}
            </textarea>
             @error ('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long description</label>
            <textarea name="long_description" rows="10"
            @class(['border-red-500' => $errors->has('long_description')])>
                {{ isset($task->title) ? $task->description : old('long_description') }}
            </textarea>
             @error ('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">
                {{ isset($task) ? 'Update task' : 'Add task' }}
            </button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>  
    </form>
</div>
@endsection