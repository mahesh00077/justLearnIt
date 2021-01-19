@extends('admin.app')


@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <!-- <h1>
        Users Page
        <small>it all starts here</small>
    </h1> -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Courses List</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br><br>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block pull-right" style="position: relative;z-index: inherit;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block pull-right" style="position: relative;z-index: inherit;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<br>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Courses List</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <!-- Start creating your amazing application! -->
            <table id="example" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="12%" class="text-center">Sr. No.</th>
                        <th width="20%" class="text-center">Course Name</th>
                        <th width="20%" class="text-center">Duration</th>
                        <th width="20%" class="text-center">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // dd($course_data);
                    if (!empty($course_data)) {

                        $i = ($course_data->currentPage() - 1) * $course_data->perPage() + 1;
                        // $i = '1';
                    ?>

                    @foreach($course_data as $value)
                    <tr>
                        <td class="text-center">{{$i++}}</td>

                        <td><?php echo !empty($value->course_name) ? ($value->course_name) : ''; ?></td>
                        <td><?php echo !empty($value->duration) ? ucfirst($value->duration) : ''; ?></td>
                        <td><?php echo !empty($value->price) ? ucfirst($value->price) : ''; ?></td>


                    </tr>
                    @endforeach
                    <?php } ?>

                </tbody>
            </table>
            {{$course_data->links()}}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!-- Footer -->
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

@endsection