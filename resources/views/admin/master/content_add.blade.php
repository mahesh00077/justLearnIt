@extends('admin.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Post</a></li>
        <!-- <li class="active">Editors</li> -->
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">


                    <h3 class="box-title">{{ !empty($edit_data)?'Edit':'Add' }} Course Content
                    </h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="frm_add" method="post" action="{{url('admin/syllabus/add_update')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="TXTID" value="{{!empty($edit_data)?$edit_data[0]->id:''}}">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Course</label>
                            <select class="form-control select2" name="course_id">
                                <option selected>Select Course</option>
                                @foreach($course_data as $value)
                                <option value="{{$value->course_id}}"
                                    <?php echo !empty($edit_data) ? $edit_data[0]->course_id == $value->course_id ? 'Selected' : '' : ''; ?>>
                                    {{$value->course_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @if(empty($edit_data))
                        <table class="table table-bordered" id="dynamic_field">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">title</label>
                                        <input type="text" class="form-control title_list" name="title[]" value="">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Content</label>
                                        <textarea id="editor1" class="textarea content_list" name="content[]"
                                            placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        </textarea>
                                    </div>
                                </td>

                                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                </td>
                            </tr>
                        </table>
                        @elseif(!empty($edit_data))
                        <div class="form-group">
                            <label for="exampleInputEmail1">title</label>
                            <input type="text" class="form-control" name="title"
                                value="{{!empty($edit_data)?$edit_data[0]->title:''}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content</label>
                            <textarea id="editor1" class="textarea" name="content" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            {{!empty($edit_data)?$edit_data[0]->content:''}}
                            </textarea>
                        </div>
                        @endif
                        <div class="box-footer">
                            <button type="submit" id="submit"
                                class="btn btn-primary">{{!empty($edit_data)?"Update":"Submit"}}</button>
                            <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-->

    </div>
    <!-- ./row -->
</section>
<!-- /.content -->


@endsection

@section('script')
<script>
$(function() {
    // $('.select2').select2()
    CKEDITOR.replace('editor1');

    var i = 1;
    $('#add').click(function() {
        i++;
        var app = '<tr id="row' + i + '"><td>';
        app +=
            '<div class="form-group"><label for="exampleInputEmail1">title</label><input type="text" class="form-control title_list" name="title[]" value=""></div></td>';
        app +=
            '<td><div class="form-group"><label for="exampleInputEmail1">Content</label><textarea id="editor' +
            i +
            '" class="textarea content_list" name="content[]" placeholder="Place some text here"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></div></td>';
        app += '<td> <button type="button" name ="remove" id ="' + i +
            '"class="btn btn-danger btn_remove">X</button></td></tr>';

        $('#dynamic_field').append(app);

        CKEDITOR.replace("editor" + i);
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
})
</script>
<script>
$(document).ready(function() {
    var SITEURL = "{{ json_encode(url('')) }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /* $('#submit').click(function() {
        $.ajax({
            url: "{{url('admin/syllabus/add_update')}}",
            method: "POST",
            data: $('#frm_add').serialize(),
            success: function(data) {
                alert(data);
                $('#frm_add')[0].reset();
            }
        });
    }); */
    $('#frm_add').on('submit', function(e) {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
            CKEDITOR.instances[instance].setData('');
        }
        e.preventDefault();
        alert('clicked');
        var $this = $(this);
        $.ajax({
            type: $this.attr('method'),
            url: $this.attr('action'),
            data: $this.serializeArray(),
            dataType: $this.data('type'),
            success: function(response) {
                console.log(response);
                if (response['success'] == true) {
                    // $('.checklogin').css('display', 'none');
                    /* toastr.success(response['message'],
                        'Success', {
                            timeOut: 5000
                        }); */
                    /*  */
                    alert(response['message']);
                    $('#frm_add')[0].reset();
                } else if (response['success'] == false) {
                    /* toastr.error(response['message'],
                        'Failed', {
                            timeOut: 5000
                        }) */
                    alert(response['message']);
                }
            },
            error: function(jqXHR) {
                var response = $.parseJSON(jqXHR.responseText);
                console.log(response);
                /* if (response.message) {
                    alert(response.message);
                } */
            }
        });
    });
});
</script>
@endsection