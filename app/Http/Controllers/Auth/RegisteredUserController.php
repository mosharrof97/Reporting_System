<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\District;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

     public function index()
     {
       //
     }


    public function employeeList()
    {
         $emplo = User::where('role', '2')->withCount('submit_reports')->orderBy('id', 'ASC') ->paginate(15);
         $district = District::get();
        
        return view('adminDashboard.page.employee_List', compact(['emplo','district']));
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'max:15', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'district' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ], [
            'image.required' => 'Please upload an image.',
        ]);
       
        if ($request->hasFile('image')) {
        $imageName = 'User_' . time() . '_' . mt_rand(100000, 20000000) . '.' . $request->file('image')->extension();

        //  dd($imageName);
        $request->file('image')->move(public_path('upload/UserImage'), $imageName);

        // $request->file('image')->move(storage_path('app/public/UserImage'), $imageName);
        }
// F:\Laravel Project\Reporting_System\public\upload\UserImage
        // dd($request);
        
        $user = User::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'role' => '2',
            'district_id' => $request->district,
            'image' => $imageName ?? 'No Image',
            'password' => Hash::make($request->password),
        ]);

        return back();
    }
}
