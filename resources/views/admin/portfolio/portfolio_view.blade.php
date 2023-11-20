@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Portfolio All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Portfolio All Data</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Portfolio Name</th>
                                        <th>Portfolio Title</th>
                                        <th>Portfolio Image</th>
                                        <th>Portfolio Description</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($portfolio as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->portfolio_name }}</td>
                                            <td>{{ $item->portfolio_title }}</td>
                                            <td>{{ $item->portfolio_description }}</td>

                                            <td><img src="{{ asset($item->portfolio_image) }}"
                                                    style="height: 40px; width: 70px;" alt=""> </td>
                                            <td>
                                                <a href="{{ route('edit.multi.image', $item->id) }}"
                                                    class="btn btn-warning sm"> <i class="fas fa-edit"></i>Edit</a>
                                                <a href="{{ route('delete.multi.image', $item->id) }}" id="delete"
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
