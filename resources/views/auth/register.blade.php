@extends('frontend.main_master')


@section('main')




<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Register
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Create an Account</h3>
                                        </div>

                                        <form method="POST" action="{{ route('register') }}">
            @csrf

                                            <div class="form-group">
                                                <input type="text" id="name"required="" name="name" placeholder="Name">
                                            </div>

                                            <div class="form-group">
                                                <input id="email" type="email" required="" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input id="password" required="" type="password" name="password" placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                            <input required="" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password">
                                            </div>

                                            <div class="login_footer form-group">


                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up"> Register</button>
                                            </div>
                                        </form>
                                        <div class="text-muted text-center">Already have an account? <a href=" {{route('login')}} ">Sign in now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                               <img src="{{asset('frontend/assets/imgs/login.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        @endsection