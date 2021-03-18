<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\competitionRecord;
use App\Models\Award;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class awardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = Competition::all();
       // dd($competitions);
        return view('awards')->with('competitions', $competitions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $competitionName = $request->name;
        $competitions = Competition::where('name', $competitionName)->first();
       // dd($competitions->id);
       $records = CompetitionRecord::where('competitionId',$competitions->id)->get();
       //dd($records);
       return view('awardUsers')->with('records',$records);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    public function award(Request $request)
    {
        $id = $request->competitionId;
        $user = $request->user;
        $userId = User::where('email',$user)->first();
        $newAward = new Award();
        $newAward->userId = $userId->id;
        $newAward->CompetitionId = $id;
        $newAward->save();

        return redirect('/awards')->with('status',$user.  '  has been awarded for winning competition' .$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function winners()
    {
        $awards = Award::all();
        //dd($competitionsId);
        return view('allwinners')->with('details',$awards);
    }

    public function invite()
    {
        return view('meeting');
        //dd($competitionsId);
        //return view('allwinners')->with('details',$awards);
    }

    public function users()
    {   
        $allUsers = User::all();

        return view('manageUsers')->with('users', $allUsers);
        //dd($competitionsId);
        //return view('allwinners')->with('details',$awards);
    }

    
    public function deleteusers($id)
    {   
        //$allUsers = User::all();
        $user = User::find($id);
        
        $user->delete();
        return redirect('/manage/users')->with('status',$user->email.  'has been deleted from STAYCONNECTED system! ');
        //return view('manageUsers')->with('users', $allUsers);
        //dd($competitionsId);
        //return view('allwinners')->with('details',$awards);
    }

    public function sendinvite(Request $request)
    {
        $senderEmail = Auth::user()->email;
        $receiverEmail = $request->email;
        $message = $request->description;

        $new = new Reply();
        $new->replierName = $senderEmail;
        $new->receiverName = $receiverEmail;
        $new->content = $message;
        $new->save();

        return redirect('/invite/meeting')->with('status',"meeting invite sent and delivered successfully to the 
        specified email user. if message not received in 2 minutes, please double check the address!");
        //dd($competitionsId);
        //return view('allwinners')->with('details',$awards);
    }
}
