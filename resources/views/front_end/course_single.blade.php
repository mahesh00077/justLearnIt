@extends('front_end.app')



@section('main-content')

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
    style="background-image: url(images/page-banner-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>{{$course_data[0]->course_name}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Course</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$course_data[0]->course_name}}</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== COURSES SINGEl PART START ======-->

<section id="corses-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="corses-singel-left mt-30">
                    <div class="title">
                        <h3>{{$course_data[0]->course_name}}</h3>
                    </div> <!-- title -->
                    <!-- <div class="course-terms">
                        <ul>
                            <li>
                                <div class="teacher-name">
                                    <div class="thum">
                                        <img src="images/course/teacher/t-1.jpg" alt="Teacher">
                                    </div>
                                    <div class="name">
                                        <span>Teacher</span>
                                        <h6>Mark anthem</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="course-category">
                                    <span>Category</span>
                                    <h6>Programaming </h6>
                                </div>
                            </li>
                            <li>
                                <div class="review">
                                    <span>Review</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li class="rating">(20 Reviws)</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>  -->

                    <!-- <div class="corses-singel-image pt-50">
                        <img src="images/course/cu-1.jpg" alt="Courses">
                    </div> -->
                    <!-- corses singel image -->

                    <div class="corses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
                                    aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab"
                                    aria-controls="curriculam" aria-selected="false">Syllabus</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                                    aria-controls="instructor" aria-selected="false">Instructor</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews</a>
                            </li> -->
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview-tab">
                                <div class="overview-description">
                                    <div class="singel-description pt-40">
                                        <?php echo $course_data[0]->overview; ?>

                                    </div>
                                    <!-- <div class="singel-description pt-40">
                                        <h6>Requrements</h6>
                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                            auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                            vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec
                                            tellus .</p>
                                    </div> -->
                                </div> <!-- overview description -->
                            </div>
                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                <div class="curriculam-cont">
                                    <div class="title">
                                        <h6>Syllabus</h6>
                                    </div>
                                    @if(!empty($syllabus_data))
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach($syllabus_data as $s_value)
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="heading<?php echo $i ?>">
                                                <a href="#" data-toggle="collapse"
                                                    data-target="#collapse<?php echo $i ?>" aria-expanded="true"
                                                    aria-controls="collapse<?php echo $i ?>">
                                                    <ul>
                                                        <li><i class="fa fa-file-o"></i></li>
                                                        <!-- <li><span class="lecture">Lecture 1.1</span></li> -->
                                                        <li><span class="lecture">Lecture</span></li>
                                                        <li><span class="head">{{$s_value->title}}</span></li>
                                                        <li><span class="time d-none d-md-block"><i class=""></i> <span>
                                                                    &nbsp;</span></span></li>
                                                    </ul>
                                                </a>
                                            </div>

                                            <div id="collapse<?php echo $i ?>" class="collapse"
                                                aria-labelledby="heading<?php echo $i ?>"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <?php echo $s_value->content; ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                    $i++;
                                    ?>
                                    @endforeach
                                    @endif
                                </div> <!-- curriculam cont -->
                            </div>
                            <!--  -->
                        </div> <!-- tab content -->
                    </div>
                </div> <!-- corses singel left -->

            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course-features mt-30">
                            <h4>Course Features </h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>Duaration :
                                    <span><?php echo $course_data[0]->duration; ?></span>
                                </li>
                                <!-- <li><i class="fa fa-clone"></i>Leactures : <span>09</span></li> -->
                                <li><i class="fa fa-beer"></i>Quizzes : <span>05</span></li>
                                <li><i class="fa fa-user-o"></i>Students : <span>100</span></li>
                            </ul>
                            <div class="price-button pt-10">
                                <span>Price : <b><i class="fa fa-inr"></i>
                                        <?php echo $course_data[0]->price; ?></b></span>
                                <!-- <a href="" class="main-btn">Enroll Now</a> -->
                                <!-- Button trigger modal -->
                                <?php
                                $role = Session::get('UROLE');
                                $uid = Session::get('UID');
                                // $info_uid = $registered_course_info_data[0]->uid;
                                ?>
                                @if($check_enroll!=1)
                                @if($role=='' && $uid=='')
                                <a href="{{url('signIn').'/'.$course_data[0]->course_id}}" class="main-btn">Enroll
                                    Now</a>
                                @elseif($role=='3' && $uid!='')
                                <button type="button" class="main-btn" data-toggle="modal"
                                    data-target="#exampleModal">Enroll Now</button>
                                @endif
                                @endif
                            </div>
                        </div> <!-- course features -->
                    </div>

                </div>
            </div>
        </div> <!-- row -->

    </div> <!-- container -->
</section>

<!--====== COURSES SINGEl PART ENDS ======-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enroll Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('enroll_now')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course Name</label>
                            <input type="text" class="form-control" name="course_name" id="course_name"
                                value="<?php echo $course_data[0]->course_name; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Duration</label>
                            <input type="text" class="form-control" name="duration" id="duration"
                                value="<?php echo $course_data[0]->duration; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" name="price" id="price"
                                value="<?php echo $course_data[0]->price; ?>" readonly>
                        </div>
                        <hr>
                        <h5>Schedule</h5>
                        <div class="form-group">
                            <select class="form-control" name="schedule_id">
                                <option selected>Select Schedule</option>
                                @foreach($q as $svalue)
                                <?php $v = explode(',', $svalue); ?>
                                <option value="{{$v[3] }}">
                                    <?php echo $v[1] . " " . $v[2] ?>

                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <input type="hidden" name="course_id" value="<?php echo $course_data[0]->course_id; ?>">
                        <div class="col-md-12">
                            <div class="singel-form">
                                <button type="submit" class="main-btn">Enroll</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
@endsection