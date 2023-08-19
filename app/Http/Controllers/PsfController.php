<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ams_info;
use App\Models\GeneralDetails;
use App\Models\PostServicesFeedback;
use App\Models\UserLog;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Auth;

class PsfController extends Controller
{
    
    public function __construct(ams_info $info, GeneralDetails $generalDetails,PostServicesFeedback $postServices, UserLog $userLog)
    {
        $this->middleware('auth');
        $this->info = $info;
        $this->generalDetails = $generalDetails;
        $this->postServices = $postServices;
        $this->userLog = $userLog;
    }


    public function psfReport(Request $request)
    {
       try{
           return  view('psf');
       }
       catch(Exception $ex)
       {
        return  $ex->getMessage();
       }

    }


    public function getPsfData(Request $request)
    { 
        try
        {
            $data = $this->info::join('general_acce_details', 'general_acce_details.ams_info_id', 'ams_info.id')
                        ->join('comp_post_app_stages','general_acce_details.ams_info_id', 'comp_post_app_stages.ref_id')
                        ->select('ams_info.*','general_acce_details.sac_code_wrkshp','general_acce_details.accident_charge_mobile_dealer','general_acce_details.sac_code_wrkshp')
                        ->get();
            return response()->json(['html' => view('ajax.psf',compact('data'))->render()]);
        }catch(Exception $ex)
        {
          return response()->json(['error' => $ex->getMessage()]);
        } 
    }

    public function psfDataReport(Request $request)
    {
       try{
           $id = base64_decode($request->id);
           $row = $this->postServices::where('job_card_id', $id)->first();
           $data= ams_info::select('general_acce_details.*', 'ams_info.*', 'ams_info.id as amsid', 'vehicle_details.*',)
                ->leftjoin('vehicle_details', 'ams_info.id', '=', 'vehicle_details.ams_info_id')
                ->leftjoin('general_acce_details', 'ams_info.id', '=', 'general_acce_details.ams_info_id')
                ->where('ams_info.id', $id)->first();
                return view('PsfQuestion', compact('row','id','data'));
         }catch(Exception $ex)
        {
            $error =  $ex->getMessage();
           return view('PsfQuestion', compact('error'));
        }  
    }

    public function customerQueryUpdate(Request $request)
    {
        try
        { 
        $updateArr = array();
        $updateArr = $request->all();
        $data = json_encode($updateArr,true);
        $exist  = $this->postServices::where('job_card_id', $request->job_card_id)->exists();
        if($exist){
            $condition = $this->postServices::where('job_card_id',$request->job_card_id)->update($request->all());
        }
        else{
            $condition = $this->postServices::insert($request->all());
        }
        $psf =  $this->userLog::where('job_card_id',$request->job_card_id)->exists();
        if($condition &&  (!$psf))
        {
            $complete =  $this->userLog::insert(['user_id'=>Auth::user()->id,
                'updated_by'=>Auth::user()->name,
                'label'=> 'Psf Query updated',
                'updated_data'=> $data,
                'job_card_id'=> $request->job_card_id,
                'created_at' => date('Y-m-d h:m:s')
                ]);

        }
        if($condition && $psf)
        {  
           $this->userLog::where('job_card_id',$request->job_card_id)->update(['user_id'=>Auth::user()->id,
             'updated_by' => Auth::user()->name,
             'label'=> 'Psf Query updated',
             'updated_data'=> $data,
             'job_card_id'=> $request->job_card_id,
              'updated_at' => date('Y-m-d h:m:s')
             ]);
        }
         return back()->with(['success' => "PSF Query Update Successfully"]);
        }catch(Exception $ex)
        {
            return back()->with('error', $ex->getMessage());
        }
    }
}