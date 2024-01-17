@extends('adminDashboard.layout.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Marketing Report</h4>
                    <div class="d-flex justify-content-end">

                        <div class="mr-1 ">
                            <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                                placeholder="Select Month">
                            <datalist id="datalistOptions">
                                <option value="Jan">
                                <option value="Feb">
                                <option value="March">
                                <option value="April">
                                <option value="May">
                            </datalist>
                        </div>

                        <div class="mr-1 ">
                            <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                                placeholder="Select DMO">
                            <datalist id="datalistOptions">
                                <option value="Jan">
                                <option value="Feb">
                                <option value="March">
                                <option value="April">
                                <option value="May">
                            </datalist>
                        </div>

                        <div class="mr-1 ">
                            <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                                placeholder="Select Positive">
                            <datalist id="datalistOptions">
                                <option value="Jan">
                                <option value="Feb">
                                <option value="March">
                                <option value="April">
                                <option value="May">
                            </datalist>
                        </div>

                        <div class="ml-1">
                            <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                                placeholder="Select Sold List">
                            <datalist id="datalistOptions">
                                <option value="2020">
                                <option value="2021">
                                <option value="2022">
                                <option value="2023">
                                <option value="2024">
                            </datalist>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table primary-table  table-bordered table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    <th class="text-nowrap" scope="col"> SL </th>
                                    <th class="text-nowrap" scope="col">Date</th>
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
                                    <th class="text-nowrap" scope="col">DMO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marketingReport as $datas)
                                    <tr>
                                        <td class="text-nowrap">{{ $datas->id }}</td>
                                        <td class="text-nowrap">{{ $datas->created_at->format('d-M-Y') }}</td>
                                        <td>{{ $datas->school_name }}</td>
                                        <td class="text-nowrap">{{ $datas->eiin_number }}</td>
                                        <td class="text-nowrap">{{ $datas->h_teacher_name }}</td>
                                        <td class="text-nowrap">{{ $datas->number }}</td>
                                        <td class="text-nowrap">{{ $datas->district->name }}</td>
                                        <td class="text-nowrap">{{ $datas->upazila->name }}</td>
                                        <td class="text-nowrap text-center dataDetails" id =""
                                            data-bs-toggle="modal" data-bs-target="#dateModal"
                                            data-report_id="{{ $datas->id }}">
                                            {{ $datas->visit_count }}
                                            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                        </td>
                                        <td class="text-nowrap  text-center" data-bs-toggle="modal"
                                            data-bs-target="#commentModal">
                                            {{ $datas->school_comment }}
                                            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                        </td>
                                        <td class="text-nowrap">{{ $datas->t_a_bill }}</td>
                                        <td class="text-nowrap">{{ $datas->visit_status }}</td>
                                        <td class="text-nowrap">{{ $datas->user->name }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>10/12/23</td>
                                <td>good</td>
                            </tr>
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $(document).on('click', '.dataDetails', function() {
            var reportId = $(this).data('report_id');
            // alert(reportId);

            if (reportId) {
                $.ajax({
                    url: '{{ route('report_details') }}',
                    type: "GET",
                    data: {
                        report_id: reportId
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            let report = data['report'];

                            $('#report-date').find("tr").remove();
                            $.each(report, function(index, element) {
                                $('#report-date').append(
                                    `<tr>
                                        <td>${element.id}</td>
                                        <td>${new Date(element.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</td>
                                    </tr>`
                                );
                            });
                        } else {
                            console.error('Invalid data format or missing report data.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX request failed:', error);
                    }
                });
            } else {
                $('#report-date').empty();
            }
        });
    </script>
@endsection
{{-- // $("document").on('click', '.dataDetails', function() {
        //     var reportId = $(this).data('report_id');
        //     alert(reportId);
        //     if (reportId) {
        //         $.ajax({
        //             url: '{{ route('report_details') }}',
        //             type: "get",
        //             data: {
        //                 report_id: reportId
        //             },
        //             dataType: "json",
        //             success: function(data) {
        //                 let report = data['report'];
        //                 console.log(report);

        //                 $('#report-date').find("td").remove();
        //                 $.each(report, function(index, element) {
        //                     $('#report-date').append(
        //                         `<tr>
    //                                 <td>${element.id}</td>
    //                                 <td>${element.created_at->format('d-M-Y')}</td>
    //                             </tr>`
        //                     );
        //                 })
        //             }
        //         })
        //     } else {
        //         $('#report-date').empty();
        //     }
        // });
        //     .ready(function() {
        //     $('.dataDetails')
        // }) --}}
