<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Comment;
use Image;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontend_id = ['html','css','javascript','bootstrap','jquery','ajax'];
        $backend_id  = ['php','laravel','ci'];
        $tags        = Tag::where('status',1)->take(8)->get();
        $categorys   = Category::where('status',1)->get();
        $bloglist    = Blog::where(['status'=> 1])->whereIn('category_slug',$frontend_id)->get();
        $backend     = Blog::where(['status'=> 1])->whereIn('category_slug',$backend_id)->get();
        $totalblog   = Blog::where(['status'=> 1])->get();
        $latestjobs  = Blog::where(['status' => 1,'category_slug' =>'latest-jobs'])->get();
        $popularitem = Blog::where(['status' => 1])->orderBy('view', 'desc')->get();
        $latestitem  = Blog::where(['status' => 1])->latest('created_at')->take(6)->get();
        return view('users.index',compact('latestjobs','tags','categorys','bloglist','totalblog','backend','popularitem','latestitem'));
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
        dd($id);
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
    public function UserReplyUpdate(Request $request)
    {
        if(!empty($request->update_id)){
            $userreply =  Comment::where('id', $request->update_id)->first();
            $userreply->description = $request->user_name;
            $userreply->update();
            return response()->json(['status'=>1, 'success'=>'User Reply Updated Successfully']);
        }
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

    // public function UserReply($id)
    // {
    //     dd($id);
    // }
    public function UserReply(Request $request)
    {
        if(!empty($request->user_id)){
            $userreply =  Comment::where('id', $request->user_id)->first();
         return response()->json(['userreply'=>$userreply]);
        }
    }
    public function AdminReply(Request $request)
    {
        if(!empty($request->admin_id)){
            $adminreply =  Comment::where('id', $request->admin_id)->first();
         return response()->json(['adminreply'=>$adminreply]);
        }
    }
    public function AdminReplyUpdate(Request $request)
    {
        if(!empty($request->admin_update_id)){
            $userreply =  Comment::where('id', $request->admin_update_id)->first();
            $userreply->admin_reply = $request->admin_name;
            $userreply->update();
            return response()->json(['status'=>1, 'success'=>'Admin Reply Updated Successfully']);
        }
    }
    
    public function LatestJobs()
    {
        $tags      = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist  = Blog::where(['status' => 1, 'category_slug' => 'latest-jobs'])->paginate(10);
        $latestjobs = Blog::where(['status' => 1, 'category_slug' => 'latest-jobs'])->latest('created_at')->get();
        $count     = 1;
        $comments  = Comment::where(['status' => 1, 'category' => 'latest-jobs'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'latest-jobs'])->count();
        return view('users.latest-jobs.index',compact('tags','categorys','bloglist','count','comments','latestjobs','commentcount'));
    }
    public function Result()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'result'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'result'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'result'])->count();
        return view('users.result.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function Syllabus()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'syllabus'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'syllabus'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'syllabus'])->count();
        return view('users.syllabus.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function LaravelMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'laravel'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'laravel'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'laravel'])->count();
        return view('users.laravel.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function CIMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'ci'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'ci'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'ci'])->count();
        return view('users.ci.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function UpBoard()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => '10th-12th-up-board'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => '10th-12th-up-board'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => '10th-12th-up-board'])->count();
        return view('users.10th-12th-up-board.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
     public function AllCategory()
    {
         $frontend_id = ['html','css','javascript','bootstrap','jquery','ajax'];
        $backend_id  = ['php','laravel','ci'];
        $tags        = Tag::where('status',1)->take(8)->get();
        $categorys   = Category::where('status',1)->get();
        $bloglist    = Blog::where(['status'=> 1])->whereIn('category_slug',$frontend_id)->paginate(2);
        $backend     = Blog::where(['status'=> 1])->whereIn('category_slug',$backend_id)->paginate(2);
        $totalblog   = Blog::where(['status'=> 1])->get();
        $latestjobs  = Blog::where(['status' => 1,'category_slug' => 'latest-jobs'])->paginate(2);
        $result      = Blog::where(['status' => 1,'category_slug' => 'result'])->paginate(2);
        $laravel     = Blog::where(['status' => 1,'category_slug' => 'laravel'])->paginate(2);
        $popularitem = Blog::where(['status' => 1])->orderBy('view', 'desc')->get();
        $latestitem  = Blog::where(['status' => 1])->latest('created_at')->take(6)->get();
        return view('users.category',compact('latestjobs','tags','categorys','bloglist','totalblog','backend','popularitem','latestitem','result','laravel'));
    }

    public function HTMLMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'html'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'html'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'html'])->count();
        return view('users.html.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function CSSMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'css'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'css'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'css'])->count();
        return view('users.css.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function JavascriptMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'javascript'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'javascript'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'javascript'])->count();
        return view('users.javascript.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function AjaxMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'ajax'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'ajax'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'ajax'])->count();
        return view('users.ajax.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function BootstrapMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'bootstrap'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'bootstrap'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'bootstrap'])->count();
        return view('users.bootstrap.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function JqueryMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'jquery'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'jquery'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'jquery'])->count();
        return view('users.jquery.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function PhpMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'php'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'php'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'php'])->count();
        return view('users.php.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }  
    public function PythonMenu()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 1])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'html'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1])->count();
        return view('users.python.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function AboutUs()
    {
        return view('users.about-us.index');
    }
    public function termsCondition()
    {
        return view('users.terms-condition.index');
    }
    public function privacyPolicy()
    {
        return view('users.privacy-policy.index');
    }
    public function Disclaimer()
    {
        return view('users.disclaimer.index');
    }
    public function Computer()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'computer'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'computer'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'computer'])->count();
        return view('users.computer.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function Shayari()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'shayari'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'shayari'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'shayari'])->count();
        return view('users.shayari.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function GoldSilver()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' =>'gold-silver'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'goldsilver'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'goldsilver'])->count();
        return view('users.gold-silver.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }
    public function Course()
    {
        $tags = Tag::where('status', 1)->take(8)->get();
        $categorys = Category::where('status', 1)->get();
        $bloglist = Blog::where(['status' => 1, 'category_slug' => 'course'])->paginate(10);
        $count = 1;
        $comments = Comment::where(['status' => 1, 'category' => 'course'])->take(5)->latest('created_at')->get();
        $commentcount = Comment::where(['status' => 1, 'category' => 'course'])->count();
        return view('users.course.index',compact('tags','categorys','bloglist','count','comments','commentcount'));
    }

    public function CSSSearch(Request $request)
    {
        $csslist = Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'css'])->get();
        return response()->json(['csslist'=>$csslist]);
    }
    public function JSSearch(Request $request)
    {
        $javascriptlist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'javascript'])->get();
        return response()->json(['javascriptlist'=>$javascriptlist]);
    }
    public function JquerySearch(Request $request)
    {
        $jquerylist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'jquery'])->get();
        return response()->json(['jquerylist'=>$jquerylist]);
    }
    public function AJAXSearch(Request $request)
    {
        $ajaxlist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'ajax'])->get();
        return response()->json(['ajaxlist'=>$ajaxlist]);
    }
    public function PHPSearch(Request $request)
    {
        $phplist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'php'])->get();
        return response()->json(['phplist'=>$phplist]);
    }
    public function CISearch(Request $request)
    {
        $cilist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'ci'])->get();
        return response()->json(['cilist'=>$cilist]);
    }
    public function LARAVELSearch(Request $request)
    {
        $laravellist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'laravel'])->get();
        return response()->json(['laravellist'=>$laravellist]);
    }
    public function RESULTSearch(Request $request)
    {
        $resultlist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'result'])->get();
        return response()->json(['resultlist'=>$resultlist]);
    }
    public function LatestJobsSearch(Request $request)
    {
        $ljlist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'latest-jobs'])->get();
        return response()->json(['ljlist'=>$ljlist]);
    }
    public function UPBoardSearch(Request $request)
    {
        $upboardlist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => '10th-12th-up-board'])->get();
        return response()->json(['upboardlist'=>$upboardlist]);
    }
    public function SymbolsSearch(Request $request)
    {
        $syllabuslist = Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'syllabus'])->get();
        return response()->json(['syllabuslist'=>$syllabuslist]);
    }
    public function ComputerSearch(Request $request)
    {
        $computerlist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'computer'])->get();
        return response()->json(['computerlist'=>$computerlist]);
    }
    public function CourseSearch(Request $request)
    {
        $courselist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'course'])->get();
        return response()->json(['courselist'=>$courselist]);
    }
    public function GoldSilverSearch(Request $request)
    {
        $gslist=Blog::where('title','LIKE','%'.$request->search.'%')->where(['status' => 1, 'category_slug' => 'gold-silver'])->get();
        return response()->json(['gslist'=>$gslist]);
    }
    public function SearchBlog(Request $request)
    {
        $bloglist=Blog::where('title','LIKE','%'.$request->search_blog.'%')->where('status',1)->get();
        $frontend_id = ['html','css','javascript','bootstrap','jquery','ajax'];
        $backend_id  = ['php','laravel','ci'];
        $tags        = Tag::where('status',1)->take(8)->get();
        $categorys   = Category::where('status',1)->get();
        $backend     = Blog::where(['status'=> 1])->whereIn('category_slug',$backend_id)->get();
        $totalblog   = Blog::where(['status'=> 1])->get();
        $latestjobs  = Blog::where(['status' => 1,'category_slug' => 'latest-jobs'])->get();
        $popularitem = Blog::where(['status' => 1])->orderBy('view', 'desc')->get();
        $latestitem  = Blog::where(['status' => 1])->latest('created_at')->take(6)->get();
        return view('users.index',compact('latestjobs','tags','categorys','bloglist','totalblog','backend','popularitem','latestitem'));
    }
}
