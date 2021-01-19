@extends('front_end.app')


@section('main-content')
<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8"
    style="background-image: url(images/page-banner-6.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Sign up</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SignUp</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<section id="contact-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-from">
                    <div class="section-title">
                        <h5>Sign Up</h5>
                        <!-- <h2>Keep in touch</h2> -->
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div> <!-- section title -->
                    <div class="main-form pt-45">
                        <form action="{{url('signUp/action')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <input name="name" type="text" placeholder="Your name"
                                            data-error="Name is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- singel form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <input name="email" type="email" placeholder="Email"
                                            data-error="Valid email is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- singel form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <input name="mobile_no" type="text" placeholder="mobile no."
                                            data-error="Subject is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- singel form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <input name="username" type="text" placeholder="Username"
                                            data-error="Phone is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- singel form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <input name="password" type="password" placeholder="Password"
                                            data-error="Phone is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- singel form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <input name="cpassword" type="password" placeholder="Confirm Password"
                                            data-error="Phone is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- singel form -->
                                </div>

                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="singel-form">
                                        <button type="submit" class="main-btn">Register</button>
                                        <a href="{{url('signIn')}}" class="pull-right">Already account then click
                                            here</a>
                                    </div> <!-- singel form -->
                                </div>
                            </div> <!-- row -->
                        </form>

                    </div> <!-- main form -->
                </div> <!--  contact from -->
            </div>

        </div> <!-- row -->
    </div> <!-- container -->

</section>

@endsection