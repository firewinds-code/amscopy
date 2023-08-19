<?php
use App\Models\ams_info_log;
use Illuminate\Http\Request;
use App\Models\PostApprovalStageReason;
use App\Models\RepairApprovalStageReason;
use App\Models\PreApprovalStageReason;

if (!function_exists("trackLogs")) {
    function trackLogs($Job_card_No, $action, $title, $data, $userid)
    {
        $insertArr = array(
            'Job_card_No' => $Job_card_No,
            'action' => $action,
            'title' => $title,
            'data' => $data,
            'created_by' => $userid,
        );
        ams_info_log::insert($insertArr);
        return true;
    }
}

if (!function_exists("callNotification")) {
    function callNotification($alert, $message)
    {
        $notification = array(
            'message' => $message,
            'alert-type' => $alert
        );
        //dd($notification);
        return $notification;
        //return true;
    }//
}

function preApprovalStageReason()
{
    return PreApprovalStageReason::all();
}
function postApprovalStageReason()
{
    return PostApprovalStageReason::all();
}
function repairApprovalStageReason()
{
    $list = RepairApprovalStageReason::all();

    return $list;
}

function repairApprovalStageName($id)
{
    dd('i am helper ');
    $name = RepairApprovalStageReason::where('id', $id)->first();
    return $name;
}


