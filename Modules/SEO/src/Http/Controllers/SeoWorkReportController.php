<?php
namespace Modules\SEO\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\SEO\Models\Website;
use Modules\UserManage\Models\User;
use Modules\SEO\Models\SeoTask;
use Modules\SEO\Models\SeoSubmissionWebsites;
use Modules\SEO\Models\WorkReport;
use App\Helper\Files;
use App\Imports\WorkReportImport;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use App\Jobs\ImportWorkReportJob;
use Illuminate\Support\Facades\Bus;
use App\Helper\Reply;
use Artisan;
use Carbon\Carbon;
use Session;
use DB;
use Modules\SEO\Models\SeoResult;
use App\Http\Requests\FileRequest\ImportProcessRequest;
// use app\Http\Requests\FileRequest\ImportRequest;
use Modules\SEO\Http\Requests\FileRequest\ImportRequest;
use Maatwebsite\Excel\Facades\Excel;




class SeoWorkReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $seo_task=Website::get();
        return view('SEO::seo-work-report.index',compact('seo_task'));
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
        // dd($request->all());
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
        //
    }



    public function workReportUrl(Request $request)
    {
        // dd($request->all());
        $startdate = $request->startDate;
        $enddate = $request->endDate;
        $website_id = $request->website_id;
        $todayDate = date("Y-m-d");

        

        if(($request->startDate == $todayDate) && ($request->website_id == '')){
             // dd($startdate."today");
            $work_report = WorkReport::with('SeoSetting','SubmissionWebsite')->select("seo_work_report.*")->whereDate('created_at', Carbon::today())->get();
            return response()->json(['work_report' => $work_report]);
        }
       
       
        $this->user=User::get();
        $this->seo_task=SeoTask::get();  
        $this->seo_posting_website=SeoSubmissionWebsites::get();  

        if(($startdate != null && $enddate != null && $website_id == null)){
           
            $work_report = WorkReport::with('SeoSetting','SubmissionWebsite')->select("seo_work_report.*")
            ->wherebetween('created_at', [$startdate, $enddate])
            ->orWhereDate('created_at',$startdate)->orWhereDate('created_at',$enddate)->get();
           
            return response()->json(['work_report' => $work_report]);
        }
        
        if($startdate != null  && $enddate != null && $website_id != null){
           
            //  $data = DB::table('seo_work_report')->where('condition',$condition)->first();
            // $newtime = strtotime($data->created_at);
            // $data->time = date('M d, Y',$newtime);
            // $work_report = WorkReport::with('SeoSetting','SubmissionWebsite')->wherebetween('created_at', [$startdate, $enddate])->where('website_id',$website_id)->get();

            $work_report = WorkReport::with('SeoSetting','SubmissionWebsite')->where('website_id',$website_id)->whereBetween(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), [$startdate, $enddate])->get();

            


            // $work_report = WorkReport::with('SeoSetting','SubmissionWebsite')->select("seo_work_report.*")->whereBetween('created_at', [$startdate.'00:00:00',$enddate.' 23:59:59'])->get();
            // $modified = $work_report->map(function($item, $key) {
            //     $created_date = $item->created_at->format('Y-m-d');
            //    return response()->json(['created_date' => $created_date]);
            //  });
            return response()->json(['work_report' => $work_report]);
        }

        
    }



    public function importData()
    {
        $user_list = User::all();
        $seo_task_list = SeoTask::all();
        $website_list = Website::all();
        return view('SEO::seo-work-report.import.import', compact('user_list','seo_task_list','website_list'));
    }

   

    public function importStore(ImportRequest $request)
    { 
     
       

        if(!empty($request->website_id && $request->seo_task_id)){
            $data = SeoSubmissionWebsites::where('website_id',$request->website_id)->where('seo_task_id',$request->seo_task_id)->first();
          
            if($data  != null){
                Session::put(['website_id'=> $request->website_id,'seo_task_id' => $request->seo_task_id,'UserId' => $request->user_id,'data_id'=> $data->id]);
                Excel::import(new WorkReportImport, $request->import_file, );
            }else{
                Session::put(['website_id'=> $request->website_id,'seo_task_id' => $request->seo_task_id, 'UserId' => $request->user_id,'data_id' => null]);
                Excel::import(new WorkReportImport, $request->import_file);
            }
        }

        return redirect()->route('seo-work.index')->with('success', 'Work Report Added Successfully!');
    }

    public function importProcess(ImportProcessRequest $request)
    {
        
        // clear previous import
        Artisan::call('queue:clear database --queue=import_work_report');
        Artisan::call('queue:flush');
        // Get index of an array not null value with key
        $columns = array_filter($request->columns, function ($value) {
            return $value !== null;
        });

        $excelData = Excel::toArray(new WorkReportImport, public_path('user-uploads/import-files/' . $request->file))[0];

        if ($request->has_heading) {
            array_shift($excelData);
        }

        $jobs = [];
        
        $columns[3] = 'user_id';
        $excelData[0][3] = 'user_id';
        $columns[4] = 'website_id';
        $excelData[0][4] = 'website_id';
        $columns[5] = 'seo_task_id';
        $excelData[0][5] = 'seo_task_id';

        foreach ($excelData as $key=>$row) {
            if($key != 0){
                $row[3] = $request->user_id;
                $row[4] = $request->website_id;
                $row[5] = $request->seo_task_id;
            }
           
            $jobs[] = (new ImportWorkReportJob($row, $columns));
        }
        // dd('');
        $batch = Bus::batch($jobs)->onConnection('database')->onQueue('import_work_report')->name('import_work_report')->dispatch();

        Files::deleteFile($request->file, 'import-files');

        return Reply::successWithData(__('messages.importProcessStart'), ['batch' => $batch]);
    }


    public function workReport(Request $request){
        
        $web_setting = Website::paginate();
        $seotask = SeoTask::OrderBy('task_priority','asc')->paginate();
        $seoresult = SeoResult::where('parent_id',0)->paginate();

        if(!empty($seoresult)){
            $seoresult = $seoresult->map(function($result){
                $result->child = SeoResult::where('parent_id', $result->id)->get();
                return $result;
            });
        }

        $this->seoresult = $seoresult;

       return view('SEO::seo-settings.index',compact('web_setting','seotask','seoresult'));
    }


}
