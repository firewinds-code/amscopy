<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AmsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ams_info;
use Exception;
class ReportController extends Controller
{
    public function index() 
    {
        try
        {
        return Excel::download(new AmsExport, 'Ams_Report.xlsx');
        }
        catch (Exception $e) {
            return back()->with("error","Something Went Wrong");
        }
    }
 
	public function view()
    {
        try
        {
        return view('report_view');
        }
        catch (Exception $e) {
            return back()->with("error","Something Went Wrong");
        }
    }
}