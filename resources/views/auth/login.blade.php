@extends('layouts.blank')

@section('content')

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="d-flex align-items-center min-vh-100">
                <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center mb-5">
                                    <a href="{{ route('home') }}" class="text-dark font-size-22 font-family-secondary">
                                        <i class="mdi mdi-album"></i> <b class="align-middle">{{ env('APP_NAME') }}</b>
                                    </a>
                                </div>
                                <h1 class="h5 mb-1">Welcome Back!</h1>
                                <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block waves-effect waves-light"> Log In </button>

                                    <div class="text-center mt-4">
                                        <h5 class="text-muted font-size-16">Social Media</h5>
                                    
                                        <ul class="list-inline mt-3 mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </form>

                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                        <p class="text-muted mb-2"><a href="{{ route('password.request') }}" class="text-muted font-weight-medium ml-1">Forgot your password?</a></p>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div> <!-- end .padding-5 -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end .w-100 -->
            </div> <!-- end .d-flex -->
        </div> <!-- end col-->
    </div>

@endsection
