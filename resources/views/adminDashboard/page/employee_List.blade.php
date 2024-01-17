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
                    <h4 class="card-title">Employee List</h4>
                    <form action="{{ route('employee_filter') }}" method="get" class="d-flex align-items-center">
                        {{-- @csrf --}}
                        <div class="me-2">
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="me-2">
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <div class="me-5">
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Create Employee</button>
                        </div>
                    </form>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table primary-table  table-bordered table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    <th class="text-nowrap" scope="col">ID </th>
                                    <th class="text-nowrap" scope="col">Photo</th>
                                    <th class="text-nowrap" scope="col">Join Date</th>
                                    <th class="text-nowrap" scope="col">Employee Name</th>
                                    <th class="text-nowrap" scope="col">Mobile</th>
                                    <th class="text-nowrap" scope="col">Email ID</th>
                                    <th class="text-nowrap" scope="col">District</th>
                                    <th class="text-nowrap" scope="col">Total Visit</th>
                                    <th class="text-nowrap" scope="col">Total T A</th>
                                    <th class="text-nowrap" scope="col">Total T A Payable</th>
                                    <th class="text-nowrap" scope="col">T.A Paid</th>
                                    <th class="text-nowrap" scope="col">T.A Dues</th>
                                    <th class="text-nowrap" scope="col">Total Sell</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emplo as $data)
                                    <tr>
                                        <td class="text-nowrap">{{ $data->id + 1000 }}</td>
                                        <td class="text-nowrap">
                                            <img src="{{ asset('upload/UserImage/' . $data->image) }}" alt=""
                                                width="55" height="50">
                                        </td>
                                        <td class="text-nowrap">{{ $data->created_at->format('d-M-Y') }}</td>
                                        <td class="text-nowrap">{{ $data->name }}</td>
                                        <td class="text-nowrap">{{ $data->number }}</td>
                                        <td class="text-nowrap">{{ $data->email }}</td>
                                        <td class="text-nowrap">{{ $data->district->name }}</td>
                                        <td class="text-nowrap">{{ $data->submit_reports_count }}</td>
                                        <td class="text-nowrap">0.00</td>
                                        <td class="text-nowrap">0.00</td>
                                        <td class="text-nowrap">0.00</td>
                                        <td class="text-nowrap">0.00</td>
                                        <td class="text-nowrap">{{ $data->soldCount() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Add Employee Modal --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header px-5 pt-4">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 pb-3">

                    <form action="{{ route('registered') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="name"
                                placeholder="Employee Name">
                            @error('name')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="number"
                                placeholder="Mobile Number">

                            @error('number')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="" name="email"
                                placeholder="Email Address">

                            @error('email')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="" name="password"
                                placeholder="Set Password ">

                            @error('password')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="" name="password_confirmation"
                                placeholder="Set Confirmation Password  ">

                            @error('password_confirmation')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{-- <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                                name="district" placeholder="Select District">
                            <datalist id="datalistOptions">
                                @foreach ($district as $data)
                                    <option value="{{Jan}}"></option>
                                @endforeach
                            </datalist> --}}
                            <select class="form-control" name="district" id="">
                                <option value="">Select District</option>
                                @foreach ($district as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>

                            @error('district')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="file" class="form-control" id="" name="image"
                                placeholder="Upload Photo">

                            @error('image')
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
@endsection
