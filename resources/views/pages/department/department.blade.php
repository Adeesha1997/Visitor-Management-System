@extends('layouts.dashboard')
@section('title', 'Department')
@section('heading', 'Department')
@section('content')


    <div class="row">

        <div class="col-lg-12 mb-5 ">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb border-left-primary">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Department</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Department Management</h6>
                </div>
                <div class="col col-md-6 text-right">
                    <a href="{{route('department.add')}}" class="btn btn-sm btn-primary btn-icon-split" value="Edit">
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
                <table class="table table-bordered" id="department_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Department Name</th>
                            <th>Contact Person</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            var table = $('#department_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('department.fetchall') }}",
                columns: [
                    {
                        data: 'department_name',
                        name: 'department_name'
                    },
                    {
                        data: 'contact_person',
                        name: 'contact_person'
                    },

                    {
                        data:'action',
                        name:'action',
                        orderable:false
                }
            ]
        });
    })


$(document).on('click', '.delete', function(){
    var id= $(this).data('id');

    if(confirm("Are you sure you want to remove it ?"))
    {
        window.location.href = '/department-delete/'+ id;
    }
    
});
</script>

@endsection
