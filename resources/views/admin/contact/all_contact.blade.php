@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"> Contact Message</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Contact Message</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Message</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($contacts as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                            <td>{{ $item->message }} </td>
                                            <td>
                                                <a href="{{ route('delete.message', $item->id) }}" id="delete"
                                                    class="btn btn-danger sm"><i class="fas fa-trash-alt"></i>Delete</a>
                                            </td>
                                        </tr>
                                        {{-- todo --}}
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
