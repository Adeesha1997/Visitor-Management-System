@extends('layouts.dashboard')
@section('title', 'Visitor')
@section('heading', 'Visitor')
@section('content')


    <div class="row">

        <div class="col-lg-12 mb-5 ">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb border-left-primary">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visitor</li>
                </ol>
            </nav>

        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="text-center">
                @if (session()->has('success'))
                    <div class="alert alert-success border-left-primary">
                        {{ session()->get('success') }} | <i class="fas fa-check-circle"></i></a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Visitor Management</h6>
                </div>
                <div class="col col-md-6 text-right">
                    <a href="#" class="btn btn-sm btn-primary btn-icon-split" value="Edit">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add New</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="visitor_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Visitor Name</th>
                            <th>Meet Person Name</th>
                            <th>Department</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Status</th>
                            <th>Enter By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
<script>
    $(function(){
        var table = $('#visitor_table').DataTable({
            processing:true,
            serverSide:true,
            ajax: "{{ route('visitor.fetchall')}}",
            columns:[
                {
                    data:'visitor_name',
                    name:'visitor_name'
                },
                {
                    data:'visitor_meet_person_name',
                    name:'visitor_meet_person_name'
                },
                {
                    data:'visitor_department',
                    name:'visitor_department'
                },
                {
                    data:'visitor_enter_time',
                    name:'visitor_enter_time'
                },
                {
                    data:'visitor_out_time',
                    name:'visitor_out_time'
                },
                {
                    data:'visitor_status',
                    name:'visitor_status'
                },
                {
                    data:'first_name',
                    name:'first_name'
                },
                {
                    data:'action',
                    name:'action',
                    orderable:false
                },
            ]


        });
    });


</script>


@endsection

