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
        <li><a href="#">Course Syllabus Content</a></li>
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
            <h3 class="box-title">Course Syllabus Content List</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-primary" href="{{url('admin/syllabus/add')}}">Add Syllabus Content For Course</a>
            </div>
        </div>
        <div class="box-body">
            <!-- Start creating your amazing application! -->
            <table id="example" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="12%" class="text-center">Sr. No.</th>
                        <th width="20%" class="text-center">Course Name</th>
                        <th width="20%" class="text-center">Title</th>
                        <th width="20%" class="text-center">Content</th>
                        <th width="20%" class="text-center">Status</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // dd($postDetails);
                    if (!empty($tbl_data)) {

                        $i = ($tbl_data->currentPage() - 1) * $tbl_data->perPage() + 1;
                        // $i = '1';
                    ?>

                    @foreach($tbl_data as $value)
                    <tr>
                        <td class="text-center">{{$i++}}</td>

                        <td><?php echo !empty($value->course_name) ? ($value->course_name) : ''; ?></td>
                        <td><?php echo !empty($value->title) ? ucfirst($value->title) : ''; ?></td>
                        <td><?php echo !empty($value->content) ? ucfirst(substr($value->content, 0, 50)) : ''; ?></td>
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
                            <a onClick="return confirm('Are you sure you want to change status ?')"
                                href='{{url("admin/syllabus_status/$value->id/$status1")}}'> <i class="{{$class}}"
                                    {{$style}} aria-hidden="true" title="{{$title}}"></i></a>

                        </td>
                        <td style="text-align: center;">
                            <!-- $page = ($empDetails->currentPage() - 1) * $empDetails->perPage() + 1; -->
                            <a href='{{url("admin/syllabus/add/$value->id")}}'><button type="button"
                                    class="btn btn-warning btn-xs" title="Edit"><i
                                        class="fa fa-pencil"></i></button></a>
                            <a href='{{url("admin/syllabus_del/$value->id")}}'
                                onClick="return confirm('Are you sure you want to delete record?')"><button
                                    type="button" class="btn btn-danger btn-xs" title="Delete"><i
                                        class="fa fa-trash"></i></button></a>
                        </td>

                    </tr>
                    @endforeach
                    <?php } ?>

                </tbody>
            </table>
            {{$tbl_data->links()}}
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