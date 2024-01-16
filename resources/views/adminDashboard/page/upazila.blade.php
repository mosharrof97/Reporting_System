@extends('adminDashboard.layout.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">Submit Report</h4>
                </div>

                <div class="card-body">
                    <div>

                        @if (Session::has('success'))
                            <p class="text-success">{{ Session::get('success') }}</p>
                        @endif

                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                    </div>

                    <form action="{{ route('storeUpazila') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control" name="district_id" id="">
                                <option value="">Select District</option>
                                @foreach ($district as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>

                            @error('district_id')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="name"
                                placeholder="Upazila Name ">

                            @error('name')
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
