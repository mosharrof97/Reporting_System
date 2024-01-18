<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubmitReport;
use App\Models\SubmitDetails;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;


class MarketingReportController extends Controller
{
    public function index(Request $request )
    {
       $marketingReport = SubmitReport::orderBy('id', 'ASC')
        ->paginate(15);
      
        return view('adminDashboard.page.marketingReport', compact('marketingReport'));
    }

    public function reportDetails(Request $request, $id )
    { 
        $reportDetails = SubmitDetails::where('report_id',$request->report_id)->orderBy('id', 'ASC') ->get();
       dd($request->report_id);
         return response()->json([
         'status'=> true,
         'report' =>$reportDetails,
        ]);
    }
}
