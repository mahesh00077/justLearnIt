@extends('admin.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Schedule</a></li>
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
                    <form method="post" action="{{ url('admin/schedule/add_update') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="TXTID" value="{{ !empty($edit_data)?$edit_data->schedule_id:'' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Time From</label>
                            <input type="text" class="form-control" name="time_from" id="time_from"
                                value="{{ !empty($edit_data)?$edit_data->time_from:'' }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Time To</label>
                            <input type="text" class="form-control" name="time_to" id="time_to"
                                value="{{ !empty($edit_data)?$edit_data->time_to:'' }}">
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
                <h3 class="box-title">Schedule List
                    <!-- <small></small> -->
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="12%" class="text-center">Sr. No.</th>
                            <th width="20%" class="text-center">Time From</th>
                            <th width="20%" class="text-center">Time To</th>
                            <th width="10%" class="text-center">Status</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // dd($schedule_data);
                        if (!empty($schedule_data)) {

                            $i = ($schedule_data->currentPage() - 1) * $schedule_data->perPage() + 1;
                            // $i = '1';
                        ?>

                        @foreach($schedule_data as $value)
                        <tr>
                            <td class="text-center">{{$i++}}</td>

                            <td><?php echo !empty($value->time_from) ? ucfirst($value->time_from) : ''; ?></td>
                            <td><?php echo !empty($value->time_to) ? ucfirst($value->time_to) : ''; ?></td>
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
                                    href='{{url("admin/schedule_status/$value->schedule_id/$status1")}}'> <i
                                        class="{{$class}}" {{$style}} aria-hidden="true" title="{{$title}}"></i></a>

                            </td>
                            <td style="text-align: center;">
                                <!-- $page = ($empDetails->currentPage() - 1) * $empDetails->perPage() + 1; -->
                                <a href='{{url("admin/schedule/$value->schedule_id")}}'><button type="button"
                                        class="btn btn-warning btn-xs" title="Edit"><i
                                            class="fa fa-pencil"></i></button></a>
                                <a href='{{url("admin/schedule_del/$value->schedule_id")}}'
                                    onClick="return confirm('Are you sure you want to delete record?')"><button
                                        type="button" class="btn btn-danger btn-xs" title="Delete"><i
                                            class="fa fa-trash"></i></button></a>
                            </td>

                        </tr>
                        @endforeach
                        <?php } ?>

                    </tbody>
                </table>
                {{$schedule_data->links()}}
            </div>
        </div>
    </div>
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->


@endsection