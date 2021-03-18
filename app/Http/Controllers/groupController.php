<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Group;
use App\Models\Reply;
use App\Models\Chatroom;
class groupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competitions = Competition::all();
        //dd($competition);
        return view('groups')->with('competitions', $competitions);
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

    public function form(Request $request)
    {
        $competitionId = $request->id;
        $users = User::all();

        return view('CompetitionUsers',[
            'users'=> $users,
            'competitionid'=>$competitionId
        ]);
        //->with('users',$users);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($competitionId, $userid)
    {
        $newGroup = new Group();
        $newGroup->competitionid = $competitionId;
        $newGroup->userid = $userid;
        $newGroup->save();

        $useremail= User::find($userid)->email;
//sending the email an inbox notification
        $sender = Auth::user()->email;
        $message = " you have been added  to group"  . $competitionId .  "you can now send a message to the group
        and read all the posts from the other members";
        $receiver = $useremail;

        $newMessage = new Reply();
        $newMessage->replierName = $sender;
        $newMessage->content = $message;
        $newMessage->receiverName = $receiver;
        $newMessage->save();


        return redirect('/dashboard')->with('status', $useremail .  "  has been added successfully to GROUP"  . $competitionId  .  "we 
        also sent an inbox just to let him\her aware of the addition.");
        // dd($competitionId);
        // dd($userid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     */

     public function creategrouppost()
     {
        return view('grouppostform');
     }


    public function addchatroom(Request $request)
    {
        $authid = Auth::id();
        $usergroups= Group::where('userid', $authid)->first();
        
            $competitionId = $usergroups->competitionid;
       
            $newChat = new Chatroom();
            $newChat->competitionid = $competitionId;
            $newChat->userid = $authid;
            $newChat->content = $request->content;
            $newChat->save();
    
            return redirect('/group/chatroom')->with('status', 'your message was posted successfully and 
            CAN ONLY BE SEEN WITH GROUP  ' . $competitionId . "members . if you wish to create a public post
            consider doing that from the dashboard area" );
            
     
        
    }

    public function chatroom()
    {   
        $authid = Auth::id();
        $usergroups= Group::where('userid', $authid)->first();
        

        if($usergroups === null){
            return redirect('/dashboard')->with('status','you are not a member of any group. An admin should add
            you in a team competition group before you can post anything. ');
        }else{
            $competitionid = $usergroups->competitionid;
            $messages = Chatroom::where('competitionid', $competitionid)->get();
    
            return view('chatroom', [
                'messages'=>$messages
            ]);


        }



     
    }

    public function allmembers($id)
        {
            $allgroupmembers = Group::where('competitionid', $id)->get();
            return view('groupmembers')->with('groupmembers', $allgroupmembers);
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
