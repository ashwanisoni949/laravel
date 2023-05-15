<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\BlogImage;
use Redirect;
use App\Helpers;


class ImageBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status',1)->get();
        $blogImage = BlogImage::all();
        return view('admin.blog-image.index',compact('category','blogImage'));
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
        // $data = $request->validate([
        //     'name'        => 'required|string|max:255',
        //     'images'      => 'required|array',
        //     'category_id' => 'required',
        // ]);

        $input = $request->all();
        $images=[];

        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('blog-image',$name);
                $images[]=$name;
            }
        }
        /*Insert your data*/
        BlogImage::insert( [
            'images'      =>  implode(",",$images),
            'name'        =>  $input['name'],
            'category_id' =>  $input['category_id'],
            'status'      => 1,
        ]);
        return Redirect::back()->with('success', 'Image Added Successfully');
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
