@extends('layouts.dashboard')
@section('title','Add-Visitor')
@section('heading','Add Visitor')
@section('content')
<div class="row">

    <div class="col-lg-12 mb-5 ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb border-left-primary">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('visitor') }}">Visitor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Visitor</li>
            </ol>
        </nav>

    </div>
</div>
    <div class="row">
        <div class="col-lg-12 mb-2 ">
            <div class="text-left">

                <h5>Add New Visitor Details</h5>

            </div>
        </div>
    <div class="col-lg-12">
        <form method="POST" action="3">
            @csrf

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="visitor_name"
                        placeholder="Visitor Name" >
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="visitor_email"
                        placeholder="Visitor Email" >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="visitor_mobile_no"
                        placeholder="Visitor Mobile Number" >
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="visitor_address"
                        placeholder="Visitor Address" >
                </div>
            </div>



            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="visitor_department" class="form-control form-control-user" name="visitor_department">
                    @foreach($departments['data'] as $department)
                            <option value='{{$department->id}}'>{{$department->name}}</option>
                        @endforeach
                    </div>

                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="visitor_meet_person_name"
                        placeholder="Visitor Meet Person Name" >
                </div>

            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <textarea class="form-control form-control-user" name="visitor_department"
                        placeholder="Reson To Visit" ></textarea>
                </div>

            </div>

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



@endsection
