@extends('userDashboard.layout.layout')

@section('content')

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Marketing Report</h4>
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
                                </tr>
                            </thead>
                            <tbody> 
                                    <tr>
                                        <td class="text-nowrap" >{{ $submitReport->id }}</td>
                                        <td class="text-nowrap" >{{ $submitReport->created_at }}</td>
                                        <td class="text-nowrap" >{{ $submitReport->school_name }}</td>
                                        <td class="text-nowrap">{{ $submitReport->eiin_number }}</td>
                                        <td class="text-nowrap">{{ $submitReport->h_teacher_name }}</td>
                                        <td class="text-nowrap" >{{ $submitReport->number }}</td>
                                        <td class="text-nowrap">{{ $submitReport->district }}</td>
                                        <td class="text-nowrap" >{{ $submitReport->upazila }}</td>
                                        <td class="text-nowrap" >{{ $submitReport->count() }}</td>
                                        <td class="text-nowrap" >{{ $submitReport->school_comment }}</td>
                                        <td class="text-nowrap" >{{ $submitReport->t_a_bill }}</td>
                                        <td class="text-nowrap" >{{ $submitReport->visit_status }}</td>
                                        
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