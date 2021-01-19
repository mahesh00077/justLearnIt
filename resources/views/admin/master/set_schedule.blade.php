@extends('admin.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Set Schedule Class</a></li>
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
                    <h3 class="box-title">{{ !empty($edit_data)? 'Edit':'Add' }} Schedule
                        <!-- <small></small> -->
                    </h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ url('admin/set_schedule/add_update') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="TXTID" value="{{ !empty($edit_data)?$edit_data->id:'' }}">
                        <div class="form-group">
                            <label>Course</label>
                            <select class="form-control" id="select22" name="course_id" style="width: 100%;">
                                <option selected="selected">Select Course</option>
                                @if(!empty($course_data))
                                @foreach($course_data as $cvalue)
                                <option value="{{$cvalue->course_id}}"
                                    <?php echo !empty($edit_data) ? $edit_data->course_id == $cvalue->course_id ? 'Selected' : '' : ''; ?>>
                                    {{$cvalue->course_name}}
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Multiple</label>
                            <select class="form-control select2" multiple="multiple" name="schedule_ids[]"
                                data-placeholder="Select a State" style="width: 100%;">
                                @if(!empty($schedule_data))
                                @foreach($schedule_data as $svalue)
                                <option value="{{$svalue->schedule_id}}" <?php if (!empty($edit_data) &&  in_array($svalue->schedule_id, explode(",", $edit_data->schedule_id))) {
                                                                                echo 'Selected';
                                                                            } ?>>
                                    {{$svalue->time_from . " - ". $svalue->time_to}}
                                </option>
                                @endforeach
                                @endif
                            </select>
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
                <h3 class="box-title">Schedule Class List
                    <!-- <small></small> -->
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                // $st = "kjhkhkjhkhkjhkjhjkhjhkhkjhkhkhkhkhkjhkjhkhkhkjhkkkjhkjhkjhk";
                // echo trim_characters($st);
                ?>
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="12%" class="text-center">Sr. No.</th>
                            <th width="20%" class="text-center">Course Name</th>
                            <th width="20%" class="text-center">Schedule</th>
                            <th width="10%" class="text-center">Status</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($set_schedule_data)) {

                            $i = ($set_schedule_data->currentPage() - 1) * $set_schedule_data->perPage() + 1;
                            // $i = '1';
                        ?>

                        @foreach($set_schedule_data as $value)
                        <tr>
                            <td class="text-center">{{$i++}}</td>

                            <td><?php echo !empty($value->course_name) ? ucfirst($value->course_name) : ''; ?></td>
                            <?php
                                $dataa = get_time($value->schedule_id, $value->course_id);
                                // echo '<pre>';
                                ?>
                            <td>
                                <?php
                                    foreach ($dataa as $l) {
                                        $set = explode(',', $l);
                                        // echo count($set);
                                        echo $set[0] . " - " . $set[1] . " ,";
                                    }
                                    ?></td>
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
                                    href='{{url("admin/set_schedule_status/$value->id/$status1")}}'> <i
                                        class="{{$class}}" {{$style}} aria-hidden="true" title="{{$title}}"></i></a>

                            </td>
                            <td style="text-align: center;">
                                <!-- $page = ($empDetails->currentPage() - 1) * $empDetails->perPage() + 1; -->
                                <a href='{{url("admin/set_schedule/$value->id")}}'><button type="button"
                                        class="btn btn-warning btn-xs" title="Edit"><i
                                            class="fa fa-pencil"></i></button></a>
                                <a href='{{url("admin/set_schedule_del/$value->id")}}'
                                    onClick="return confirm('Are you sure you want to delete record?')"><button
                                        type="button" class="btn btn-danger btn-xs" title="Delete"><i
                                            class="fa fa-trash"></i></button></a>
                            </td>

                        </tr>
                        @endforeach
                        <?php } ?>

                    </tbody>
                </table>
                {{$set_schedule_data->links()}}
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
$(document).ready(function() {
    $('.select2').select2();
    $('#select22').select2();
});
</script>

@endsection