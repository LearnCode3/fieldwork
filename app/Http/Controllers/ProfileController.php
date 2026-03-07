<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller {
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $student_details = User::has('profile')->with('profile')->get();

        return view('admin.student_details',['studentDetails' => $student_details]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(){

        $user = Auth::user();

        $profile = $user->profile;


        return view('student.profile',['profile'=>$profile]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){


            $profileData = $request->validate([
                'phoneNumber'   =>  ['required','regex:/^[0-9]{10}$/'],
                'university'    =>  ['required','string','regex:/^[a-zA-Z\s]+$/','max:100'],
                'level'         =>  ['required','string','regex:/^[a-zA-Z\s]+$/','max:100'],
                'course'        =>  ['required','string','regex:/^[a-zA-Z\s]+$/','max:100'],
                'year'          =>  ['required','numeric','max:10'],
                'regno'         =>  ['required','string','max:20'],
                'location'      =>  ['required','string','regex:/^[a-zA-Z\s]+$/','max:100'],
                'company'       =>  ['required','string','regex:/^[a-zA-Z\s]+$/','max:100'],
                'department'    =>  ['required','string','regex:/^[a-zA-Z\s]+$/','max:100'],
                'profileImage'  =>  ['nullable','image','mimes:jpeg,png,jpg','max:1024'],
                'fieldStart'    =>  ['required','date','before_or_equal:fieldEnd'],
                'fieldEnd'      =>  ['required','date'],
            ],[
                'image.size' => 'The image must not be larger than 5MB.',
                'phoneNumber.regex' => 'The phone number must be exactly 10 digits and contain only numbers',
                'fieldStart.required' => 'This date field is required',
                'fieldEnd.required' => 'This date field is required',
                'fieldStart.before_or_equal' => 'The Start date cannot be greater than the End date.',
                'university.string'=> 'allowed only words',
            ]);


            // store image if exist
            $path = null;
            if($request->hasFile('profileImage')){
                $path = Storage::disk('public')->putFile('profile_images', $request->file('profileImage'));
            }

            // $profile = $user->profile;

            $profileData['profileImage'] = $path;

            // if($profile){
            //     $profile->update($profileData);

            // }else{
            //     $user->profile()->create($profileData);
            // }

            $user = Auth::user();

            $user->profile()->updateOrCreate(['user_id' => $user->id],$profileData);


            return redirect()->back()->with('message','Your details have been submitted successfully.');



    }


}
