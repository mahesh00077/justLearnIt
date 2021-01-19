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
        <li><a href="#">Course Report</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br><br>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Course Report List</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-primary" href="{{url('admin/courseReportExport')}}">Export</a>
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
                        <th width="20%" class="text-center">Status</th>
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
                        <td class="text-center">
                            <?php
                                $status1 = "";
                                if ($value->status == "1") {
                                    $status1 = "0";
                                    $class = "fa fa-toggle-on tgle-on danger";
                                    $style = "style=color:green";
                                    $title = "Inactive";
                                } else if ($value->status == "0") {
                                    $status1 = "1";
                                    $style = "style=color:red";
                                    $class = "fa fa-toggle-on fa-rotate-180 tgle-off";
                                    $title = "Active";
                                }
                                ?>
                            <i class="{{$class}}" {{$style}} aria-hidden="true" title="{{$title}}"></i>

                        </td>

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