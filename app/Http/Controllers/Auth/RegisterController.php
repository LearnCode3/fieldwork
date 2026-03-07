<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){

        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=> ['required','string','max:255','email','unique:users'],
            'password'=> ['required','string','confirmed','min:3'],    // Password::defaults()
        ]);
        // $name = ucfirst(strtolower($request->name));

        $name = $this->formatName($request->name);
        User::create([
            'name'=> $name,
            'email'=>$request->email,
            'role'=> 0,
            'banned' => 0,
            'password' => Hash::make($request->password)
        ]);



        return redirect()->route('login')->with('success','');
    }

     // Function to format the name
     private function formatName($name): string
     {
         // Split the name into parts by spaces
         $nameParts = explode(' ', $name);

         // Capitalize the first letter of each part of the name
         $nameParts = array_map(function($part) {
             return ucfirst(strtolower($part)); // Capitalize first letter of each part
         }, $nameParts);

         // Join the name parts back together into a single string
         return implode(' ', $nameParts);
     }
}

