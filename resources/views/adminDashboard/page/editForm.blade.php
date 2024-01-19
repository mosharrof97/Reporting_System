@extends('adminDashboard.layout.layout')

@section('content')
    <div class="" id="">
        <div class="">
            <div class="card">
                <div class="card-body px-5 pb-3">

                    <form action="{{ route('employeeUpdated', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="name"
                                value="{{ $user->name }}" placeholder="Employee Name">
                            @error('name')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="number"
                                value="{{ $user->number }}" placeholder="Mobile Number">

                            @error('number')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="" name="email"
                                value="{{ $user->email }}" placeholder="Email Address">

                            @error('email')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="" name="password"
                                value="{{ $user->password }}" placeholder="Set Password ">

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
                            <select class="form-control" name="district" id="">
                                <option value="">Select District</option>
                                @foreach ($district as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $user->district_id == $data->id ? 'selected' : '' }}>
                                        {{ $data->name }}</option>
                                @endforeach
                            </select>

                            @error('district')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <input type="file" class="form-control" id="" name="image"
                                placeholder="Upload Photo">

                            @error('image')
                                <span id="" class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="mb-3 text-end">
                            <input type="submit" class="btn btn-primary" value="Submit form">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
