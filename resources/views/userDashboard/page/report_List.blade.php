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
                                    <th class="text-nowrap"> SL </th>
                                    <th class="text-nowrap">Date</th>
                                    <th class="text-nowrap">School Name</th>
                                    <th class="text-nowrap"> EIIN </th>
                                    <th class="text-nowrap">Head Teacher</th>
                                    <th class="text-nowrap">Mobile No</th>
                                    <th class="text-nowrap">District</th>
                                    <th class="text-nowrap"> Upazila</th>
                                    <th class="text-nowrap">Visit Count</th>
                                    <th class="text-nowrap">Comment</th>
                                    <th class="text-nowrap">TA Bill Sell</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submitReport as $datas)
                                    <tr>
                                        <td class="text-nowrap">{{ $datas->id }}</td>
                                        <td class="text-nowrap">{{ $datas->created_at->format('d-m-Y') }}</td>
                                        <td class="text-nowrap">{{ $datas->school_name }}</td>
                                        <td class="text-nowrap">{{ $datas->eiin_number }}</td>
                                        <td class="text-nowrap">{{ $datas->h_teacher_name }}</td>
                                        <td class="text-nowrap">{{ $datas->number }}</td>
                                        <td class="text-nowrap">{{ $datas->district->name }}</td>
                                        <td class="text-nowrap">{{ $datas->upazila->name }}</td>
                                        <td class="text-nowrap">{{ $datas->count() }}</td>
                                        <td class="text-nowrap">{{ $datas->school_comment }}</td>
                                        <td class="text-nowrap">{{ $datas->t_a_bill }}</td>
                                        <td class="text-nowrap">{{ $datas->visit_status }}</td>
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
@endsection
