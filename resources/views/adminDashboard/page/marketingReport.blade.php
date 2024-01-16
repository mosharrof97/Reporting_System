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
                                        <td class="text-nowrap">{{ $datas->created_at }}</td>
                                        <td>{{ $datas->school_name }}</td>
                                        <td class="text-nowrap">{{ $datas->eiin_number }}</td>
                                        <td class="text-nowrap">{{ $datas->h_teacher_name }}</td>
                                        <td class="text-nowrap">{{ $datas->number }}</td>
                                        <td class="text-nowrap">{{ $datas->district }}</td>
                                        <td class="text-nowrap">{{ $datas->upazila }}</td>
                                        <td class="text-nowrap">{{ $datas->count() }}</td>
                                        <td class="text-nowrap">{{ $datas->school_comment }}</td>
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
@endsection
