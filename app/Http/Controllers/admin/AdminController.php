<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SubmitReport;
use App\Models\SubmitDetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        //  $user_id = Auth::user()->id;
        //  $startOfMonth = Carbon::now()->startOfMonth();
        //  $startOfYear = Carbon::now()->startOfYear();
// 'getTodayData' => SubmitReport::where('user_id', $user_id)->whereDate('created_at', today())->count(),
// 'runningMonthlyData' => SubmitReport::where('user_id', $user_id)->where('created_at', '>=',
// $startOfMonth)->get()->count(),
// 'runningYearlyData' => SubmitReport::where('user_id', $user_id)->where('created_at', '>=',
// $startOfYear)->get()->count(),

         $data = [
            
            'user'=>User::where('role', 2)->get(),
            'totalVisit' => SubmitReport::get()->count(),
            'totalpositive' => SubmitReport::where('visit_status', 'positive')->get()->count(),
            'totalSold' => SubmitReport::where('visit_status', 'Confirmed ')->get()->count(), 
            
         ];

           return view('adminDashboard.page.dashboard', $data);
           
    }
}
