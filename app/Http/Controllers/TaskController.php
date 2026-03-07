<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{

    public function store(Request $request)
    {
        $task_data = $request->validate([
            'task_date'=> ['required','date'],
            'week'=>['required','string','max:10'],
            'task'=>['required','string'],
        ]);

        // $task_data['user_id'] = Auth::id();
        // Task::create($task_data);

        Auth::user()->task()->create($task_data);


        return redirect()->route('task.showTask')->with('success','Task successfully created!');
    }

    /*
     * Display the All Tasks which owned by user/student who is logging-in
     * Side of Student
     */
    public function showTask()
    {

        $taskuser = Task::where('user_id',Auth::id())->latest()->paginate(10);

        return view('student.task', ['taskuser'=>$taskuser]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editTask(Task $task)
    {

        if($task->user_id !== Auth::id()){
            return redirect()->back()->with('error','You do not have permission to edit this task.');
        }

        return view('student.task_edit',['task'=>$task]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateTask(Request $request, Task $task)
    {
        if($task->user_id !== Auth::id()){
            return redirect()->back()->withErrors('error','You do not have permission to update this task.');
        }

        $update_task = $request->validate([
            'task_date'=> ['required','date'],
            'week'=>['required','string','max:10'],
            'task'=>['required','string'],
        ]);

        $task->findOrFail($task->id)->update($update_task);

        // $task->update($update_task);


        return redirect()->route('task.showTask')->with('success','Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteTask(Task $task)
    {
        if($task->user_id !== Auth::id()){
            return redirect()->back()->with('error','You do not have permission to delete this task.');
        }

        $task->delete();

        return redirect()->route('task.showTask')->with('success','');
    }

}
