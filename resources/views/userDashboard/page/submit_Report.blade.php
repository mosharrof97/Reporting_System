@extends('userDashboard.layout.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">Submit Report</h4>
                </div>

                <div class="card-body">
                    <div>
                    
                        @if (Session::has('success'))
                            <p class="text-success">{{ Session::get('success') }}</p>
                        @endif
    
                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                    </div>

                    <form action="{{ route('Report_submited') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="previous_school"
                                placeholder="Select Previous School">
                            
                            @error('previous_school')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="school_name"
                                placeholder="School Name ">
                            
                            @error('school_name')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="h_teacher_name"
                                placeholder="Head Teacher Name ">

                            @error('h_teacher_name')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="number"
                                placeholder="Mobile Number">
                            
                            @error('number')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="eiin_number"
                                placeholder="EIIN Number ">

                            @error('eiin_number')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="district"
                                placeholder="Select District ">

                            @error('district')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="upazila"
                                placeholder="Select Upazila">

                            @error('upazila')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select class="form-control" name="visit_status" id="">
                                <option value="">Select Visit Status</option>
                                <option value="Negative">Negative</option>
                                <option value="Positive">Positive</option>
                                <option value="Confirmed ">Confirmed </option>
                            </select>

                            @error('visit_status')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror


                            {{-- <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                                placeholder="Select District">
                            <datalist id="datalistOptions">
                                <option value="Jan">
                                <option value="Feb">
                                <option value="March">
                                <option value="April">
                                <option value="May">
                            </datalist> --}}
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="school_comment"
                                placeholder="Type School Comment ">
                            
                            @error('school_comment')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="file" class="form-control" id="" name="image"
                                placeholder="Upload Photo">

                            @error('image')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="t_a_bill"
                                placeholder="T. A Bill (tk)">

                            @error('t_a_bill')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-end">
                            <input type="submit" class="btn btn-primary" value="Submit form">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
