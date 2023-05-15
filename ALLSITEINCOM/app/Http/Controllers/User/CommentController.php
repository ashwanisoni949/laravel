<?php

namespace App\Http\Controllers\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Redirect;
use Session;
use Carbon\Carbon;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $listcomment = Comment::latest('created_at')->get();
       return view('admin.comment.index',compact('listcomment'));
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
        $validated = $request->validate([
            'category'    => 'required',
            'name'        => 'required | string | max:100',
            'email'       => 'required |email| max:150',
            'description' => 'required |max:255',
        ]);
        $today_date = Carbon::today();
        $countemail = Comment::where('email', '=', $request->email)->whereDate('created_at',$today_date)->count();
        if($countemail > 2){
        return Redirect::back()->with('error', 'Today Only Three Comment Send!');
        }else{
        $commentdetails = new Comment();
        $commentdetails->name	     = $request->name;
        $commentdetails->email	     = $request->email;
        $commentdetails->website	 = $request->website;
        $commentdetails->description = $request->description;
        $commentdetails->category 	 = $request->category;
        $commentdetails->admin_reply = 'waiting for admin reply';
        $commentdetails->updated_at  =  Carbon::now();
        $commentdetails->created_at  =  Carbon::now();
        $commentdetails->status = 1;
        $commentdetails->save();
        return Redirect::back()->with('success', 'Comment Send successfuly');
        }
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
   
    public function CommentDelete(Request $request)
    {
        if (Comment::where('id', $request->comment_id)->exists()) {
            $commentdelete = Comment::where('id', $request->comment_id)->first();
            $commentdelete->delete(); 
             return response()->json(['success' => 'Comment deleted successfully']);
            }else{
                return response()->json(['error' => 'Comment already deleted!']);
            }
        
    }
}
