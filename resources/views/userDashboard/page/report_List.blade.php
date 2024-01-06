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
                                    <th scope="col"> SL </th>
                                    <th scope="col">Date</th>
                                    <th scope="col">School Name</th>
                                    <th scope="col"> EIIN </th>
                                    <th scope="col">Head Teacher</th>
                                    <th scope="col">Mobile No</th>
                                    <th scope="col">District</th>
                                    <th scope="col"> Upazila</th>
                                    <th scope="col">Visit Count</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">TA Bill Sell</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">DMO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submitReport as $datas)
                                    <tr>
                                        <td>{{ $datas->id}}</td>
                                        <td>{{ $datas->created_at}}</td>
                                        <td>{{ $datas->school_name}}</td>
                                        <td>{{ $datas->eiin_number}}</td>
                                        <td>{{ $datas->h_teacher_name}}</td>
                                        <td>{{ $datas->number}}</td>
                                        <td>{{ $datas->district}}</td>
                                        <td>{{ $datas->upazila}}</td>
                                        <td>{{ $datas->upazila}}</td>
                                        <td>{{ $datas->school_comment}}</td>
                                        <td>{{ $datas->t_a_bill}}</td>
                                        <td>{{ $datas->visit_status}}</td>
                                        <td>{{ $datas->visit_status}}</td>
                                        
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
