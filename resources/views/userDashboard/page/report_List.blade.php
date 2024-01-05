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
                                @foreach ($submitReport as $data)
                                    <tr>
                                        <td>1</td>
                                        <td>13 Jan 23</td>
                                        <td>Abdul Galif High School</td>
                                        <td>979799</td>
                                        <td>Abdul Khalil</td>
                                        <td>01301393735</td>
                                        <td>Jhenaid ah</td>
                                        <td>Shailku pa</td>
                                        <td>3</td>
                                        <td>Negative</td>
                                        <td>60.00</td>
                                        <td></td>
                                        <td>Md Shahidul</td>
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
