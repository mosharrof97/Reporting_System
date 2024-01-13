<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SubmitReport;
use Illuminate\Support\Facades\Auth;



class EmployeeController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfYear = Carbon::now()->startOfYear();
        

        $data = [
            'getTodayData' => SubmitReport::where('user_id', $user_id)->whereDate('created_at', today())->count(),
            'runningMonthlyData' => SubmitReport::where('user_id', $user_id)->where('created_at', '>=', $startOfMonth)->get()->count(),
            // 'runningYearlyData' => SubmitReport::where('user_id', $user_id)->where('created_at', '>=', $startOfYear)->get()->count(),
            'positiveVisit' => SubmitReport::where('user_id', $user_id)->where('visit_status',
            'positive')->get()->count(),
        ];

        return view('userDashboard\page\dashboard', $data);
    }

    
}
