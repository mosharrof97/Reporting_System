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
                            <input class="form-control " style="background-color: rgb(156, 77, 48)" list="dmoList"
                                id="dmo" placeholder="Select DMO">
                            <datalist id="dmoList">

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
                                    <th class="text-nowrap">Appointment Date</th>
                                    <th class="text-nowrap">Comment</th>
                                    <th class="text-nowrap">DMO Name</th>
                                    <th class="text-nowrap">View</th>
                                </tr>
                            </thead>
                            <tbody id="schedule">
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

    <script>
        $('document').ready(function() {
            $.ajax({
                url: "{{ route('schedule_list_api') }}",
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if (res.schedule.length > 0) {
                        let datas = res['schedule'];
                        // console.log(datas);
                        $.each(datas, function(index, data) {
                            $("#schedule").append(`
                                <tr>
                                    <td class="text-nowrap"> ${index + 1}</td>
                                    <td class="text-nowrap"> ${new Date(data.created_at).toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' })}</td>
                                    <td class="text-nowrap"> ${data.school_name}</td>
                                    <td class="text-nowrap"> ${data.eiin_number}</td>
                                    <td class="text-nowrap"> ${data.h_teacher_name}</td>
                                    <td class="text-nowrap"> ${data.number}</td>
                                    <td class="text-nowrap"> ${data.district.name}</td>
                                    <td class="text-nowrap"> ${data.upazila.name}</td>
                                    <td class="text-nowrap"> ${new Date(data.date).toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' })}</td>
                                    <td class="text-nowrap"> ${data.schedule_comment}</td>
                                    <td class="text-nowrap"> ${data.user.name}</td>
                                    <td class="text-nowrap"> <a href="" class="btn btn-light">View</a></td>
                                </tr>
                            `);
                        });
                    } else {
                        $("#schedule").append("<tr><td colspan='2'> Data Not Found</td></tr>");
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX request failed:', error);
                }
            });
        });

        // Autocomplete Search From
        $(document).ready(function() {
            $("#dmo").on('keyup', function() {
                var value = $(this).val();

                // Send an AJAX request to the server
                $.ajax({
                    url: "{{ route('schedule_list') }}", // Replace with your server endpoint
                    type: "GET",
                    data: {
                        'query': value
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        // Update the autocomplete list with the received data
                        updateAutocompleteList(data);
                    }
                });
            });

            // Handle clicks on the autocomplete list items
            $(document).on('click', 'option', function() {
                var value = $(this).text();
                $('#dmo').val(value);
                $('#dmoList').html('');
            });

            // Function to update the autocomplete list
            function updateAutocompleteList(data) {
                var list = $('#dmoList');
                list.empty();


                // Append each result as a list item
                $.each(data, function(index, item) {
                    // list.append('<li>' + item + '</li>');
                    list.append((`<option value="${item}">`));
                });
            }
        });
    </script>
@endsection


{{-- 
                        // for (let i = 0; i < res.schedule.length; i++) {
                        //     $("#schedule").append(`
                    //     <tr>
                    //         <td class="text-nowrap">` + (i + 1) + `</td>
                    //         <td class="text-nowrap">` + (res.schedule[i]['created_at']) + `</td>
                    //         <td class="text-nowrap">` + (res.schedule[i]['school_name']) + `</td>
                    //         <td class="text-nowrap">` + (res.schedule[i]['eiin_number']) + `</td>
                    //         <td class="text-nowrap">` + (res.schedule[i]['h_teacher_name']) + `</td>
                    //         <td class="text-nowrap">` + (res.schedule[i]['number']) + `</td>
                    //         <td class="text-nowrap">` + (res.schedule[i]['district.name']) + `</td>
                    //         <td class="text-nowrap">` + (res.schedule[i][{
                        //         'upazila.name'
                        //     }]) + `</td>
                    //         <td class="text-nowrap">` + (res.schedule[i]['date']) + `</td>

                    //     </tr>
                    //     `)
                        // } --}}


{{-- @foreach ($schedule as $datas)
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
{{-- <a href="#" class="btn btn-light">View</a>
                                        </td>
                                    </tr>
                                @endforeach --}}
