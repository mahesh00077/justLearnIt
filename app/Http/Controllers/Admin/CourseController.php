<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Course;
use Session;


class CourseController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('CheckSession');
        $this->middleware('CheckMenuCategory'); */
    }
    public function index($id = null)
    {
        //
        if (!empty($id)) {
            $edit_data = Course::find($id);
        }
        $course_data = Course::orderBy('course_id', 'desc')->paginate(10);

        return view('admin.master.course', compact('edit_data', 'course_data'));
    }
    public function add_update(Request $request)
    {
        $msg = '';
        if (empty($request->TXTID)) {
            $course = new Course();
            $course->course_name = $request->course_name;
            $course->duration = $request->duration;
            $course->price = $request->price;
            $course->overview = $request->overview;
            $course->status = '1';
            // $course->added_by = $request->session()->get('1');
            $course->added_by = '1';

            $data = $course->save();
            $msg = 'inserted';
        } else {
            $course = new Course();
            $course = Course::find($request->TXTID);
            $course->course_name = $request->course_name;
            $course->duration = $request->duration;
            $course->price = $request->price;
            $course->overview = $request->overview;

            $data = $course->update();
            $msg = 'updated';
        }
        if ($data) {
            return redirect('admin/course')
                ->with('success', 'successfully ' . $msg);
        } else {
            return redirect('admin/course')
                ->with('success', 'Failed to ' . $msg);
        }
    }
    public function change_status($id = null, $status_value = null)
    {
        $course = Course::find($id);
        $course->status = $status_value;
        $result = $course->update();

        if ($result) {
            return redirect('admin/course')
                ->with('success', 'status changed successfully!');
        } else {
            return redirect('admin/course')
                ->with('error', 'Failed to change status!');
        }
    }
    public function destroy($id)
    {
        //
        $cat = Course::find($id);
        // $cat->status=$status;
        $result = $cat->delete();

        if ($result) {
            return redirect('admin/course')
                ->with('success', 'record deleted successfully!');
        } else {
            return redirect('admin/course')
                ->with('error', 'Failed to delete record!');
        }
    }
    public function stdCourses()
    {
        # code...
        $uid = Session::get('UID');
        $course_data = DB::table('registered_course_info')
            ->select('registered_course_info.id', 'registered_course_info.course_id', 'registered_course_info.schedule_id', 'course.*', 'schedule.time_from', 'schedule.time_to')
            ->leftjoin('course', 'course.course_id', '=', 'registered_course_info.course_id')
            ->leftjoin('schedule', 'schedule.schedule_id', '=', 'registered_course_info.schedule_id')
            ->where('registered_course_info.uid', $uid)
            ->where('registered_course_info.status', '<>', 0)
            ->paginate(5);
        // dd($course_data);
        return view('admin.master.std_course_page', compact('course_data'));
    }
}