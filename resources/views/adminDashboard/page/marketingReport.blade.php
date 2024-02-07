@extends('adminDashboard.layout.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Totel Marketing Report: ({{ $totalReport->count() }})</h4>

                    <div class="d-flex justify-content-end">

                        <div class="d-flex align-items-center justify-content-end mr-1 ">

                            <label class="form-label mr-1 mb-0">From:</label>
                            <input type="date" class="form-control bg-light" id="end_date" placeholder="Select Date To">
                        </div>

                        <div class="d-flex align-items-center justify-content-end mr-1 ">
                            <label class="form-label mr-1 mb-0">To:</label>
                            <input type="date" class="form-control bg-light" id="start_date"
                                placeholder="Select Date From">
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

                        <div class="mr-1 ">
                            <input class="form-control bg-light" list="positiveOptions" id="positiveDataList"
                                placeholder="Select Visit Status">
                            <datalist id="positiveOptions">
                                <option value="Positive">
                                <option value="Negative">
                                <option value="Confirmed">
                            </datalist>
                        </div>

                        {{-- <div class="ml-1">
                            <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                                placeholder="Select Sold List">
                            <datalist id="datalistOptions">
                                <option value="2020">
                                <option value="2021">
                                <option value="2022">
                                <option value="2023">
                                <option value="2024">
                            </datalist>
                        </div> --}}

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table primary-table  table-bordered table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    {{-- <th class="text-nowrap" scope="col"> SL </th> --}}
                                    <th class="text-nowrap" scope="col">Date</th>
                                    <th class="text-nowrap" scope="col">Time</th>
                                    <th class="text-nowrap" scope="col">DMO</th>
                                    <th class="text-nowrap" scope="col">School Name</th>
                                    <th class="text-nowrap" scope="col"> EIIN </th>
                                    <th class="text-nowrap" scope="col">Head Teacher</th>
                                    <th class="text-nowrap" scope="col">Mobile No</th>
                                    <th class="text-nowrap" scope="col">District</th>
                                    <th class="text-nowrap" scope="col"> Upazila</th>
                                    <th class="text-nowrap" scope="col">Visit Count</th>
                                    <th class="text-nowrap" scope="col">Comment</th>
                                    <th class="text-nowrap" scope="col">TA Bill Sell</th>
                                    <th class="text-nowrap" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="reporting_list">
                                @foreach ($marketingReport as $datas)
                                    <tr>
                                        {{-- <td class="text-nowrap">{{ $datas->id }}</td> --}}
                                        <td class="text-nowrap">{{ $datas->updated_at->format('d-M-Y') }}</td>
                                        <td class="text-nowrap">{{ $datas->updated_at->format('g:i A') }}</td>
                                        <td class="text-nowrap">{{ $datas->user->name }}</td>
                                        <td class="text-nowrap">{{ $datas->school_name }}</td>
                                        <td class="text-nowrap">{{ $datas->eiin_number }}</td>
                                        <td class="text-nowrap">{{ $datas->h_teacher_name }}</td>
                                        <td class="text-nowrap">{{ $datas->number }}</td>
                                        <td class="text-nowrap">{{ $datas->district->name }}</td>
                                        <td class="text-nowrap">{{ $datas->upazila->name }}</td>
                                        <td class="text-nowrap text-center dataDetails" name ='' id =""
                                            data-bs-toggle="modal" data-bs-target="#dateModal"
                                            data-report_id="{{ $datas->id }}">
                                            {{ $datas->visit_count }}
                                            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                        </td>
                                        <td class="text-nowrap  text-center comment" data-bs-toggle="modal"
                                            data-bs-target="#commentModal" data-report_id="{{ $datas->id }}">
                                            {{ $datas->school_comment }}
                                            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                        </td>
                                        <td class="text-nowrap  text-center ta_bill" data-bs-toggle="modal"
                                            data-bs-target="#ta_bill_Modal" data-report_id="{{ $datas->id }}">
                                            {{ $datas->t_a_bill }}
                                            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                        </td>
                                        <td class="text-nowrap">{{ $datas->visit_status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $marketingReport->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Date Model --}}

    <div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="dateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="dateModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody id="report-date">

                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Date Modal --}}

    {{-- Comment Model --}}

    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="commentModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody id="report-comment">

                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Comment Model --}}

    {{-- TA Bill Model --}}

    <div class="modal fade" id="ta_bill_Modal" tabindex="-1" aria-labelledby="ta_bill_ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ta_bill_ModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>TA Bill</th>
                            </tr>
                        </thead>
                        <tbody id="report-ta_bill">

                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- TA Bill Model --}}



    <script type="text/javascript">
        //========== Data Model ===========//
        $(document).on('click', '.dataDetails', function() {
            var reportId = $(this).data('report_id');

            if (reportId) {
                $.ajax({
                    url: "{{ route('report_details') }}",
                    type: "GET",
                    data: {
                        'report_id': reportId
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            let report = data['report'];

                            $('#report-date').find("tr").remove();
                            $.each(report, function(index, element) {
                                $('#report-date').append(
                                    `<tr>
                                        <td>${index+1}</td>
                                        <td>${new Date(element.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                    </tr>`
                                );
                            });
                        } else {
                            console.error('Invalid data format or missing report data.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request failed:', error);
                    }
                });
            } else {
                $('#report-date').empty();
            }
        });
        //========== Data Model ===========//

        //========== Comment Model ===========//
        $(document).on('click', '.comment', function() {
            var reportId = $(this).data('report_id');

            if (reportId) {
                $.ajax({
                    url: "{{ route('report_details') }}",
                    type: "GET",
                    data: {
                        'report_id': reportId
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        if (data) {
                            let report = data['report'];

                            $('#report-comment').find("tr").remove();
                            $.each(report, function(index, element) {
                                $('#report-comment').append(
                                    `<tr>
                                        <td>${index+1}</td>
                                        <td>${new Date(element.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                        <td>${element.comment}</td>
                                    </tr>`
                                );
                            });
                        } else {
                            console.error('Invalid data format or missing report data.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request failed:', error);
                    }
                });
            } else {
                $('#report-date').empty();
            }
        });
        //========== Comment Model ===========//


        //========== TA Bill Model ===========//
        $(document).on('click', '.ta_bill', function() {
            var reportId = $(this).data('report_id');

            if (reportId) {
                $.ajax({
                    url: "{{ route('report_details') }}",
                    type: "GET",
                    data: {
                        'report_id': reportId
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        if (data) {
                            let report = data['report'];

                            $('#report-ta_bill').find("tr").remove();
                            $.each(report, function(index, element) {
                                $('#report-ta_bill').append(
                                    `<tr>
                                        <td>${index+1}</td>
                                        <td>${new Date(element.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                        <td>${element.t_a_bill}</td>
                                    </tr>`
                                );
                            });
                        } else {
                            console.error('Invalid data format or missing report data.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request failed:', error);
                    }
                });
            } else {
                $('#report-ta_bill').empty();
            }
        });
        //========== TA Bill  Model ===========//


        //========== DMO Search ===========//
        $(document).on('change', '#dmoDataList', function() {
            var dmo_name = $(this).val();
            $.ajax({
                url: "{{ route('marketing_Report') }}",
                type: "GET",
                data: {
                    'name': dmo_name
                },
                dataType: "json",
                success: function(data) {
                    if (data.dmoDatas.length > 0) {
                        let report = data['dmoDatas'];

                        $('#reporting_list').find("tr").remove();
                        $.each(report, function(index, element) {
                            $('#reporting_list').append(
                                `<tr>
                                            <td class="text-nowrap">${ index+1 }</td>
                                            <td class="text-nowrap">${new Date(element.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                            <td class="text-nowrap">${new Date(element.updated_at).toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}</td>
                                            <td class="text-nowrap">${ element.user.name }</td>
                                            <td class="text-nowrap">${ element.school_name }</td>
                                            <td class="text-nowrap">${ element.eiin_number }</td>
                                            <td class="text-nowrap">${ element.h_teacher_name }</td>
                                            <td class="text-nowrap">${ element.number }</td>
                                            <td class="text-nowrap">${ element.district.name }</td>
                                            <td class="text-nowrap">${ element.upazila.name }</td>
                                            <td class="text-nowrap text-center dataDetails" name ='' id =""
                                                data-bs-toggle="modal" data-bs-target="#dateModal"
                                                data-report_id="${ element.id }">
                                                ${ element.visit_count }
                                                <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                            </td>
                                            <td class="text-nowrap  text-center comment" data-bs-toggle="modal"
                                                data-bs-target="#commentModal" data-report_id="${ element.id }">
                                                ${ element.school_comment }
                                                <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                            </td>
                                            <td class="text-nowrap  text-center comment" data-bs-toggle="modal"
                                                data-bs-target="#ta_bill_Modal" data-report_id="${ element.id }">
                                                ${ element.t_a_bill }
                                                <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                            </td>
                                            <td class="text-nowrap">${ element.visit_status }</td>
                           
                                        </tr>`
                            );
                        });
                    } else {
                        $('#reporting_list').find("tr").remove();
                        $('#reporting_list').append(
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

            $('#dmoDataList').val('');
            $('#pagination').html('')
        });
        //========== DMO Search ===========//

        //========== Date Search ===========//

        $(document).on('change', '#start_date', '#end_date', function() {
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            console.log(start_date);
            $.ajax({
                url: "{{ route('marketing_Report') }}",
                type: "GET",
                data: {
                    'start_date': start_date,
                    'end_date': end_date,
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.date_Datas.length > 0) {
                        let report = data['date_Datas'];
                        $('#reporting_list').find("tr").remove();
                        $.each(report, function(index, element) {
                            $('#reporting_list').append(
                                `<tr>
                                    <td class="text-nowrap">${ index+1 }</td>
                                    <td class="text-nowrap">${new Date(element.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                    <td class="text-nowrap">${new Date(element.updated_at).toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}</td>
                                    <td class="text-nowrap">${ element.user.name }</td>
                                    <td class="text-nowrap">${ element.school_name }</td>
                                    <td class="text-nowrap">${ element.eiin_number }</td>
                                    <td class="text-nowrap">${ element.h_teacher_name }</td>
                                    <td class="text-nowrap">${ element.number }</td>
                                    <td class="text-nowrap">${ element.district.name }</td>
                                    <td class="text-nowrap">${ element.upazila.name }</td>
                                    <td class="text-nowrap text-center dataDetails" name ='' id =""
                                        data-bs-toggle="modal" data-bs-target="#dateModal"
                                        data-report_id="${ element.id }">
                                        ${ element.visit_count }
                                        <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </td>
                                    <td class="text-nowrap  text-center comment" data-bs-toggle="modal"
                                        data-bs-target="#commentModal" data-report_id="${ element.id }">
                                        ${ element.school_comment }
                                        <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </td>
                                    <td class="text-nowrap  text-center comment" data-bs-toggle="modal"
                                        data-bs-target="#ta_bill_Modal" data-report_id="${ element.id }">
                                        ${ element.t_a_bill }
                                        <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </td>
                                    <td class="text-nowrap">${ element.visit_status }</td>
                                </tr>`
                            );
                        });
                    } else {
                        $('#reporting_list').find("tr").remove();
                        $('#reporting_list').append(
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

        //========== Positive Search ===========//
        $(document).on('change', '#positiveDataList', function() {
            var visit_status = $(this).val();
            $.ajax({
                url: "{{ route('marketing_Report') }}",
                type: "GET",
                data: {
                    'visit_status': visit_status
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    if (data.visit_status.length > 0) {
                        let report = data['visit_status'];
                        // console.log(report);

                        $('#reporting_list').find("tr").remove();
                        $.each(report, function(index, element) {
                            $('#reporting_list').append(
                                `<tr>
                                    <td class="text-nowrap">${ index+1 }</td>
                                    <td class="text-nowrap">${new Date(element.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                    <td class="text-nowrap">${new Date(element.updated_at).toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}</td>
                                    <td class="text-nowrap">${ element.user.name }</td>
                                    <td class="text-nowrap">${ element.school_name }</td>
                                    <td class="text-nowrap">${ element.eiin_number }</td>
                                    <td class="text-nowrap">${ element.h_teacher_name }</td>
                                    <td class="text-nowrap">${ element.number }</td>
                                    <td class="text-nowrap">${ element.district.name }</td>
                                    <td class="text-nowrap">${ element.upazila.name }</td>
                                    <td class="text-nowrap text-center dataDetails" name ='' id =""
                                        data-bs-toggle="modal" data-bs-target="#dateModal"
                                        data-report_id="${ element.id }">
                                        ${ element.visit_count }
                                        <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </td>
                                    <td class="text-nowrap  text-center comment" data-bs-toggle="modal"
                                        data-bs-target="#commentModal" data-report_id="${ element.id }">
                                        ${ element.school_comment }
                                        <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </td>
                                    <td class="text-nowrap  text-center comment" data-bs-toggle="modal"
                                        data-bs-target="#ta_bill_Modal" data-report_id="${ element.id }">
                                        ${ element.t_a_bill }
                                        <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </td>
                                    <td class="text-nowrap">${ element.visit_status }</td>
                                </tr>`
                            );
                        });
                    } else {
                        $('#reporting_list').find("tr").remove();
                        $('#reporting_list').append(
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

            $('#positiveDataList').val('');
            $('#pagination').html('')

        });
        //========== Positive Search ===========//
    </script>
@endsection
