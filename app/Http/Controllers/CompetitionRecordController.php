<?php

namespace App\Http\Controllers;
use App\Models\CompetitionRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompetitionRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $all = CompetitionRecord::where('userId', $id)->get();
        //dd($all);
        return view('viewCompetitions')->with('competitions', $all);
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
    public function store1(Request $request)
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
    public function store(Request  $request)
    {     // dd($request);

       //  checking if already joined

        $record = CompetitionRecord::where('competitionId', $request->competition)
        ->where('userId',$request->user)->first();
        //dd($request);
        //dd($record);
        // if($record->competitionId === $request->competition){
        //     return redirect('compete')->with('status', 'youve are already enrolled in the competition. Thanks');
        // }
        // //adding to competition record table
    
        $newRecord = new CompetitionRecord();
        $newRecord->userId = $request->user;
        $newRecord->competitionId = $request->competition;
        $newRecord->save();
        return redirect('compete')->with('status', 'youve are successfully joined the competition. Thanks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {  
        //dd($id);
        $all = CompetitionRecord::where('userId', $id)->get();
        $competition = CompetitionRecord::where('competitionId', $id);
        $competition->delete();
        return redirect('/view/competitions/'.Auth::id())->with( 'status','competition deleted successfully!');
    }
}
