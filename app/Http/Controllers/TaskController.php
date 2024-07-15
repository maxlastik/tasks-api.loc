<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryTasks = Task::query();

        if ($request->has('status')) {
            $queryTasks->where('status', $request->status);
        };

        // Possible values: tomorrow, week, month, year
        if ($request->has('due_date')) {
            switch($request->due_date) {
                case "tomorrow" :
                    $queryTasks->where('due_date', '<=', Carbon::tomorrow());
                    break;
                case "week" :
                    $queryTasks->where('due_date', '<=', Carbon::now()->addWeek());
                    break;
                case "month" :
                    $queryTasks->where('due_date', '<=', Carbon::now()->addMonth());
                    break;
                case "year" :
                    $queryTasks->where('due_date', '<=', Carbon::now()->addYear());
                    break;
            }
        }

        $tasks = $queryTasks->orderBy('created_at', 'desc')->get();

        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return new TaskResource($task);
    }
}
