<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubmitReport;
use Illuminate\Support\Facades\DB;


class MarketingReportController extends Controller
{
    public function index()
    {
        // $marketingReport = SubmitReport::select(DB::raw('school_name, COUNT(school_name) as  count')) ->groupBy('school_name') ->having('count', '>', 1)->orderBy('id', 'ASC') ->paginate(15);

       $marketingReport = SubmitReport::orderBy('id', 'ASC')
        ->paginate(15);
        return view('adminDashboard.page.marketingReport', compact('marketingReport'));
    }
}
