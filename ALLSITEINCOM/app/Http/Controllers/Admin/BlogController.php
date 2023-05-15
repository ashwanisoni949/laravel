<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use Storage;
use Redirect;
use File;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Image;




class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloglist = Blog::latest('created_at')->get();
        return view('admin.blog.index',compact('bloglist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('admin.blog.create',compact('category'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $validated = $request->validate([
        //     'title'       => 'required',
        //     'slug'        => 'required',
        //     'category'    => 'required',
        // ]);

        // image save public folder

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        dd($img);
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
   
        $this->postImage->add($input);







        $destinationPath = 'thumbnail';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);
        $path = $destinationPath.'/'.$myimage;
        
        
        $blog=new Blog();
        $blog->title=$request->title;
        $blog->slug=$request->slug;
        $blog->category_slug = $request->category_slug;
        $blog->description=$request->description;
        $blog->short_description=$request->short_description;
        $blog->image=$path;
        $blog->start_date = $request->start_date;
        $blog->end_date = $request->end_date;
        $blog->status= 1;
        $blog->save();
        return Redirect::back()->with('success', 'Blog Added successfuly');
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
        if(!empty($id))
        {
        $editblog = Blog::find($id);
        $category = Category::where('status',1)->get();
        return view('admin.blog.edit', compact('editblog','category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
        // dd($blog);
        // dd($request->all());
         // $validated = $request->validate([
        //     'title'       => 'required',
        //     'slug'        => 'required',
        //     'category'    => 'required',
        // ]);
        if($request->file('image')){
        $destinationPath = 'thumbnail';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);
        $path = $destinationPath.'/'.$myimage;

            $old_image=$blog->image;
           
            $blog->image=$path;
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        $blog->image=$path;

        }
        $blog->title=$request->title;
        $blog->slug=$request->slug;
        $blog->category_slug=$request->category_slug;
        $blog->description=$request->description;
        $blog->short_description=$request->short_description;
        $blog->start_date = $request->start_date;
        $blog->end_date = $request->end_date;
        $blog->status= 1;
        $blog->save();
        return Redirect::back()->with('success', 'Blog Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Blog::where('id', $request->blog_id)->exists()) {
            $blogdelete = Blog::where('id', $request->blog_id)->first();
            $blogdelete->delete(); 
             return response()->json(['success' => 'Blog deleted successfully']);
            }else{
                return response()->json(['error' => 'Blog already deleted!']);
            }
    }
    public function BlogStatus(Request $request)
    {
        dd($request->all());
    }
    public function blogDetails($category,$slug)
    {
        $blogdetails = Blog::where(['slug'=>$slug,'status'=>1,'category_slug' => $category])->first();
        $blog = $blogdetails->description;
        $blogdetail =  str_replace('<p>adsshow</p>', '<br><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243" crossorigin="anonymous"></script><ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-gw-3+1f-3d+2z" data-ad-client="ca-pub-5239991314032243" data-ad-slot="3252427254"></ins><script>(adsbygoogle=window.adsbygoogle||[]).push({})</script><br>', $blog);

        //    $blogdetail =  wordwrap($blog,2000,'<br><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243" crossorigin="anonymous"></script><ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-fq-1e-b-19+9l" data-ad-client="ca-pub-5239991314032243" data-ad-slot="4150290542"></ins><script>(adsbygoogle=window.adsbygoogle||[]).push({})</script><br>', true);

        // $blogdetail = preg_replace("/<p>adsshow<\/p>/ism", '<br><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243" crossorigin="anonymous"></script><ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-fq-1e-b-19+9l" data-ad-client="ca-pub-5239991314032243" data-ad-slot="4150290542"></ins><script>(adsbygoogle=window.adsbygoogle||[]).push({})</script><br>', $blog);

        if($blogdetails){
            $blogdetails->view +=1;
            $blogdetails->save();

        $viewshow = $blogdetails->view;
        $bloglist = Blog::where('status',1)->get();
        $categorys = Category::where('status',1)->get();
        $commentcount = Comment::where('category',$slug)->get();
        return view('admin.blog.show',compact('viewshow','blogdetails','bloglist','categorys','commentcount','blogdetail'));
    }
    }

    public function BlogSearch(Request $request)
    {
        $bloglist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'html'])->get();
        return response()->json(['bloglist'=>$bloglist]);
    }
    
}
