<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function addTask(Request $request) {
        $incomingFields = $request->validate([
            'task' => 'required'
        ]);

        $incomingFields['task'] = strip_tags($incomingFields['task']);

        $incomingFields['user_id'] = auth()->id();
        Task::create($incomingFields);
        return redirect('/');
    }
    
    public function deleteTask(Task $task){
        if (auth()->user()->id === $task['user_id']){
            $task->delete();
        }
        return redirect('/');
    }

    public function editTaskPage(Task $task){
        if (auth()->user()->id === $task['user_id']){
            return view('editTask', ['task' => $task]);
        }
        return redirect('/');
    }

    public function editTask(Task $task, Request $request){

        if (auth()->user()->id !== $task['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'task' => 'required'
        ]);

        $taskValue = strip_tags($incomingFields['task']);

        $task->update($incomingFields);
        return redirect('/');
    }

}
