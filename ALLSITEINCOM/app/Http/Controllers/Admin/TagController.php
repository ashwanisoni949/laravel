<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Redirect;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taglist = Tag::all();
        return view('admin.tag.index',compact('taglist'));
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
            'tag_name' => 'required',
        ]);
        
        $department = new Tag();
        $department->tag_name	 = $request->tag_name;
        $department->status = 1;
        $department->save();
        return Redirect::back()->with('success', 'Tag created successfuly');
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
        $edittag = Tag::find($id);
        return response($edittag);
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
        $validated = $request->validate([
            'edit_tag' => 'required',
        ]);
        $tagupdate =  Tag::where('id', $request->tag_id)->first();
        $tagupdate->tag_name = $request->edit_tag;
        $tagupdate->update();
        return response()->json(['status'=>1, 'success'=>'Tag Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  destroy(Request $request)
    {

        if (Tag::where('id', $request->tag_id)->exists()) {
            $tagdelete = Tag::where('id', $request->tag_id)->first();
            $tagdelete->delete(); 
             return response()->json(['success' => 'Tag deleted successfully']);
            }else{
                return response()->json(['error' => 'Tag already deleted!']);
            }
    }
    public function changeTagStatus(Request $request)
    {
        $designation =  Tag::where('id' ,$request->tag_id)->first();
        $designation->status = $request->status;
        $designation->update();
        return response()->json(['status'=>1, 'success'=>' Tag Status Changed Successfully']);
    }
}
