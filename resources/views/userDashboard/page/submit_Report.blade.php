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

                    <form action="{{ route('Report_submited') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control" name="schedule" id="schedule">
                                <option value="">Select schedule</option>
                                @foreach ($schedule as $data)
                                    <option value="{{ $data->school_name }}">{{ $data->school_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-control" name="previous_school" id="previous_school">
                                <option value="">Select Previous School</option>
                                @foreach ($previousSchool as $data)
                                    <option value="{{ $data->school_name }}">{{ $data->school_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="school_name" name="school_name"
                                placeholder="School Name " value="{{ old('school_name') }}">

                            @error('school_name')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="h_teacher_name" name="h_teacher_name"
                                placeholder="Head Teacher Name ">

                            @error('h_teacher_name')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="number" name="number"
                                placeholder="Mobile Number">

                            @error('number')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="eiin_number" name="eiin_number"
                                placeholder="EIIN Number " value="">

                            @error('eiin_number')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">

                            <select class="form-control" name="district_id" id="district_id">
                                <option value="">Select District</option>
                                @foreach ($district as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>

                            @error('district_id')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select class="form-control" name="upazila_id" id="upazila_id">
                                <option value="">Select Upazila</option>

                            </select>

                            @error('upazila_id')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select class="form-control" name="visit_status" id="visit_status">
                                <option value="">Select Visit Status</option>
                                <option value="Negative">Negative</option>
                                <option value="Positive">Positive</option>
                                <option value="Confirmed ">Confirmed </option>
                            </select>

                            @error('visit_status')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
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
                            <input type="text" class="form-control" id="t_a_bill" name="t_a_bill"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $("document").ready(function() {

            $('#district_id').on('change', function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '{{ route('childOption_guardian') }}',
                        type: "get",
                        data: {
                            district_id: districtId
                        },
                        dataType: "json",
                        success: function(data) {
                            let upazila = data['upazila'];
                            $('#upazila_id').find("option").not(":first").remove();
                            $.each(upazila, function(index, element) {
                                $('#upazila_id').append(
                                    `<option value = "${element.id}">${element.name}</option>`
                                );
                            })
                        }
                    })
                } else {
                    $('#upazila_id').empty();
                }
            });

            // Auto Fill
            $("#previous_school").on('change', function(e) {
                // alert($(this).val());
                var previous_school = $(this).val();
                $.ajax({
                    url: "{{ route('childOption_guardian') }}",
                    type: "GET",
                    data: {
                        'previous_school': previous_school
                    },
                    dataType: 'json',

                    success: function(data) {
                        let schoolName = data['previous_school'];
                        $('#school_name').val(schoolName.school_name);
                        $('#h_teacher_name').val(schoolName.h_teacher_name);
                        $('#number').val(schoolName.number);
                        $('#eiin_number').val(schoolName.eiin_number);
                        // $('#district_id').val(schoolName.district_id);
                        // $('#upazila_id').val(schoolName.upazila_id);
                        $('#visit_status').val(schoolName.visit_status);
                        $('#school_comment').val(schoolName.school_comment);
                        $('#t_a_bill').val(schoolName.t_a_bill);
                    }
                });
            });


            // Auto Fill
            $("#schedule").on('change', function(e) {
                // alert($(this).val());
                var schedule = $(this).val();
                $.ajax({
                    url: "{{ route('childOption_guardian') }}",
                    type: "GET",
                    data: {
                        'schedule': schedule
                    },
                    dataType: 'json',

                    success: function(data) {
                        let schoolName = data['schedule'];
                        $('#school_name').val(schoolName.school_name);
                        $('#h_teacher_name').val(schoolName.h_teacher_name);
                        $('#number').val(schoolName.number);
                        $('#eiin_number').val(schoolName.eiin_number);
                        $('#school_comment').val(schoolName.school_comment);
                    }
                });
            });
        });

        // and so on...

        //     $("#cnic").html(
        //         e
        //     ); //-> I dont realy understand why you use this part of code?
    </script>
@endsection
