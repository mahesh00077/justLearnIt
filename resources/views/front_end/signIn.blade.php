@extends('front_end.app')


@section('main-content')
<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8"
    style="background-image: url(images/page-banner-6.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Sign In</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SignIn</li>
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
                        <h5>Sign In</h5>
                        <!-- <h2>Keep in touch</h2> -->

                    </div> <!-- section title -->
                    <div class="main-form pt-45">
                        <form action="{{url('signIn/action')}}" method="post">
                            @csrf

                            <input type="hidden" name="c_id" value="{{!empty($id)?$id:''}}">
                            <div class="row">

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
                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="singel-form">
                                        <button type="submit" class="main-btn">Sign In</button>
                                        <a href="{{url('signUp')}}" class="pull-right">Create Account
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