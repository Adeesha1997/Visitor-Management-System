@extends('layouts.login&register')
@section('title', 'Register')
@section('content')



    <div class="card o-hidden border-0 shadow-lg my-5">

        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            @if (session()->has('success'))
                                <div class="alert alert-success border-left-primary">
                                    {{ session()->get('success') }} <i class="fas fa-user-check"></i><a class="small" href="{{ route('login') }}"> | Click here to login </a>
                                </div>
                            @endif
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="{{ route('register.custom') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="first_name"
                                        placeholder="First Name">

                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }} * </span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="last_name"
                                        placeholder="Last Name">

                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }} * </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email"
                                    placeholder="Email Address">

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
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>

                        </form>

                        <div class="text-center">
                            <a class="small" href="{{ route('login')}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
