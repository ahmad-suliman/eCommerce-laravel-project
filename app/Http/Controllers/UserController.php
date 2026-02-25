<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\Session;
use Str;
class UserController extends Controller
{
    // validation 'required|unique:posts|max:255',
    public function createUser(Request $request)
    {
        //validate request to register user
        $request->validate([
            'name' =>  'required',
            'email' =>  'required|unique:users|max:255',
            'password' => 'required',
             'avater' => [
                'image',    
                'mimes:jpeg,png,jpg,gif', 
                'max:2048'
            ],
        ]);
        //make new object from user to put the value in database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        //encrypt the password to put it in DB
        $user->password = Hash::make($request->password);
        $photoPath = '';
        //check if file exist and move it to upload file and store the path in DB
        if ($request->has('avatar')) {
            $photoPath = $request->avatar->move('uploads', Str::uuid()->toString() . '_' . $request->avatar->getClientOriginalName());
        }
        $user->avatar = $photoPath;
        $user->save();
        //After user register successfully redirect to login page
        return redirect('/login');
    }
    public function loginUser(Request $request)
    {
        //validate request to login user
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //check user if exist in DB
        if (Auth::attempt($credentials)) {
            //if user exist create session for it
            $request->session()->regenerate();
            //if the user has admin role redirct to dashbord if not redirct to home page
            if(auth()->user()->role == 1){
                return redirect('/admin/dashbord');
            } 
            return redirect('/'); 
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
