<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Schedule;
use App\Model\Admin\ScheduleClass;
use App\Model\Admin\Course;

class ScheduleController extends Controller
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
            $edit_data = Schedule::find($id);
        }
        $schedule_data = Schedule::orderBy('schedule_id', 'desc')->paginate(10);

        return view('admin.master.schedule', compact('edit_data', 'schedule_data'));
    }
    public function add_update(Request $request)
    {
        $msg = '';
        if (empty($request->TXTID)) {
            $schedule = new Schedule();
            $schedule->time_from = $request->time_from;
            $schedule->time_to = $request->time_to;
            $schedule->status = '1';
            $schedule->added_by = $request->session()->get('UID');
            // $schedule->added_by = '1';

            $data = $schedule->save();
            $msg = 'inserted';
        } else {
            $schedule = new Schedule();
            $schedule = Schedule::find($request->TXTID);
            $schedule->time_from = $request->time_from;
            $schedule->time_to = $request->time_to;

            $data = $schedule->update();
            $msg = 'updated';
        }
        if ($data) {
            return redirect('admin/schedule')
                ->with('success', 'successfully ' . $msg);
        } else {
            return redirect('admin/schedule')
                ->with('success', 'Failed to ' . $msg);
        }
    }
    public function change_status($id = null, $status_value = null)
    {
        $schedule = Schedule::find($id);
        $schedule->status = $status_value;
        $result = $schedule->update();

        if ($result) {
            return redirect('admin/schedule')
                ->with('success', 'status changed successfully!');
        } else {
            return redirect('admin/schedule')
                ->with('error', 'Failed to change status!');
        }
    }

    public function destroy($id)
    {
        //
        $schedule = Schedule::find($id);
        // $schedule->status=$status;
        $result = $schedule->delete();

        if ($result) {
            return redirect('admin/schedule')
                ->with('success', 'record deleted successfully!');
        } else {
            return redirect('admin/schedule')
                ->with('error', 'Failed to delete record!');
        }
    }
    public function setSchedulePage($id = null)
    {
        if (!empty($id)) {
            $edit_data = ScheduleClass::find($id);
        }
        $course_data = Course::orderBy('course_id', 'asc')->get();
        $schedule_data = Schedule::orderBy('schedule_id', 'asc')->get();
        $set_schedule_data = DB::table('schedule_class')
            ->select('schedule_class.id', 'schedule_class.schedule_id', 'course.course_name', 'schedule_class.status', 'course.course_id')
            ->leftjoin('course', 'schedule_class.course_id', '=', 'course.course_id')
            // ->where('schedule_class.status', '1')
            ->orderBy('schedule_class.id', 'desc')
            ->paginate(10);
        // dd($set_schedule_data);
        return view('admin.master.set_schedule', compact('course_data', 'schedule_data', 'set_schedule_data', 'edit_data'));
    }
    public function sc_add_update(Request $request)
    {
        // dd($request->all());
        $course_id = $request->course_id;
        $schedule_ids = implode(',', $request->schedule_ids);
        $msg = '';
        if (empty($request->TXTID)) {
            $scheduleClass = new ScheduleClass();
            $scheduleClass->course_id = $course_id;
            $scheduleClass->schedule_id = $schedule_ids;
            $scheduleClass->status = '1';
            $data = $scheduleClass->save();
            $msg = 'Added';
        } else {
            $scheduleClass = new ScheduleClass();
            $scheduleClass = ScheduleClass::find($request->TXTID);
            $scheduleClass->course_id = $course_id;
            $scheduleClass->schedule_id = $schedule_ids;
            $data = $scheduleClass->update();
            $msg = 'updated';
        }
        if ($data) {
            return redirect('admin/set_schedule')
                ->with('success', 'successfully ' . $msg);
        } else {
            return redirect('admin/set_schedule')
                ->with('success', 'Failed to ' . $msg);
        }
    }
    public function change_status1($id = null, $status_value = null)
    {
        $schedule = ScheduleClass::find($id);
        $schedule->status = $status_value;
        $result = $schedule->update();

        if ($result) {
            return redirect('admin/set_schedule')
                ->with('success', 'status changed successfully!');
        } else {
            return redirect('admin/set_schedule')
                ->with('error', 'Failed to change status!');
        }
    }
    public function destroy1($id)
    {
        //
        $schedule = ScheduleClass::find($id);
        // $schedule->status=$status;
        $result = $schedule->delete();

        if ($result) {
            return redirect('admin/set_schedule')
                ->with('success', 'record deleted successfully!');
        } else {
            return redirect('admin/set_schedule')
                ->with('error', 'Failed to delete record!');
        }
    }
}