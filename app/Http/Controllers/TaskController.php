<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        return Task::all();
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(StoreTaskRequest $request)
    {
        return Task::create($request->all());
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {   
        $task->update($request->all());
        return $task; //更新したデータを返す。
    }

    public function destroy(Task $task)
    {    
        $task->delete();
        return $task; //削除したデータを返す。
    }
    
}
