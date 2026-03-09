<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

use App\Models\Task;

Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()
      ->where('completed', true)
      ->paginate(5);

    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {

    $data = $request->validated();
    // Store
    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task = Task::create($request->validated());

    return redirect()
        ->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');

})->name('tasks.store');

Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {

    $data = $request->validated();

    // Update
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];

    // $task->save();

    $task->update($data);

    return redirect()
        ->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');

})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()
        ->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');


