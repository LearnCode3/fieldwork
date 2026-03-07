<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function resetpasswordForm(){
        return view('auth.reset_password');
    }

     public function forgotpasswordForm(){
        return view('auth.forgotpasswordEmail');
    }
}
