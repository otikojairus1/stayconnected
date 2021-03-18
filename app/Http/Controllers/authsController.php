<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
class authsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showstudentsform(){

        return view('studentsignin');
    }

    public function showownersform(){

        return view('ownersSignin');
    }
     
    public function showcompanyform(){

        return view('companyrep');
    }
     
        public function authenticateOwners(Request $request)
        {
            $credentials = $request->only('email', 'password');
            //dd($credentials);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $AuthRole  = Auth::user()->role;
               //dd($AuthRole);
                if($AuthRole === 'CompanyRepresentative' || $AuthRole === 'Student'){
                    Auth::logout();

                    $request->session()->invalidate();

                     $request->session()->regenerateToken();
                    return back()->with('status', 'Only Owners are allowed to login from here.');
                }else{
                //dd($AuthRole);
                $check =  Profile::where('userid',12345678)->first();
                if($check === null){
                    return redirect()->intended('dashboard');
                }else{
                    $update =  Profile::where('userid',12345678)->first();
                    $update->userid = Auth::id();
                    $update->save();
    
                    return redirect()->intended('dashboard');
                }

             
            
            }
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'user'=>'Only owners are allowed to login from here.'
            ]);
        }

        public function authenticateStudents(Request $request)
        {
            $credentials = $request->only('email', 'password');

           // dd($credentials);
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $AuthRole  = Auth::user()->role;
                if($AuthRole === 'CompanyRepresentative' || $AuthRole === 'Owner'){
                    Auth::logout();

                    $request->session()->invalidate();

                     $request->session()->regenerateToken();
                    return back()->with('status', 'Only Students are allowed to login from here.');
                }else{
                        //dd($AuthRole);
                $check =  Profile::where('userid',12345678)->first();
                if($check === null){
                    return redirect()->intended('dashboard');
                }else{
                    $update =  Profile::where('userid',12345678)->first();
                    $update->userid = Auth::id();
                    $update->save();
    
                    return redirect()->intended('dashboard');
                }

                }
                //dd($AuthRole);
                
            }
    
            return back()->withErrors([
                'email' => 'The provided qcredentials do not match our records.',
                'user'=>'Only Students are allowed to login from here.'
                
            ]);
        }

        public function authenticateCompanyReps(Request $request)
        {
            //dd('ere');
            $credentials = $request->only('email', 'password');
            //dd($credentials);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $AuthRole  = Auth::user()->role;
                if($AuthRole === 'Student' || $AuthRole === 'Owner'){
                    Auth::logout();

                    $request->session()->invalidate();

                     $request->session()->regenerateToken();
                    return back()->with('status', 'Only COMPANY REPRESENTATIVES are allowed to login from here.');
                }else{
                       //dd($AuthRole);
                $check =  Profile::where('userid',12345678)->first();
                if($check === null){
                    return redirect()->intended('dashboard');
                }else{
                    $update =  Profile::where('userid',12345678)->first();
                    $update->userid = Auth::id();
                    $update->save();
    
                    return redirect()->intended('dashboard');
                }

                }
                //dd($AuthRole);
               
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'user' => 'Only company representatives are allowed to login from here.'
            ]);
        }
    
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
