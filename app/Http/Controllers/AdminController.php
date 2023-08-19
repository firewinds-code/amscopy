<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\duplicate_job_card;
use App\Models\ams_info;
use Exception;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        try
        {
        $role = Auth::user()->role;
        if ($role != 'admin') {
            session()->flush();
            return redirect('/');
        }
        $data['amsDetails'] = ams_info::get();
        return view('admin.dealer', $data);
        }
        catch (Exception $e) {
            return back()->with("error","Something Went Wrong");
        }
    }

    public function uploadcase(Request $request)
    {
        try
        {
        $users  = User::where('role', 'tl')->get();
        return view('admin.uploadcase')->with(compact('users'));
        }
        catch (Exception $e) {
            return back()->with("error","Something Went Wrong");
        }
    }


    public function submitUpload(Request $request)
    {
        try {
            $ext = $request->file('case_file')->extension();
            if ($ext == 'csv') 
            {
                // dd("aaaa");
                $path = $request->file('case_file')->getRealPath();
                $path = str_replace('\\', '/', trim($path));
                // dd($path);
                $rows_data_find = array_map('str_getcsv', file($path));

                // Loop through each row (skip the header row, that's why we use array_slice)
                foreach (array_slice($rows_data_find, 1) as $ext_rows) {
                    $data = array();

                    // Assuming the Job Card No is in the first column (index 0) of the CSV
                    $jobCardNo =  $ext_rows[0];

                    // Check if the job card number already exists in the database
                    $checkJobCard = ams_info::where('Job_card_No', $jobCardNo)->get()->count();
                    //dd($checkJobCard);

                    if ($checkJobCard  > 0) {
                        //dd("dvdv");
                        // Job card number already exists, insert into duplicate_job_card table
                        duplicate_job_card::insert(['Job_card_No' => $jobCardNo]);
                    } else {
                        // Job card number does not exist, prepare data for insertion
                        foreach ($rows_data_find[0] as $gu => $gn) {
                            $data[$gn] = $ext_rows[$gu] != '' ? trim($ext_rows[$gu]) : '';
                        }
                        // Insert data into ams_info table
                        $result =  DB::table('ams_info')->insert($data);
                    }
                }
                if ($result) {
                    $notification = array(
                        'message' => "Data has been successfully Imported.",
                        'alert-type' => 'success'
                    );
                    return back()->with($notification);
                } else {
                    $notification = array(
                        'message' => "Please Select CSV file",
                        'alert-type' => 'error'
                    );
                    return back()->with($notification);
                }
            } else {
                $notification = array(
                    'message' => "Please Select CSV file",
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage() . ' Line: ' . $ex->getLine(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
}