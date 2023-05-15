<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Redirect;
use App\Helpers;


class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorylist = Category::all();
        return view('admin.category.index',compact('categorylist'));
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
            'category_name' => 'required',
        ]);
        
        $department = new Category();
        $department->category_name	 = $request->category_name;
        $department->slug	         = $request->slug;
        $department->status = 1;
        $department->save();
        return Redirect::back()->with('msg', 'The Message');
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
        $edicategory = Category::find($id);
        return response($edicategory);
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
        $categoryupdate =  Category::where('id', $request->category_id)->first();
        $categoryupdate->category_name = $request->editcategory_name;
        $categoryupdate->slug = $request->edit_slug;
        $categoryupdate->update();
        return response()->json(['status'=>1, 'success'=>'Category Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Category::where('id', $request->category_id)->exists()) {
            $categorydelete = Category::where('id', $request->category_id)->first();
            $categorydelete->delete(); 
             return response()->json(['success' => 'Category deleted successfully']);
            }else{
                return response()->json(['error' => 'Category already deleted!']);
            }
    }
    
    public function changeDesignationStatus(Request $request)
    {
        $designation =  Category::where('id' ,$request->category_id)->first();
        $designation->status = $request->status;
        $designation->update();
        return response()->json(['status'=>1, 'success'=>' Category Status Changed Successfully']);
    }
    
}
