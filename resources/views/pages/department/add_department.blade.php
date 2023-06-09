@extends('layouts.dashboard')
@section('title', 'Add-Department')
@section('heading', 'Add Department')
@section('content')

    <div class="row">

        <div class="col-lg-12 mb-5 ">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb border-left-primary">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('department') }}">Department</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Department</li>

                </ol>
            </nav>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-2 ">
            <div class="text-left">

                <h5>Add New Department Details</h5>

            </div>
        </div>
        <div class="col-lg-12">
            <form method="POST" action="{{ route('department.add_validation') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-department" name="department_name"
                            placeholder="Department Name">

                        @if ($errors->has('department_name'))
                            <span class="text-danger">{{ $errors->first('department_name') }} * </span>
                        @endif
                    </div>

                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" name="contact_person[]" class="form-control form-control-department"
                            placeholder="Contact Person 1">

                            @if ($errors->has('contact_person'))
                            <span class="text-danger">{{ $errors->first('contact_person') }} * </span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <button type="button" name="add_person" id="add_person" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i></button>
                    </div>
                </div>

                    <div class="form-group row ">
                        <div class="col-sm-6 mb-3 mb-sm-0"></div>
                        <div class="col-sm-6 mb-3 mb-sm-0" id="append_person"></div>

                    </div>


                <br>

                <button type="submit" class="btn btn-sm btn-primary btn-icon-split" value="Add">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Save</span>
                </button>
                <hr>

            </form>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            var count_person = 1;

            $(document).on('click', '#add_person', function() {

                count_person++;

                var html = `

                <div class="row mt-2" id="person_` + count_person +
                    `">

                    <div class="col-sm-8 mb-3 mb-sm-0 ">
                        <input type="text" name="contact_person[]" class="form-control department_contact_person" placeholder="Contact Person `+ count_person +`" />
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0 ">
                        <button type="button" name="remove_person" class="btn btn-danger btn-sm remove_person" data-id="` + count_person + `"><i class="fas fa-minus-circle"></i></button>
                    </div>
                </div>

                `;

                $('#append_person').append(html);

            });

            $(document).on('click', '.remove_person', function() {

                var button_id = $(this).data('id');

                $('#person_' + button_id).remove();

            });
        });
    </script>


@endsection
