@extends('userDashboard.layout.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">Submit Report</h4>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="previous_school"
                                placeholder="Select Previous School">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="school_name"
                                placeholder="School Name ">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="h_teacher_name "
                                placeholder="Head Teacher Name ">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="number"
                                placeholder="Mobile Number">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="eiin_number "
                                placeholder="EIIN Number ">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="district "
                                placeholder="Select District ">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="upazila "
                                placeholder="Select Upazila">
                        </div>

                        <div class="mb-3">
                            <select class="form-control" name="visit_status" id="">
                                <option value="">Select Visit Status</option>
                                <option value="Negative">Negative</option>
                                <option value="Positive">Positive</option>
                                <option value="Confirmed ">Confirmed </option>
                            </select>

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
                            <input type="text" class="form-control" id="" name="school_omment  "
                                placeholder="Type School Comment ">
                        </div>

                        <div class="mb-3">
                            <input type="file" class="form-control" id="" name="image"
                                placeholder="Upload Photo">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="t_a_bill"
                                placeholder="T. A Bill (tk)">
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
