<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\Task;

Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()
      ->where('completed', true)
      ->get();

    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);

    if(!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request){

    // Validate
    $data = $request->validate([
     'title' => 'required|max:255',
     'description' => 'required',
     'long_description' => 'required'
    ]);


    // Store
    $task = new Task;

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()
        ->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task created successfully!');

})->name('tasks.store');


