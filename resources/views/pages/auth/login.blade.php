@extends('layouts.login&register')
@section('title', 'Login')
@section('content')


    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger border-left-danger">
                                            {{ session()->get('error') }} <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                    @endif
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login.custom') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email"
                                            aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }} * </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }} *</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                    <hr>

                                </form>


                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
