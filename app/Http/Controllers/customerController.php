<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chat()
    {
        return view('chat');
    }

    public function events()

    {
        $allQueries = Customer::all();
        $allUsers = User::all();
        $allEvents = Event::all();
        //dd($all);
        return view('manageevent',[
            'queries'=>$allQueries,
            'users'=>$allUsers,
            'events'=>$allEvents
            ]);
       
    }

     public function queries()

    {

        
        $allQueries = Customer::all();
        $allUsers = User::all();
        $allEvents = Event::all();
        //dd($all);
        return view('managequery',[
            'queries'=>$allQueries,
            'users'=>$allUsers,
            'events'=>$allEvents
            ]);
        
    }

    public function index()
    {
        $allQueries = Customer::all();
        $allUsers = User::all();
        $allEvents = Event::all();
        //dd($all);
        return view('manageusers',[
            'queries'=>$allQueries,
            'users'=>$allUsers,

            'events'=>$allEvents
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
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $message = $request->message;

        $validatedRequest = $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);

        Customer::create($validatedRequest);


        return redirect('/customer')->with('status','We have received your message, we are getting back to you very soon. Thanks for contacting Stayconnected Customer service ');
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
