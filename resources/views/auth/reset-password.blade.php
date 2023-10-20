@extends('frontend.main_master')


@section('main')


<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}} " rel="nofollow">Home</a>
                    <span></span> Reset Password
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Reset Password</h3>
                                        </div>


                         <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                   <input type="hidden" name="token" value="{{ $request->route('token') }}">


                                            <div class="form-group">
                                                <input type="email" id="email" required="" name="email" :value="old('email', $request->email)" placeholder="Your Email">
                                            </div>

                                            <div class="form-group">
                                                <input required="" id="password" type="password" name="password" placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                            <input required="" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password">
                                            </div>



                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                               <img src="{{asset('frontend/assets/imgs/login.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endsection