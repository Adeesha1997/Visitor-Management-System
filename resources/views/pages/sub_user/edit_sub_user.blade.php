@extends('layouts.dashboard')
@section('title','Edit-Sub User')
@section('heading','Edit Sub User')
@section('content')
<div class="row">

    <div class="col-lg-12 mb-5 ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb border-left-primary">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sub.user') }}">Sub User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub User</li>

            </ol>
        </nav>

    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-2 ">
        <div class="text-left">

            <h5>Edit Sub User Details</h5>

        </div>
    </div>
    <div class="col-lg-12">
        <form method="POST" action="{{ route('sub_user.edit_validation') }}">
            @csrf

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="first_name"
                        placeholder="First Name" value="{{$data->first_name}}">

                    @if ($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }} * </span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="last_name"
                        placeholder="Last Name"  value="{{$data->last_name}}">

                    @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }} * </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user" name="email"
                    placeholder="Email Address" value="{{$data->email}}">

                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }} * </span>
                @endif
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password"
                        placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }} * </span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password_confirmation"
                        placeholder="Repeat Password">
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif

            </div>
            <br>

            <input type="hidden" name="hidden_id" value="{{$data->id}}">
            <button type="submit" class="btn btn-sm btn-success btn-icon-split" value="Edit">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <span class="text">Update</span>
            </button>
            <hr>

        </form>

    </div>
</div>

@endsection
