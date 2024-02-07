@extends('adminDashboard.layout.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div>
                    @if (Session::has('success'))
                        <p class="text-success">{{ Session::get('success') }}</p>
                    @endif

                    @if (Session::has('error'))
                        <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>

                <div class="card-header">
                    <h4 class="card-title">Appointment List</h4>
                    <div class="d-flex justify-content-end">

                        <div class="mr-1 ">
                            <input type="date" class="form-control bg-light" id="start_date"
                                placeholder="Select Date From">
                        </div>

                        <div class="mr-1 ">
                            <input type="date" class="form-control bg-light" id="end_date" placeholder="Select Date To">
                        </div>

                        <div class="mr-1 ">
                            <input class="form-control bg-light" list="dmoOptions" id="dmoDataList"
                                placeholder="Select DMO">
                            <datalist id="dmoOptions">
                                @foreach ($user as $data)
                                    <option value="{{ $data->name }}">
                                @endforeach
                            </datalist>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div id="filter_name"></div>
                    <div class="table-responsive">
                        <table class="table primary-table  table-bordered table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    <th class="text-nowrap"> SL </th>
                                    <th class="text-nowrap"> Create date </th>
                                    <th class="text-nowrap">DMO Name</th>
                                    <th class="text-nowrap">School Name</th>
                                    <th class="text-nowrap"> EIIN </th>
                                    <th class="text-nowrap">Head Teacher</th>
                                    <th class="text-nowrap">Mobile No</th>
                                    <th class="text-nowrap">District</th>
                                    <th class="text-nowrap"> Upazila</th>
                                    <th class="text-nowrap">Appointment Date</th>
                                    <th class="text-nowrap">Comment</th>
                                    <th class="text-nowrap">View</th>
                                </tr>
                            </thead>
                            <tbody id="appointmen_list">
                                @foreach ($schedule as $datas)
                                    <tr>
                                        <td class="text-nowrap">{{ $datas->id }}</td>
                                        <td class="text-nowrap">{{ $datas->created_at->format('d-M-Y') }}</td>
                                        <td class="text-nowrap">{{ $datas->user->name }}</td>
                                        <td class="text-nowrap">{{ $datas->school_name }}</td>
                                        <td class="text-nowrap">{{ $datas->eiin_number }}</td>
                                        <td class="text-nowrap">{{ $datas->h_teacher_name }}</td>
                                        <td class="text-nowrap">{{ $datas->number }}</td>
                                        <td class="text-nowrap">{{ $datas->district->name }}</td>
                                        <td class="text-nowrap">{{ $datas->upazila->name }}</td>
                                        <td class="text-nowrap">{{ $datas->date }}</td>
                                        <td class="text-nowrap">{{ $datas->schedule_comment }}</td>
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

    <script>
        //========== DMO Search ===========//
        $(document).on('change', '#dmoDataList', function() {
            var dmo_name = $(this).val();
            $.ajax({
                url: "{{ route('schedule_list') }}",
                type: "GET",
                data: {
                    'name': dmo_name
                },
                dataType: "json",
                success: function(data) {
                    if (data.dmoDatas.length > 0) {
                        let report = data['dmoDatas'];

                        $('#appointmen_list').find("tr").remove();
                        $.each(report, function(index, element) {
                            $('#appointmen_list').append(
                                `<tr>
                                <td class="text-nowrap">${ index+1 }</td>
                                <td class="text-nowrap">${new Date(element.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                <td class="text-nowrap">${ element.user.name }</td>
                                <td class="text-nowrap">${ element.school_name }</td>
                                <td class="text-nowrap">${ element.eiin_number }</td>
                                <td class="text-nowrap">${ element.h_teacher_name }</td>
                                <td class="text-nowrap">${ element.number }</td>
                                <td class="text-nowrap">${ element.district.name }</td>
                                <td class="text-nowrap">${ element.upazila.name }</td>
                                <td class="text-nowrap">${ element.date }</td>
                                <td class="text-nowrap">${ element.schedule_comment }</td>
                                <td class="text-nowrap"><a href="#" class="btn btn-light">View</a></td>

                            </tr>`
                            );
                        });
                    } else {
                        $('#appointmen_list').find("tr").remove();
                        $('#appointmen_list').append(
                            `<tr>
                            <td class="text-nowrap" colspan="13">
                                <h2>${"No data Found"}</h2>
                            </td>
                        </tr>`
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX request failed:', error);
                }
            });
            $('#filter_name').html(`<h4>Filter: ${dmo_name}</h4>`);
            $('#dmoDataList').val('');
            $('#pagination').html('')
        });
        //========== DMO Search ===========//

        //========== Date Search ===========//

        $(document).on('change', '#start_date', '#end_date', function() {
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();

            $.ajax({
                url: "{{ route('schedule_list') }}",
                type: "GET",
                data: {
                    'start_date': start_date,
                    'end_date': end_date,
                },
                dataType: "json",
                success: function(data) {
                    if (data.date_Datas.length > 0) {
                        let report = data['date_Datas'];
                        $('#appointmen_list').find("tr").remove();
                        $.each(report, function(index, element) {
                            $('#appointmen_list').append(
                                `<tr>
                                    <td class="text-nowrap">${ index+1 }</td>
                                    <td class="text-nowrap">${new Date(element.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                    <td class="text-nowrap">${ element.user.name }</td>
                                    <td class="text-nowrap">${ element.school_name }</td>
                                    <td class="text-nowrap">${ element.eiin_number }</td>
                                    <td class="text-nowrap">${ element.h_teacher_name }</td>
                                    <td class="text-nowrap">${ element.number }</td>
                                    <td class="text-nowrap">${ element.district.name }</td>
                                    <td class="text-nowrap">${ element.upazila.name }</td>
                                    <td class="text-nowrap">${ element.date }</td>
                                    <td class="text-nowrap">${ element.schedule_comment }</td>
                                    <td class="text-nowrap"><a href="#" class="btn btn-light">View</a></td>
                            </tr>`
                            );
                        });
                    } else {
                        $('#appointmen_list').find("tr").remove();
                        $('#appointmen_list').append(
                            `<tr>
                                        <td class="text-nowrap" colspan="13">
                                            <h2>${"No data Found"}</h2>
                                        </td>
                                    </tr>`
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX request failed:', error);
                }
            });
            // $('#filter_name').html(`<h4>Filter: ${dmo_name}</h4>`);
            $('#pagination').html('')
        });
        //========== Date Search ===========//


        //========== Date & DMO Search ===========//
        // $(document).ready(function() {
        //     // Search by DMO Data List
        //     $(document).on('change', '#dmoDataList', function() {
        //         var dmo_name = $(this).val();
        //         fetchData({
        //             'name': dmo_name
        //         });
        //     });

        //     // Search by Date Range
        //     $(document).on('change', '#start_date, #end_date', function() {
        //         var start_date = $('#start_date').val();
        //         var end_date = $('#end_date').val();
        //         fetchData({
        //             'start_date': start_date,
        //             'end_date': end_date
        //         });
        //     });

        //     // Function to fetch data via AJAX
        //     function fetchData(params) {
        //         $.ajax({
        //             url: "{{ route('schedule_list') }}",
        //             type: "GET",
        //             data: params,
        //             dataType: "json",
        //             success: function(data) {
        //                 if (data.length > 0) {
        //                     let report = data;
        //                     $('#appointmen_list').find("tr").remove();
        //                     $.each(report, function(index, element) {
        //                         $('#appointmen_list').append(
        //                             `<tr>
    //                         <td class="text-nowrap">${ index+1 }</td>
    //                         <td class="text-nowrap">${new Date(element.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
    //                         <td class="text-nowrap">${ element.user.name }</td>
    //                         <td class="text-nowrap">${ element.school_name }</td>
    //                         <td class="text-nowrap">${ element.eiin_number }</td>
    //                         <td class="text-nowrap">${ element.h_teacher_name }</td>
    //                         <td class="text-nowrap">${ element.number }</td>
    //                         <td class="text-nowrap">${ element.district.name }</td>
    //                         <td class="text-nowrap">${ element.upazila.name }</td>
    //                         <td class="text-nowrap">${ element.date }</td>
    //                         <td class="text-nowrap">${ element.schedule_comment }</td>
    //                         <td class="text-nowrap"><a href="#" class="btn btn-light">View</a></td>
    //                     </tr>`
        //                         );
        //                     });
        //                 } else {
        //                     $('#appointmen_list').find("tr").remove();
        //                     $('#appointmen_list').append(
        //                         `<tr>
    //                     <td class="text-nowrap" colspan="13">
    //                         <h2>No data Found</h2>
    //                     </td>
    //                 </tr>`
        //                     );
        //                 }
        //             },
        //             error: function(xhr, status, error) {
        //                 console.log('AJAX request failed:', error);
        //             }
        //         });
        //         $('#pagination').html('');
        //     }
        // });


        //========== Date & DMO  Search ===========//
    </script>
@endsection
