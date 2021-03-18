<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Chatroom;
class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $id = Auth::user()->email;
        $all = Reply::where('receiverName',$id)->get();

        return view('inbox')->with('messages',$all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendDmView($email)
    {

        return view('dmcompose')->with('email',$email);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendDm(Request $request)
    {
        //dd($request);

        $newMessage = new Reply();
        $newMessage->replierName = Auth::user()->email;
        $newMessage->content = $request->content;
        $newMessage->receiverName = $request->email;
        $newMessage->save();

        return redirect('/dashboard')->with('status','Message successfully sent and delivered to '.  $request->email);

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
        $message = Reply::find($id);
        //dd($message->content);
        $message->delete();
        return redirect('/inbox')->with('status','message deleted successfully');
    }

    public function delete($id)
    {
        $message = Chatroom::find($id);
        //dd($message->content);
        $message->delete();
        return redirect('/group/chatroom')->with('status','group post deleted successfully');
    }
}
