@extends('userDashboard.layout.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">Appointment List</h4>
                    <div>
                        @if (Session::has('success'))
                            <p class="text-success">{{ Session::get('success') }}</p>
                        @endif

                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">+ Create Appointment</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table primary-table  table-bordered table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    <<th class="text-nowrap"> SL </th>
                                        <th class="text-nowrap"> Create date </th>
                                        <th class="text-nowrap">School Name</th>
                                        <th class="text-nowrap"> EIIN </th>
                                        <th class="text-nowrap">Head Teacher</th>
                                        <th class="text-nowrap">Mobile No</th>
                                        <th class="text-nowrap">District</th>
                                        <th class="text-nowrap"> Upazila</th>
                                        <th class="text-nowrap">schedule Date</th>
                                        <th class="text-nowrap">Comment</th>
                                        <th class="text-nowrap">DMO Name</th>
                                        <th class="text-nowrap">View</th>
                            </thead>
                            <tbody>
                                @foreach ($schedule as $datas)
                                    <tr>
                                        <td class="text-nowrap">{{ $datas->id }}</td>
                                        <td class="text-nowrap">{{ $datas->created_at->format('d-M-Y') }}</td>
                                        <td class="text-nowrap">{{ $datas->school_name }}</td>
                                        <td class="text-nowrap">{{ $datas->eiin_number }}</td>
                                        <td class="text-nowrap">{{ $datas->h_teacher_name }}</td>
                                        <td class="text-nowrap">{{ $datas->number }}</td>
                                        <td class="text-nowrap">{{ $datas->district->name }}</td>
                                        <td class="text-nowrap">{{ $datas->upazila->name }}</td>
                                        <td class="text-nowrap">{{ $datas->date }}</td>
                                        <td class="text-nowrap">{{ $datas->schedule_comment }}</td>
                                        <td class="text-nowrap">{{ $datas->user->name }}</td>
                                        <td class="text-nowrap">
                                            {{-- <a href="{{ route('view_Report') . $datas->id }}"
                                                class="btn btn-light">View</a> --}}
                                            <a href="#" class="btn btn-light">View</a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Add Schedule Modal --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header px-5 pt-4">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Appointmen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 pb-3">

                    <form action="{{ route('Submit_schedule') }}" method="post" enctype="multipart/form-data">
                        @csrf

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
                            <input type="text" class="form-control" id="" name="schedule_comment"
                                placeholder="Type Schedule Comment ">

                            @error('schedule_comment')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="date" class="form-control" id="" name="date"
                                placeholder="Select Date ">

                            @error('date')
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
                        // console.log(schoolName);
                        $('#school_name').val(schoolName.school_name);
                        $('#h_teacher_name').val(schoolName.h_teacher_name);
                        $('#number').val(schoolName.number);
                        $('#eiin_number').val(schoolName.eiin_number);
                        $('#school_comment').val(schoolName.school_comment);
                    }
                });
            });
        });
    </script>
@endsection
