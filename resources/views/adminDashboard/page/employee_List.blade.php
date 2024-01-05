@extends('adminDashboard.layout.layout')

@section('content')
    <div class="row"> 
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employee List</h4>
                    <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Create Employee</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table primary-table  table-bordered table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">ID </th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Join Date</th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email ID</th>
                                    <th scope="col">District</th>
                                    <th scope="col">Total Visit</th>
                                    <th scope="col">Total T A</th>
                                    <th scope="col">T.A Paid</th>
                                    <th scope="col">T.A Dues</th>
                                    <th scope="col">Total Sell</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1001</td>
                                    <td></td>
                                    <td>13 Jan 2024</td>
                                    <td>Md Shozib Hossen</td>
                                    <td>0130139373</td>
                                    <td>in@gmailcom</td>
                                    <td>Kustia</td>
                                    <td>100</td>
                                    <td>1600.00</td>
                                    <td>100.00</td>
                                    <td>600.00</td>
                                    <td>10</td>
                                </tr>
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

                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="name"
                                placeholder="Employee Name">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="number"
                                placeholder="Mobile Number">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="" name="email"
                                placeholder="Email Address">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="" name="password"
                                placeholder="Set Password ">
                        </div>

                        <div class="mb-3">
                            <input class="form-control bg-light" list="datalistOptions" id="exampleDataList" name="district"
                                placeholder="Select District">
                            <datalist id="datalistOptions">
                                <option value="Jan">
                                <option value="Feb">
                                <option value="March">
                                <option value="April">
                                <option value="May">
                            </datalist>
                        </div>

                        <div class="mb-3">
                            <input type="file" class="form-control" id="" name="image"
                                placeholder="Upload Photo">
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
