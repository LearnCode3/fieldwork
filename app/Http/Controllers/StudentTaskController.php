<?php

namespace App\Http\Controllers;

use App\Models\Task;

use App\Models\User;
use Illuminate\Http\Request;

class StudentTaskController extends Controller
{
    /*  show All Tasks of All Students side of Admin/ Supervisor
     *  
    */
    public function index(){

        $task = Task::with('user.profile')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.student_task', ['all_task'=>$task]);
    }

    /*  Show List Of All Tasks of Specific Student 
     *   Admin/supervisor checks the all task of specific user <<Only admin/supervisor>>
     */

    public function tasksByStudent(User $user){

        $task = $user->task()->with('user.profile')->latest()->paginate(20);

        return view('admin.task',['task'=>$task, 'student'=>$user]);
    }
}
