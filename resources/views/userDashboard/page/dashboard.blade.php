@extends('userDashboard.layout.layout')

@section('content')
    <div class="row page-titles mx-0 mb-2 p-2">
        <div class="col-12 p-md-0">
            <div class="d-flex justify-content-end">
                <div class="mr-1 ">
                    <input class="form-control bg-light" list="datalistOptions" id="exampleDataList" placeholder="Select Month">
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
    </div>

    <div class="row">

        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>0</h5>
                        <h5>Today Visit</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>0</h5>
                        <h5>Total Sold</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>0</h5>
                        <h5>Total Sold</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>0</h5>
                        <h5>Total Sold</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>0</h5>
                        <h5>Total Visit</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>0</h5>
                        <h5>Total Positive</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>0</h5>
                        <h5>Total Sold</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Total Report Summary  --}}
@endsection
