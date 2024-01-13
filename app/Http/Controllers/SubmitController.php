<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\SubmitReport;
use Illuminate\Support\Facades\Auth;

class SubmitController extends Controller
{
     public function index()
     {
        $user_id=Auth::user()->id;
        $submitReport = SubmitReport::where('user_id', $user_id)->orderBy('id', 'ASC')->paginate(15);
        return view('userDashboard.page.report_List', compact('submitReport'));
     }

    public function create()
    {
        return view('userDashboard.page.submit_Report');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'user_id'=>Auth::user()->id,
            'school_name' => ['required', 'string', 'max:255'],
            'h_teacher_name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'max:15'],
            'eiin_number' => ['required', 'max:15'],
            'district' => ['required', 'string', 'max:255'],
            'upazila' => ['required', 'string', 'max:255'],
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

        // dd($request);
        
        SubmitReport::create([
            'user_id'=>Auth::user()->id,
            'school_name' => $request->school_name,
            'h_teacher_name' => $request->h_teacher_name,
            'number' => $request->number,
            'eiin_number' => $request->eiin_number,
            'district' => $request->district,
            'upazila' => $request->upazila,
            'visit_status' => $request->visit_status,
            'school_comment' => $request->school_comment,
            'image' => $imageName ?? 'No Image',
            't_a_bill' => $request->t_a_bill,
        ]);

        return back()->with('success','Data Input Successfully');
    }
}
