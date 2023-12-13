@extends('frontend.main')
@section('content')

 <div class="content-wrapper">
    <!-- Account Section start -->
                <section class="Login-wrap pt-100 pb-75">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                                <div class="login-form-wrap">
                                    <div class="login-header">
                                        <h3>Portal Login</h3>
                                    </div>
                                   
                                         <form method="POST" action="{{ url('login') }}" class="login-form">
                                    @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input id="uname" type="text"
                                                   class="form-control @error('uname') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('uname') }}" required autocomplete="uname" autofocus
                                                   onfocusout="checkLocked(id)">

                                                   @error('uname')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                   <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password">

                                                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                <div class="checkbox style3">
                                                    <input type="checkbox" id="test_1">
                                                    <label for="test_1">
                                                        Remember Me</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end mb-20">
                                                <a href="recover-password.html" class="link style1">Forgot Password?</a>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button class="btn style1 w-100 d-block">
                                                        Login Now
                                                    </button>
                                                </div>
                                            </div>
                                         
                                        </div>
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </section>
                <!-- Account Section end -->

            </div>



@stop