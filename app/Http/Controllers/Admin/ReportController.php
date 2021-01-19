<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session, Response, Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Yajra\DataTables\Html\Button;
use Excel;
use App\Exports\CourseExport;
use App\Exports\DailyCourseExport;
use App\Exports\WeeklyCourseExport;

class ReportController extends Controller
{

    /* =======================Course report====================== */
    public function course_report(Request $request)
    {
        $course_data = DB::table('course')->orderBy('course_id', 'desc')->paginate(10);
        // dd($course_data);
        return view('admin.reports.course_report', compact('course_data'));
    }
    public function courseReportExport()
    {

        return Excel::download(new CourseExport, 'courseReport.xlsx');
    }
    /* =======================Course wise report====================== */
    public function course_wise(Request $request)
    {
        $c_data = DB::table('course')->where('status', '1')->get();
        return view('admin.reports.course_wise', compact('c_data'));
    }
    public function course_wise_week(Request $request)
    {
        $c_data = DB::table('course')->where('status', '1')->get();
        return view('admin.reports.course_wise_weekly', compact('c_data'));
    }
    public function getCourseWiseDR(Request $request)
    {

        $daily_date = (!empty($request->daily_date)) ? ($request->daily_date) : ('');
        $courseID = (!empty($request->courseID)) ? ($request->courseID) : ('');

        $postsQuery = DB::table('registered_course_info as rci');

        if ($daily_date) {

            $daily_date = date('Y-m-d', strtotime($daily_date));

            $postsQuery->whereRaw("date(rci.created_at) = '" . $daily_date . "' ");
        }
        if ($courseID != 'all') {
            $postsQuery->where('rci.course_id', $courseID);
            $postsQuery->orWhere('course.course_id', $courseID);
        }

        // $postsQuery->where('rci.status', '1');
        $course_wise_data = $postsQuery->selectRaw('rci.id,course.course_id,rci.created_at,course.course_name,count(uid) as uid')->groupBy('course_id')
            ->rightJoin('course', 'rci.course_id', '=', 'course.course_id');
        // dd(DB::getQueryLog());
        return datatables()->of($course_wise_data)
            ->make(true);
    }
    public function getCourseWiseWR(Request $request)
    {

        $start_date = (!empty($request->start_date)) ? ($request->start_date) : ('');
        $end_date = (!empty($request->end_date)) ? ($request->end_date) : ('');
        $courseID = (!empty($request->courseID)) ? ($request->courseID) : ('');

        $postsQuery = DB::table('registered_course_info as rci');

        if ($start_date && $end_date) {

            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));

            $postsQuery->whereRaw("date(rci.created_at) >= '" . $start_date . "' AND date(rci.created_at) <= '" . $end_date . "'");
        }

        if ($courseID != 'all') {
            $postsQuery->where('rci.course_id', $courseID);
            $postsQuery->orWhere('course.course_id', $courseID);
        }

        // $postsQuery->where('rci.status', '1');
        $course_wise_data = $postsQuery->selectRaw('rci.id,course.course_id,rci.created_at,course.course_name,count(uid) as uid')->groupBy('course_id')
            ->rightJoin('course', 'rci.course_id', '=', 'course.course_id');
        // dd(DB::getQueryLog());
        return datatables()->of($course_wise_data)
            ->make(true);
    }
    public function dailyCourseReportExport(Request $request)
    {
        # code...
        $course_id = $request->course_id;
        $date = $request->date;
        $res = Excel::download(new DailyCourseExport($course_id, $date), 'DailycourseReport_' . date('Y-m-d H:i:s') . '.xlsx');
        return $res;
    }
    public function weeklyCourseReportExport(Request $request)
    {
        # code...
        $course_id = $request->course_id ? $request->course_id : '';
        $start_date = $request->start_date ? $request->start_date : '';
        $end_date = $request->end_date ? $request->end_date : '';
        // print_r($data = new WeeklyCourseExport($course_id, $start_date, $end_date));
        // die;
        return Excel::download(new WeeklyCourseExport($course_id, $start_date, $end_date), 'weeklycourseReport_' . date('Y-m-d H:i:s') . '.xlsx');
    }
    /* =======================Registered Student report====================== */
    public function reg_students(Request $request)
    {
        return view('admin.reports.reg_students');
    }
    public function studentData(Request $request)
    {

        $start_date = (!empty($request->start_date)) ? ($request->start_date) : ('');
        $end_date = (!empty($request->end_date)) ? ($request->end_date) : ('');

        $postsQuery = DB::table('users');

        if ($start_date && $end_date) {

            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));

            $postsQuery->whereRaw("date(created_at) >= '" . $start_date . "' AND date(created_at) <= '" . $end_date . "'");
        }

        // $postsQuery->where('status', '1');
        $postsQuery->where('role', '3');
        $course_wise_data = $postsQuery->selectRaw('uid,created_at,name,username,email,mobile_no,role,status');
        // dd(DB::getQueryLog());
        return datatables()->of($course_wise_data)
            ->make(true);
    }
}