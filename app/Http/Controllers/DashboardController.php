<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function dashboard(){
    //     return view('admin.dashboard');
    // }

    public function showList(){
        //count all students
        $AllStudent = User::where('role','0')->count();

        //number of students for current year
        $currentYear = Carbon::now()->year;
        $CurrentStudent = User::where('role','0')->whereYear('created_at',$currentYear)->count();

        //list of students for current year
        $currentStudentList = User::with('profile')->where('role','0')->whereYear('created_at',$currentYear)->paginate(25);

        //number of active student for current year

            //number of Active students for current year
            $activeStudent = User::where('role','0')->whereHas('profile', function($query){
                $query->whereNotNull('fieldStart')
                ->whereNotNull('fieldEnd')
                ->where('fieldEnd','>',now()->toDateString());
            })->whereYear('created_at',now()->year)->count();

            //number of Inactive Students for current year
            $InactiveStudent = User::where('role','0')->whereHas('profile', function($query){
                $query->whereNotNull('fieldStart')
                ->whereNotNull('fieldEnd')
                ->where('fieldEnd','<',now()->toDateString());
            })->whereYear('created_at',now()->year)->count();


        return view('admin.dashboard',
        [
            'user'=>$AllStudent,
            'currentyear'=>$CurrentStudent,
            'currentStudentLists' => $currentStudentList,
            'activeStudent' => $activeStudent,
            'inactiveStudent' => $InactiveStudent
        ]);
    }

}
