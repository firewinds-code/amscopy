<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ams_info;

class JobCardController extends Controller
{
  public function jobCard(Request $request)
  {
    try 
    {
      return view('jobcardday');
    } 
    catch (\Exception $ex)
    {
      $notification = array('message' => $ex->getMessage().' Line: '.$ex->getLine(),'alert-type' => 'error');
      return back()->with($notification);
    }
  }
  
  public function __construct(ams_info $amsinfo)
  {
    $this->amsinfo = $amsinfo;
  }

  public function jobCardSuggestion(Request $request)
  {
    try 
    {
      $jobcard = array_keys($request->all())[0];
      $lists = $this->amsinfo::where('Job_card_No', 'LIKE', '%'.$jobcard.'%')->select('Job_card_No')->get();
      if(count($lists) > 0)
        {
          return  response()->json(['response' => view('job_card_list',compact('lists'))->render(), 'status', '200', 'success' => true]);
        }
      return  response()->json(['response' => '', 'status', '200', 'error' => true]);
    } 
    catch (\Exception $ex)
    {
      $notification = array(
        'message' => $ex->getMessage().' Line: '.$ex->getLine(),
        'alert-type' => 'error');
      return back()->with($notification);
    }
  }

  public function jobCardHistory(Request $request)
  {
    try 
    {
    $jobcard = $request->job_card_number_search;
    $records = $this->amsinfo::join('comp_pre_app_stages', 'comp_pre_app_stages.ref_id', 'ams_info.id')
      ->join('comp_repair_stages', 'comp_repair_stages.ref_id', 'comp_pre_app_stages.ref_id')
      ->join('comp_post_app_stages', 'comp_post_app_stages.ref_id', 'comp_repair_stages.ref_id')
      ->join('vehicle_details', 'vehicle_details.ams_info_id', 'comp_post_app_stages.ref_id')
      ->where('ams_info.Job_card_No', $jobcard)->first();

    if(isset($records))
      {
      return  response()->json(['response' => view('jobcardhistory',compact('records'))->render(), 'status', '200', 'success' => true]);
      }
    return  response()->json(['response' => '', 'status', '200', 'error' => true]);
    } 
    catch (\Exception $ex)
    {
      $notification = array(
        'message' => $ex->getMessage().' Line: '.$ex->getLine(),
        'alert-type' => 'error');
      return back()->with($notification);
    }
  }
}