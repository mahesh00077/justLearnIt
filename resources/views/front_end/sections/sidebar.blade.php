<div class="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="active" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('course/all')}}">Courses</a>
                                <!-- <ul class="sub-menu"> -->
                                <!-- @if(!empty($courses_data))
                                    @foreach($courses_data as $value)
                                    <li><a href="{{url('course').'/'.$value->course_id}}">{{$value->course_name}}</a>
                                    </li>
                                    @endforeach
                                    @endif -->
                                <!-- <li><a href="{{url('course/all')}}">All Courses</a></li> -->
                                <!-- </ul> -->
                            </li>
                            <li class="nav-item">
                                <a href="{{url('about-us')}}">About us</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('contact-us')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav> <!-- nav -->
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="right-icon text-right">
                    <ul>
                        <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                        @if(Session::get('UID')=='')
                        <li><a href="{{url('signIn')}}">Sign In</a></li>
                        <!-- <li><a href="{{url('signUp')}}">Sign Up</a></li> -->
                        @else
                        <li><a href="{{url('signOut')}}">SignOut</a></li>
                        @endif
                    </ul>
                </div> <!-- right icon -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>

</header>
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
<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->

<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="#">
            <input type="text" placeholder="Search by keyword">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div> <!-- serach form -->
</div>

<!--====== SEARCH BOX PART ENDS =====