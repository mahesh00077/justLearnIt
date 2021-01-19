<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Content;
use App\Model\Admin\Course;
use Session;
use Response;

class CourseContentController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('CheckSession');
        $this->middleware('CheckMenuPost'); */
    }
    public function index(Request $request)
    {
        // die('a');

        $tbl_data = DB::table('syllabus_contents')
            ->select('syllabus_contents.id', 'title', 'syllabus_contents.content', 'syllabus_contents.status', 'syllabus_contents.course_id', 'course.course_name')
            ->leftjoin('course', 'syllabus_contents.course_id', '=', 'course.course_id')
            ->orderBy('syllabus_contents.id', 'desc')
            // ->where('posted_by', $request->session()->get('UID'))
            ->paginate(5);

        // dd($tbl_data);
        return view('admin.master.content_show', compact('tbl_data'));
        // return view('admin_panel.master.post');
    }
    public function addPage($id = null)
    {
        //
        // die('a');
        if (!empty($id)) {
            $edit_data = DB::table('syllabus_contents')
                ->select('syllabus_contents.id', 'title', 'syllabus_contents.content', 'syllabus_contents.course_id', 'course.course_name')
                ->leftjoin('course', 'syllabus_contents.course_id', '=', 'course.course_id')
                // ->orderBy('syllabus_contents.id', 'desc')
                ->where('syllabus_contents.id', $id)
                ->get();
        }
        // dd($edit_data);
        $course_data = DB::table('course')
            ->select('course_id', 'course_name')
            ->where('status', '1')
            ->get();

        return view('admin.master.content_add', compact('edit_data', 'course_data'));
    }
    public function add_update(Request $request)
    {
        // print_r($request->all());
        // die;
        $course_id = ($request->course_id);
        if (empty($request->TXTID)) {
            $title = count($request->title);
            $content = count($request->content);
            if ($title > 0 && $content > 0) {
                for ($i = 0; $i < $title; $i++) {

                    $course = new Content();
                    $course->course_id = $course_id;
                    $course->title = $request->title[$i];
                    $course->content = $request->content[$i];
                    $course->added_by = Session::get('UID');
                    $course->status = '1';
                    $result = $course->save();
                }
                $status = true;
                $msg = 'successfully inserted';
            } else {
                $status = false;
                $msg = 'please enter';
            }
        } else {
            // echo 'update';
            /* print_r($request->all());
            die; */
            $course = new Content();
            $course = Content::find($request->TXTID);
            $course->course_id = $request->course_id;
            $course->title = $request->title;
            $course->content = $request->content;
            $result = $course->update();
            $status = true;
            $msg = 'successfully updated';
        }
        if ($result) {
            if (empty($request->TXTID)) {
                return response([
                    'success' => $status,
                    'message' => $msg
                ]);
            } else {
                // header('location: admin/syllabus');
                return response([
                    'success' => $status,
                    'message' => $msg
                ]);
            }
        } else {
            return response([
                'success' => false,
                'message' => 'Something wrong, Please try again later..'
            ]);
        }
    }
    public function add_update1(Request $request)
    {
        //
        // dd($request->all());
        $msg = '';
        if (empty($request->TXTID)) {
            $course = new Content();
            $course->course_id = $request->course_id;
            $course->title = $request->title;
            $course->content = $request->content;
            $course->added_by = Session::get('UID');
            $course->status = '1';
            $data = $course->save();
            $msg = 'inserted';
        } else {
            $course = new Content();
            $course = Content::find($request->TXTID);
            $course->course_id = $request->course_id;
            $course->title = $request->title;
            $course->content = $request->content;
            $data = $course->update();
            $msg = 'updated';
        }
        if ($data) {
            return redirect('admin/syllabus')
                ->with('success', 'successfully ' . $msg);
        } else {
            return redirect('admin/syllabus')
                ->with('success', 'Failed to ' . $msg);
        }
    }
    public function change_status($id = null, $status_value = null)
    {
        $course = Content::find($id);
        $course->status = $status_value;
        $result = $course->update();

        if ($result) {
            return redirect('admin/syllabus')
                ->with('success', 'status changed successfully!');
        } else {
            return redirect('admin/syllabus')
                ->with('error', 'Failed to change status!');
        }
    }
    public function destroy($id)
    {
        //
        $cat = Content::find($id);
        // $cat->status=$status;
        $result = $cat->delete();

        if ($result) {
            return redirect('admin/syllabus')
                ->with('success', 'record deleted successfully!');
        } else {
            return redirect('admin/syllabus')
                ->with('error', 'Failed to delete record!');
        }
    }
}