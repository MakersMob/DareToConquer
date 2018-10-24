<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Task;
use DareToConquer\Mail\PointsAwarded;
use Illuminate\Support\Facades\Mail;

class TaskCompleteController extends Controller
{
    public function store(Request $request)
    {
        $task = Task::find($request->task_id);

        $task->status = 1;
        $task->save();

        $tasker = $task->user;
        $tasker->points = $tasker->points + 1;
        $tasker->save();

        $exchange = $task->exchange;
        $user = $task->exchange->user;

        Mail::to($tasker)->send(new PointsAwarded($user, $tasker, $task, $exchange));

        return redirect('task/'.$task->id);
    }
}
