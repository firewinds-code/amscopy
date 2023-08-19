<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\ams_info;
use Validator;
use Illuminate\Http\Request;
use DB;
class CronJobController extends Controller
{
   
    public function index()
    {
       
        // $data = ams_info::where('created_at', '>=', Carbon::now()->subDay())->where('flag','1')->where('case_status','0')->get()->toArray();
        $data = DB::select("select * from ams_info where flag=1 and case_status_flag=0 and cast(now() as datetime) >date_add(cast( created_at as datetime), interval 1 day )");
        //  dd($data);
        foreach ($data as $value) {
            $id = $value->id;
            $case_status_flag = $value->case_status_flag;
            ams_info::where('id',$id)->update(['flag'=>'0']);
        }
    }

  


}
