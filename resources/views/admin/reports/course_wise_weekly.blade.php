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
        <li><a href="#">Weekly Report</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br><br>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Weekly Report</h3>
            <div class="box-tools pull-right">
                <!-- <a class="btn btn-primary" href="{{url('admin/syllabus/add')}}">Add Syllabus Content For Course</a> -->
            </div>
        </div>
        <div class="box-body">
            <div class="">
                <div class="form-group col-md-4">
                    <h5>Courses<span class="text-danger"></span></h5>
                    <div class="controls">
                        <select name="courseID" class="form-control select22">
                            <!-- <option>Select Course</option> -->
                            <option value="all" selected>All</option>
                            @foreach($c_data as $val)
                            <option value="{{$val->course_id}}">{{$val->course_name}}</option>
                            @endforeach
                        </select>
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <h5>Date From <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose"
                            placeholder="Please select start date">
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <h5>Date To <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose"
                            placeholder="Please select end date">
                        <div class="help-block"></div>
                    </div>
                </div>

            </div>
            <h5>&nbsp;</h5>
            <div class="text-left" style="margin-left: 15px;">
                <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
            </div>
            <br>
            <h3 class="box-title">Weekly Report List</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-primary export">Export</button>
            </div>
            <br>
            <table class="table table-bordered table-striped" id="laravel_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Registered Students Count</th>
                        <th>Created at</th>
                    </tr>
                </thead>
            </table>

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
@section('script')
<script>
$(document).ready(function() {
    $(".select22").select2();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,

        ajax: {
            url: "{{ url('admin/course_wise/Wresult') }}",
            type: 'GET',
            data: function(d) {
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
                d.courseID = $('.select22').val();
            }
        },
        columns: [{
                data: 'id',
                name: 'id',
                'visible': false
            },
            {
                data: 'course_name',
                name: 'course_name'
            },
            {
                data: 'uid',
                name: 'uid'
            },
            {
                data: 'created_at',
                render: function(data) {
                    if (data == '' || data == null) {
                        return '-';
                    } else {
                        var date = new Date(data);
                        let mm = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date
                            .getMonth() + 1)));
                        let dd = (date.getDate() > 9) ? date
                            .getDate() : ('0' + date.getDate());
                        let yy = date.getFullYear();
                        return dd + '/' + mm + '/' + yy;
                    }

                },
                name: 'created_at'
            },
        ],
        order: [
            [0, 'desc']
        ],
    });

    $('#btnFiterSubmitSearch').click(function() {
        $('#laravel_datatable').DataTable().draw(true);
    });

    $('.export').on('click', function() {

        var query = {
            start_date: $('#start_date').val(),
            end_date: $('#end_date').val(),
            course_id: $('.select22').val(),
        }


        var url = "{{URL::to('admin/weeklyCourseReportExport')}}?" + $.param(query)

        window.location = url;
    });
});
</script>
@endsection