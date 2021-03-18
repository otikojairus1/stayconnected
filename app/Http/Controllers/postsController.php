<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use App\Providers\PostPolicy;
use Illuminate\Http\Request;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $allPosts = Posts::all();
        return view('allposts')->with('posts', $allPosts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpost');
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
            'description'=>'required',
            'title'=>'required',
            
        ]);
        $newPost = new Posts();
        $newPost->title = $validatedData['title'];
        $newPost->description = $validatedData['description'];
        
        $newPost->user_id = Auth::id(); 
        $newPost->save();

        //Posts::create($validatedRequest);

       return redirect('/create/posts')->with('status','Post created successfully! other STAYCONNECTED users can now see the post.');

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
        // if (Auth::user()->cannot('delete',  Posts::class)) {
        //     abort(403);
        // }

        $authenticatedUser = Auth::id();

        $post = Posts::find($id);

       
        $postId = (int)$post->user_id;

        if($postId === $authenticatedUser){
            $post->delete();

            return redirect('/posts')->with('status','post deleted successfully');
        }

       
        return redirect('/posts')->with('status','you must be the owner of the post to delete a post');
    }
}
