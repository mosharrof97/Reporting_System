<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\SubmitReport;
use App\Models\SubmitDetails;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class MarketingReportController extends Controller
{
    public function index(Request $request )
    {
        if($request->ajax()){
            $user_id=User::where('name', $request->name)->pluck('id');
            // $dmoDatas = '';
            if($request->name){
                $dmoDatas = SubmitReport::where('user_id', $user_id)->with('user', 'district',
                'upazila')->orderBy('id','desc')->get();
                return response()->json([
                'status' => true,
                'dmoDatas' => $dmoDatas,
                ]);
            }elseif($request->visit_status){
                $visit_status = SubmitReport::where('visit_status', $request->visit_status)->with('user', 'district',
                'upazila')->orderBy('id','desc')->get();

                return response()->json([
                'status' => true,
                'visit_status' => $visit_status,
                ]);
            }elseif($request->start_date && $request->end_date){
                    $date_Datas = SubmitReport::with('user', 'district','upazila')->orderBy('id','desc')
                    ->when($request->start_date && $request->end_date,
                        function (Builder $builder) use ($request) {
                            $builder->whereBetween(
                                DB::raw('DATE(updated_at)'),
                                [
                                    $request->end_date,
                                    $request->start_date,
                                ]
                            );
                        }
                    )->get();

                return response()->json([
                'status' => true,
                'date_Datas' => $date_Datas,
                ]);
            }
        }else{
            $user = User::where('role',2)->orderBy('id', 'desc')->get();
            $marketingReport = SubmitReport::orderBy('id', 'desc')
            ->paginate(15);
            $totalReport = SubmitReport::orderBy('id', 'desc')
            ->get();

            return view('adminDashboard.page.marketingReport', compact('user','marketingReport','totalReport'));
        }
        
    }

    
    public function reportDetails(Request $request )
    { 
        $reportDetails = SubmitDetails::where('report_id',$request->report_id)->orderBy('id', 'desc') ->get();
    //    dd($request->report_id);
         return response()->json([
         'status'=> true,
         'report' =>$reportDetails,
        ]);
    }
}