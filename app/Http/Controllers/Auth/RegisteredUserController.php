<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            // 'bio' => 'required|string|max:300',
            // 'gender' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            // 'currentaddress' => 'required|string|max:255',
            // 'contactno' => 'required|string|max:255',
            // 'permanentaddress' => 'required|string|max:255',
            // 'birthday' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Auth::login($user = User::create([
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname,
        //     'bio' => $request->bio,
        //     'gender' => $request->gender,
        //     'currentaddress' => $request->currentaddress,
        //     'contactno' => $request->contactno,
        //     'permanentaddress' => $request->permanentaddress,
        //     'role' => $request->role,
        //     'birthday' => $request->birthday,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]));

           User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
           // 'bio' => $request->bio,
            //'gender' => $request->gender,
           // 'currentaddress' => $request->currentaddress,
            //'contactno' => $request->contactno,
            //'permanentaddress' => $request->permanentaddress,
            'role' => $request->role,
            //'birthday' => $request->birthday,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Profile::create([
            'userid' => 12345678,
            'gender' => 'Not Set',
            'experience' => 'Not Set',
            'education' => 'Not Set',
           // 'currentaddress' => $request->currentaddress,
            //'contactno' => $request->contactno,
            //'permanentaddress' => $request->permanentaddress,
            'contactNo' => 'Not Set',
            'birthday' => 'Not Set',
            'currentAddress' => 'Not Set',
            'permanentAddress' => 'Not Set',
        ]);

        if($request->role == 'Owner'){
            return redirect('/owners/login');
        }elseif($request->role == 'Student'){
            return redirect('/students/login');
        }else{
            return redirect('/companyreps/login');
        }

           

        
        //event(new Registered($user));

        // $user = Auth::user()->role;
        //     dd($user);
        // return "de";
        //redirect(RouteServiceProvider::HOME);
    }


 


}
