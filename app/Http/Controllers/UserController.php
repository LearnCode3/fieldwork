<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


// Class of user Page

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // its show all users' registed ** admin side
    public function index()
    {
        $Users  = User::orderBy('role', 'desc')->paginate(20);
        return view('admin.user', ['all_users' => $Users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function deleteSelected(Request $request)
    // {
    //      $deleteUser = $request->validate([
    //         'user_name'     => 'required|array',
    //         'user_name.*'   => 'integer|exists:users,id'
    //     ]);

    //      User::whereIn('id',$deleteUser)->delete();

    //      return redirect()->route('user.all_user')->with('success','Deleted successfully');
    // }

    /**
     * Store a newly created resource in storage. ## ban and unban user
     */
    public function bannuser(User $user)
    {
        $user->banned = !$user->banned;

        if ($user->role) {
            return redirect()->route('user.all_user')->with(["error" => "can't banned Supervisor"]);
        }

        $user->save();

        if ($user->banned) {
            DB::table('sessions')->where('user_id', $user->id)->delete();
        }

        return redirect()->route('user.all_user')->with(['success' => 'changes successfully']);
    }

    public function addSupervisor(Request $request){
            $request->validate(
            [
                'name' => ['required','string','max:255'],
                'email' => ['required','email','unique:users,email'],
                'password' =>['required','string','min:3']
            ]);

            // dd($supervisor);

            $name = $this->formatName($request->name);


            User::create(
                [
                    'name'=>$name,
                    'email'=>$request->email,
                    'role' => 1,
                    'banned'=> 0,
                    'password'=>Hash::make($request->password)
            ]);

            return redirect()->route('user.all_user')->with('success','supervisor added successful');
    }

    /**
     * Display the specified resource.
     */


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('user.all_user')->with('success','deleted successful');
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
