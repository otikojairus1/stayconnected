<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\CompetitionRecord;

class competitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {   
        $allCompetitions = Competition::all();

        return view('competitionDashboard')->with('competitions', $allCompetitions);
    }

    public function compete()
    {   
        $allCompetitions = Competition::all();
       // dd($allCompetitions);
        return view('competitionJoin')->with('competitions', $allCompetitions);
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
        $validatedData = $request->validate([
            'name'=>'required',
            'owner'=>'',
            'description'=>'required',
            'location'=>'required',
            'status'=>'required',
            'activeParticipants'=>'',
        ]);

        $newCompetition = new Competition();
        $newCompetition->name = $validatedData['name'];
        $newCompetition->ownerId = Auth::id();
        $newCompetition->description = $validatedData['description'];
        $newCompetition->location = $validatedData['location'];
        $newCompetition->status = $validatedData['status'];
        $newCompetition->activeParticipants = 0;

$newCompetition->save();
           // Event::create($validatedData);


        return redirect('/competitions')->with('status', 'competition published successfully! users can now compete');
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
    public function update( $userId, $competitionsId)
    {
        
        $competitions = Competition::find($competitionsId);
        $CurrentactiveParticipants = $competitions->activeParticipants +1;
        $competitions->activeParticipants = $CurrentactiveParticipants;
        $competitions->save();

        //checking if already joined

        // $record = CompetitionRecord::where('competitionId', $competitionsId)->where('userId',$userId)->first();
        // //dd($record->competitionId);
        // if($record->competitionId === $competitionsId ){
        //     return redirect('compete')->with('status', 'youve are already enrolled in the competition. Thanks');
        // }
        //adding to competition record table
    
        return redirect('compete')->with('status', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $all = CompetitionRecord::find($id);
        $competition = CompetitionRecord::where('competitionId',$id);
        $competition->delete();





        $competition = Competition::find($id);
        $competition->delete();
        return redirect('competitions')->with('status', 'youve successfully deleted the competition
        PLEASE NOTE THAT COMPETITIONS ALREADY ENROLLED BY USERS ARE STILL INTACT UNTIL AWARDS ARE GIVEN!
        ');
    }


    public function reply($email){
        //dd($email);

        return view('addReply')->with('email', $email);
    }

    public function sendReply(Request $request){
       // dd($request);
        $validatedData = $request->validate([
            'content'=>'required',
            'email'=>'required|email'
        ]);

        $reply = new Reply();
        $reply->receiverName = $validatedData['email'];
        $reply->content = $validatedData['content'];
        $reply->replierName = Auth::user()->firstname;
        $reply->save();
       // dd(Auth::user()->firstname);
        return redirect('/section/queries')->with('status','Message Delivered successfully');
    }
}
