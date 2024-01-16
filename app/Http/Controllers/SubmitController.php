<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\SubmitReport;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Schedule;
use App\Models\SubmitDetails;
use DB;

class SubmitController extends Controller
{
     public function index()
     {
        $user_id=Auth::user()->id;
        $submitReport = SubmitReport::where('user_id', $user_id)->orderBy('id', 'ASC')->paginate(15);
        return view('userDashboard.page.report_List', compact('submitReport'));
     }

    //  Select Upazila
     public Function childOption( Request $request){

        $upazila=Upazila::where('district_id', $request->district_id)->orderBy('name', 'ASC')->get();
        $previous_school=SubmitReport::where('school_name', $request->previous_school)->first();
        $schedule = Schedule::where('school_name', $request->schedule)->first();
        
        return response()->json([
            'status'=> true,
            'upazila' =>$upazila,
            'previous_school'=>$previous_school,
            'schedule' =>$schedule,
        ]);
     }
     

    public function create()
    {
        $user_id=Auth::user()->id;
        $data=[
            'district' => District::get(),
            'previousSchool' => SubmitReport::where('user_id',$user_id)->get(), 
            'schedule'=>Schedule::where('user_id',$user_id)->get(),
        ];
        return view('userDashboard.page.submit_Report', $data);
    }

    public function store(Request $request)
    {
        $request->validate([ 
            'school_name' => ['required', 'string', 'max:255'],
            'h_teacher_name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'max:15'],
            'eiin_number' => ['required', 'max:15'],
            'district_id' => ['required', 'string', 'max:255'],
            'upazila_id' => ['required', 'string', 'max:255'],
            'visit_status' => ['required', 'string', 'max:255'],
            'school_comment' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            't_a_bill' => ['required', 'max:255'],

            ], [
            'image.required' => 'Please upload an image.',
        ]);
       
        if ($request->hasFile('image')) {
            $imageName = 'User_' . time() . '_' . mt_rand(100000, 20000000) . '.' . $request->file('image')->extension();

            $request->file('image')->move(storage_path('public\images'), $imageName);
         }
       
        $data = [
            'user_id'=>Auth::user()->id,
            'school_name' => $request->school_name,
            'h_teacher_name' => $request->h_teacher_name,
            'number' => $request->number,
            'eiin_number' => $request->eiin_number,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'visit_status' => $request->visit_status,
            'school_comment' => $request->school_comment,
            'image' => $imageName ?? 'No Image',
            't_a_bill' => $request->t_a_bill,
        ];
        
        if($request->schedule){
            
            try {
                DB::beginTransaction();
               $report_id= SubmitReport::create($data);
                SubmitDetails::create([
                    'report_id'=>$report_id->id,
                    'comment' => $request->school_comment,
                ]);

                $dataDelete = Schedule::where('school_name', $request->schedule)->first();
                $dataDelete->delete();
                DB::commit();
                return back()->with('success','Data Input Successfully');
            } catch (\Exception $e) {
                DB::rollback();
            }
        // }elseif($request->previous_school){
        //     try {
        //         DB::beginTransaction();

        //         SubmitReport::create($data);
        //         SubmitDetails::create(['comment' => $request->school_comment,]);
        //         DB::commit();
        //         return back()->with('success','Data Input Successfully');
        //     } catch (\Exception $e) {
        //         DB::rollback();
        //     }
        }else{
            try {
                DB::beginTransaction();

                $report_id= SubmitReport::create($data);
                SubmitDetails::create([
                    'report_id'=>$report_id->id,
                    'comment' => $request->school_comment,
                ]);
                DB::commit();
                return back()->with('success','Data Input Successfully');
            } catch (\Exception $e) {
                DB::rollback();
            } 
        }
        
    }

    public function view($id)
    {
    
        $submitReport = SubmitReport::where('user_id', $id)->first();
        return view('userDashboard.page.single_report', compact('submitReport'));
    }


// Schedule
 public function scheduleList()
 {
    $data=[
        
    'schedule' => Schedule::get(),
    ];
    return view('adminDashboard.page.schedule_list',
    $data);
 }


    public function scheduleCreate()
    {
        $user_id=Auth::user()->id;
        $data=[
            'district' => District::get(),
            'previousSchool' => SubmitReport::where('user_id',$user_id)->get(),
            'schedule' => Schedule::where('user_id',$user_id)->get(),
        ];
        return view('userDashboard.page.schedule', $data);
    }

    public function scheduleStore(Request $request)
    {
        $request->validate([
            'school_name' => ['required', 'string', 'max:255'],
            'h_teacher_name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'max:15'],
            'eiin_number' => ['required', 'max:15'],
            'district_id' => ['required', 'string', 'max:255'],
            'upazila_id' => ['required', 'string', 'max:255'],
            'schedule_comment' => ['required', 'string', 'max:255'],
            'date' => ['required'],
        ]);
 
        // dd($request->all());
        Schedule::create([
            'user_id'=>Auth::user()->id,
            'school_name' => $request->school_name,
            'h_teacher_name' => $request->h_teacher_name,
            'number' => $request->number,
            'eiin_number' => $request->eiin_number,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'schedule_comment' => $request->schedule_comment,
            'date' => $request->date,
        ]);

        return back()->with('success','Data Input Successfully');
    }

    public function viewSchedule($id)
    {

    $submitReport = Schedule::where('user_id', $id)->first();
    return view('userDashboard.page.single_report', compact('submitReport'));
    }
}
