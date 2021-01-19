@extends('admin.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Course</a></li>
        <!-- <li class="active">Editors</li> -->
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
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
                    <h3 class="box-title">{{ !empty($editCategoryDetails)? 'Edit':'Add' }} Course
                        <!-- <small></small> -->
                    </h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ url('admin/course/add_update') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="TXTID" value="{{ !empty($edit_data)?$edit_data->course_id:'' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course Name</label>
                            <input type="text" class="form-control" name="course_name" id="course_name"
                                value="{{ !empty($edit_data)?$edit_data->course_name:'' }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Duration</label>
                            <input type="text" class="form-control" name="duration" id="duration"
                                value="{{ !empty($edit_data)?$edit_data->duration:'' }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" name="price" id="price"
                                value="{{ !empty($edit_data)?$edit_data->price:'' }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Overview</label>
                            <textarea id="editor1" class="textarea" name="overview" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            {{!empty($edit_data)?$edit_data['overview']:''}}
                            </textarea>

                        </div>
                        <div class="box-footer">
                            <button type="submit"
                                class="btn btn-primary">{{ !empty($edit_data)?'Update':'Submit' }}</button>
                            <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Course List
                    <!-- <small></small> -->
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="12%" class="text-center">Sr. No.</th>
                            <th width="20%" class="text-center">Course Name</th>
                            <th width="20%" class="text-center">Overview</th>
                            <th width="20%" class="text-center">Duration</th>
                            <th width="20%" class="text-center">Price</th>
                            <th width="10%" class="text-center">Status</th>
                            <th width="10%" class="text-center">Action</th>
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

                            <td><?php echo !empty($value->course_name) ? ucfirst($value->course_name) : ''; ?></td>
                            <td><?php echo !empty($value->overview) ? ucfirst(substr($value->overview, 0, 50)) : ''; ?>
                            <td><?php echo !empty($value->duration) ? ucfirst($value->duration) : ''; ?></td>
                            <td><?php echo !empty($value->price) ? ucfirst($value->price) : ''; ?></td>
                            </td>
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
                                    href='{{url("admin/course_status/$value->course_id/$status1")}}'> <i
                                        class="{{$class}}" {{$style}} aria-hidden="true" title="{{$title}}"></i></a>

                            </td>
                            <td style="text-align: center;">
                                <!-- $page = ($empDetails->currentPage() - 1) * $empDetails->perPage() + 1; -->
                                <a href='{{url("admin/course/$value->course_id")}}'><button type="button"
                                        class="btn btn-warning btn-xs" title="Edit"><i
                                            class="fa fa-pencil"></i></button></a>
                                <a href='{{url("admin/course_del/$value->course_id")}}'
                                    onClick="return confirm('Are you sure you want to delete record?')"><button
                                        type="button" class="btn btn-danger btn-xs" title="Delete"><i
                                            class="fa fa-trash"></i></button></a>
                            </td>

                        </tr>
                        @endforeach
                        <?php } ?>

                    </tbody>
                </table>
                {{$course_data->links()}}
            </div>
        </div>
    </div>
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->


@endsection
@section('script')
<script>
$(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
})
</script>
@endsection