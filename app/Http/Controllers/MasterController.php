<?php

namespace App\Http\Controllers;

use App\Models\MajorMinorTat;
use App\Models\PreApprovalStageReason;
use App\Models\PostApprovalStageReason;
use App\Models\RepairApprovalStageReason;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MasterController extends Controller
{

  public $majorTat;

  public $repair;

  public $post;

  public $pre;

  public function __construct(
    MajorMinorTat $majorTat,
    RepairApprovalStageReason $repair,
    PostApprovalStageReason $post,
    PreApprovalStageReason $pre
  ) { //modals for all pages will be called using 1 modal body by this (modal is on mojorMinor.blade)
    $this->majorTat = $majorTat;
    $this->repair = $repair;
    $this->post = $post;
    $this->pre = $pre;
  }


  public function preStageReason()
  {
    return view('stageDelayReason');
  }

  public function postStageReason()
  {
    return view('stageDelayReason');
  }

  public function repairStageReason()
  {
    return view('stageDelayReason');
  }

  public function reasonGetData(Request $request)
  {
    try 
    {
      if ($request->slug == 'pre-stage-reason') 
      {
        $predata = $this->pre::all();
        $slug = $request->slug;
        return response()->json(['html' => view('ajax.reasonStage', compact('predata', 'slug'))->render(), 'success' => true]);
      }
      if ($request->slug == 'repair-stage-reason') 
      {
        $slug = $request->slug;
        $repairdata = $this->repair::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('repairdata', 'slug'))->render(), 'success' => true]);
      }
      if ($request->slug == 'post-approval-stage') 
      {
        $postdata = $this->post::all();
        $slug = $request->slug;
        return response()->json(['html' => view('ajax.reasonStage', compact('postdata', 'slug'))->render(), 'success' => true]);
      }
      return response()->json(['error' => true, 'message' => 'something went wrong']);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['message' =>  $ex->getMessage(), 'error' => true]);
    }
  }

  public function addReason()
  {
    try 
    {
      return  response()->json(['html' => view('ajax.addReason')->render(), 'success' => true, 'status' => 200]);
    } catch (\Exception $ex) {
      return  response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function saveReason(Request $request)
  {
    try 
    {
      if ($request->slugtype == 'pre-stage-reason') 
      {
        $condition = $this->pre::create(['delay_reason' => $request->reason, 'created_at' => Carbon::now()]);
        $predata = $this->pre::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('predata'))->render(), 'message' => 'Reason Inserted Successfully !', 'success' => true, 'status' => 200]);
      }
      if ($request->slugtype == 'repair-stage-reason') 
      {
        $condition = $this->repair::create(['repair_delay_reason' => $request->reason, 'created_at' => Carbon::now()]);
        $repairdata = $this->repair::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('repairdata'))->render(), 'message' => 'Reason Inserted Successfully !', 'success' => true, 'status' => 200]);
      }
      if ($request->slugtype == 'post-approval-stage') 
      {
        $condition = $this->repair::create(['post_delay_reason' => $request->reason, 'created_at' => Carbon::now()]);
        $postdata = $this->post::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('postdata'))->render(), 'message' => 'Reason Inserted Successfully !', 'success' => true, 'status' => 200]);
      }
      return response()->json(['message' => 'Reason Updated Failed !', 'error' => true]);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['message' =>  $ex->getMessage(), 'error' => true]);
    }
  }

  public function deleteReason(Request $request)
  {
    try 
    {
      if ($condition = $this->pre::where('id', $request->id)->delete()) 
      {
        $predata = $this->pre::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('predata'))->render(), 'message' => 'Reason Deleted Successfully !', 'success' => true, 'status' => 200]);
      }
      if ($condition  = $this->repair::where('id', $request->id)->delete()) 
      {
        $repairdata = $this->repair::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('repairdata'))->render(), 'message' => 'Reason Deleted Successfully !', 'success' => true, 'status' => 200]);
      }
      if ($condition  = $this->repair::where('id', $request->id)->delete()) 
      {
        $postdata = $this->post::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('postdata'))->render(), 'message' => 'Reason Deleted Successfully !', 'success' => true, 'status' => 200]);
      }
      return response()->json(['message' => 'Reason delete Failed !', 'error' => true]);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['message' =>  $ex->getMessage(), 'error' => true]);
    }
  }

  public function editReason(Request $request)
  {
    try 
    {
      if ($request->slug == 'pre-stage-reason') 
      {
        $slug = $request->slug;
        $predata = $this->pre::where('id', $request->id)->first();
        return response()->json(['html' => view('ajax.editReason', compact('predata', 'slug'))->render(), 'success' => true, 'status' => 200]);
      }
      if ($request->slug == 'repair-stage-reason') 
      {
        $slug = $request->slug;
        $repairdata = $this->repair::where('id', $request->id)->first();
        return response()->json(['html' => view('ajax.editReason', compact('repairdata', 'slug'))->render(), 'success' => true, 'status' => 200]);
      }
      if ($request->slug == 'post-approval-stage') 
      {
        $slug = $request->slug;
        $postdata = $this->repair::where('id', $request->id)->first();
        return response()->json(['html' => view('ajax.editReason', compact('postdata', 'slug'))->render(),  'success' => true, 'status' => 200]);
      }
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['message' =>  $ex->getMessage(), 'error' => true]);
    }
  }

  public function updateReason(Request $request)
  {
    try 
    {
      if ($request->slugtype == 'pre-stage-reason') 
      {
        $condition = $this->pre::where('id', $request->id)->update(['delay_reason' => $request->reason]);
        if ($condition) 
        {
          $predata = $this->pre::all();
          return response()->json(['html' => view('ajax.reasonStage', compact('predata'))->render(), 'message' => 'Reason Updated Successfully !', 'success' => true, 'status' => 200]);
        }
      }
      if ($request->slugtype == 'repair-stage-reason') 
      {
        $condition = $this->repair::where('id', $request->id)->update(['repair_delay_reason' => $request->reason]);
        if ($condition) 
        {
          $repairdata = $this->repair::all();
          return response()->json(['html' => view('ajax.reasonStage', compact('repairdata'))->render(), 'message' => 'Reason Updated Successfully !', 'success' => true, 'status' => 200]);
        }
      }
      if ($request->slugtype == 'post-stage-reason') 
      {
        $condition = $this->repair::where('id', $request->id)->update(['post_delay_reason' => $request->reason]);
        if ($condition) 
        {
        $postdata = $this->post::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('postdata'))->render(), 'message' => 'Reason Updated Successfully !', 'success' => true, 'status' => 200]);
        }
      }
      return response()->json(['message' => 'Reason Updated Failed !', 'error' => true]);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['message' =>  $ex->getMessage(), 'error' => true]);
    }
  }
  /*********************************** Master -> (Pre, Repair, Post) ends here ************************************/



  /************************************* Master -> Major Minor TAT **********************************************/
  public function getmajorMinorTat(Request $request)
  {
    try 
    {
      $data = $this->majorTat::all();
      return response()->json(['html' => view('ajax.minorMajorTat', compact('data'))->render(), 'success' => true, 'status' => 200]);
    } 
    catch (\Exception $ex) 
    {
      return response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function majorMinorTat(Request $request)
  {
    return view('majorMinor');
  }

  public function addTat()
  {
    try 
    {
      return  response()->json(['html' => view('ajax.addTat')->render(), 'success' => true, 'status' => 200]);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function editTat(Request $request)
  {
    try 
    {
      $row = $data = $this->majorTat::where('id', $request->id)->first();
      return  response()->json(['html' => view('ajax.editTat', compact('row'))->render(), 'success' => true, 'status' => 200]);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function updateTat(Request $request)
  {
    try 
    {
      $condition  = $this->majorTat::where('id', $request->id)->update(['tatName' => $request->tatName, 'majorTat' => $request->majorTat, 'minorTat' => $request->minorTat]);
      if ($condition) 
      {
        $data = $this->majorTat::all();
        return response()->json(['html' => view('ajax.minorMajorTat', compact('data'))->render(), 'message' => 'TAT Updated Successfully !', 'success' => true, 'status' => 200]);
      }
      return response()->json(['message' => 'TAT Updated Failed !', 'error' => true]);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function saveTat(Request $request)
  {
    try 
    {
      $condition  = $this->majorTat::create(['tatName' => $request->tat_name, 'majorTat' => $request->tat_days_major, 'minorTat' => $request->tat_days_minor, 'created_at' => Carbon::now()]);
      if ($condition) 
      {
        $data = $this->majorTat::all();
        return response()->json(['html' => view('ajax.minorMajorTat', compact('data'))->render(), 'message' => 'TAT Insterd Successfully !', 'success' => true, 'status' => 200]);
      }
      return response()->json(['message' => 'TAT Updated Failed !', 'error' => true]);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function deleteTat(Request $request)
  {
    try 
    {
      $condition  = $this->majorTat::where('id', $request->id)->delete(); 
      {
        $data = $this->majorTat::all();
        return response()->json(['html' => view('ajax.minorMajorTat', compact('data'))->render(), 'message' => 'TAT Deleted Successfully !', 'success' => true, 'status' => 200]);
      }
      return response()->json(['message' => 'TAT Deleted Failed !', 'error' => true]);
    } 
    catch (\Exception $ex) 
    {
      return  response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }
}