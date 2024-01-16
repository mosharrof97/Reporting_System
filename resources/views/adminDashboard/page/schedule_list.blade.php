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
                            <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                                placeholder="Select Date From">
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
                                placeholder="Select Date To">
                            <datalist id="datalistOptions">
                                <option value="Jan">
                                <option value="Feb">
                                <option value="March">
                                <option value="April">
                                <option value="May">
                            </datalist>
                        </div>

                        <div class="mr-1 ">
                            <input class="form-control " style="background-color: rgb(156, 77, 48)" list="datalistOptions"
                                id="exampleDataList" placeholder="Select DMO">
                            <datalist id="datalistOptions">
                                <option value="Jan">
                                <option value="Feb">
                                <option value="March">
                                <option value="April">
                                <option value="May">
                            </datalist>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table primary-table  table-bordered table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    <th class="text-nowrap"> SL </th>
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
                                </tr>
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
@endsection
