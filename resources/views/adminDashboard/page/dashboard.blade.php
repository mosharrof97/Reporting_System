@extends('adminDashboard.layout.layout')

@section('content')
    {{-- All Employee Report --}}
    <div class="row page-titles mx-0">
        <div class="col-12 p-md-0">
            <div class=" text-center">
                <h4>All Employee Report </h4>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>DMO- Shahidul Islam</h5>
                        <p class="text-dark m-0">Today Visit- 3</p>
                        <p class="text-dark m-0">Current Month - 12</p>
                        <p class="text-dark m-0">Current Year- 100</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>DMO- Shahidul Islam</h5>
                        <p class="text-dark m-0">Today Visit- 3</p>
                        <p class="text-dark m-0">Current Month - 12</p>
                        <p class="text-dark m-0">Current Year- 100</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>DMO- Shahidul Islam</h5>
                        <p class="text-dark m-0">Today Visit- 3</p>
                        <p class="text-dark m-0">Current Month - 12</p>
                        <p class="text-dark m-0">Current Year- 100</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card border-1 border-primary">
                <div class="stat-widget-one card-body p-3">
                    <div class=" text-center">
                        <h5>DMO- Shahidul Islam</h5>
                        <p class="text-dark m-0">Today Visit- 3</p>
                        <p class="text-dark m-0">Current Month - 12</p>
                        <p class="text-dark m-0">Current Year- 100</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- All Employee Report --}}

    {{-- Total Report Summary  --}}
    <div class="row page-titles mx-0">
        <div class="col-12 p-md-0">
            <div class=" text-center">
                <h4>Total Report Summary </h4>
            </div>
        </div>
    </div>

    <div class="row page-titles mx-0 mb-2 p-2">
        <div class="col-12 p-md-0">
            <div class="d-flex justify-content-end">
                <div class="mr-1 ">
                    <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                        placeholder="Select Month">
                    <datalist id="datalistOptions">
                        <option value="Jan">
                        <option value="Feb">
                        <option value="March">
                        <option value="April">
                        <option value="May">
                    </datalist>
                </div>

                <div class="ml-1">
                    <input class="form-control bg-light" list="datalistOptions" id="exampleDataList"
                        placeholder="Select Year">
                    <datalist id="datalistOptions">
                        <option value="2020">
                        <option value="2021">
                        <option value="2022">
                        <option value="2023">
                        <option value="2024">
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
