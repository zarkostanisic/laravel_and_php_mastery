@extends ('layouts.app')

@section ('title', 'Add Task')

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
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title"/>
            @error ('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" rows="5"></textarea>
             @error ('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long description</label>
            <textarea name="long_description" rows="10"></textarea>
             @error ('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Add task</button>
        </div>  
    </form>
</div>
@endsection