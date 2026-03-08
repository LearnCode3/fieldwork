<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {

        //validate the form data
        $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ]);


        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $user = Auth::user();
            if ($user->banned) {

                DB::table('sessions')->where('user_id',$user->id)->delete();

                return $this->logout($request)
                ->withErrors(['email' => 'Your account has been banned. Please contact the supervisor']);
            }
            if(!$user->role){
                //student
                return redirect()->intended(route('task.showTask'));
            }else{
                //supervisor
                return redirect()->intended(route('admin.dashboard'));
            }

        } else {
            return back()->withErrors([
                'email' => 'Login failed. Please check your username and password and try again.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended(route('login'));
    }
}
