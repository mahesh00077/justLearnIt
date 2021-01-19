<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Model\Admin\RegisteredCourseInfo;

class EnrollController extends Controller
{
    //
    public function index(Request $request)
    {
        $uid = Session::get('UID');
        $info['uid'] = $uid;
        $info['course_id'] = $request->course_id;
        $info['schedule_id'] = $request->schedule_id;
        $info['status'] = '1';
        $info['created_at'] = date('Y-m-d H:i:s');
        $info['updated_at'] = null;
        $result = RegisteredCourseInfo::create($info);
        if (!empty($result)) {
            return  redirect()
                ->back()
                ->with('success', 'Successfully enrolled ' . $request->course_name . ' course');
        } else {
            return  redirect()
                ->back()
                ->with('error', 'Failed to enroll!');
        }
    }
    public function register(Request $request)
    {
        // echo "register";
        return view('front_end.signUp');
    }
    public function registerAction(Request $request)
    {
        // dd($request->all());
        $name = $request->name ? $request->name : '';
        $email = $request->email ? $request->email : '';
        $mobile_no = $request->mobile_no ? $request->mobile_no : '';
        $username = $request->username ? $request->username : '';
        $password = $request->password ? crypt($request->password, 'root') : '';
        // $cpassword = $request->cpassword ? crypt($request->cpassword, 'root') : '';
        if ($request->password == $request->cpassword) {
            $values = array(
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'mobile_no' => $mobile_no,
                'password' => $password,
                'status' => '1',
                'role' => '3'
            );
            $result = DB::table('users')->insert($values);
            if (!empty($result)) {
                return redirect('signIn')
                    ->with('success', 'Registered Successfully!');
            } else {
                return redirect('signUp')
                    ->with('error', 'Failed to register!');
            }
        } else {
            return redirect('signUp')
                ->with('error', 'Password not matched!');
        }
    }
    public function login($id = null)
    {
        // echo "login";
        if (!empty($id)) {

            return view('front_end.signIn', ["id" => $id]);
        }
        return view('front_end.signIn');
    }
    public function loginAction(Request $request)
    {
        $username = $request->username ? $request->username : '';
        $password = $request->password ? crypt($request->password, 'root') : '';
        // die;
        $users = DB::table('users')
            ->select('uid', 'username', 'email', 'name', 'mobile_no', 'role', 'status')
            ->where('password', $password)
            ->where('username', $username)
            ->where('status', '<>', 0)
            ->where('role', '3')
            ->get();

        // dd($users->uesrname);
        $data = collect($users)->map(function ($x) {
            return (array) $x;
        })->toArray();
        // print_r($data[0]['username']);
        // die;
        if (!empty($data)) {
            if ($data[0]['status'] == '0') {
                return redirect('signIn')
                    ->with('error', 'user is inactive!');
            } else {
                $request->session()->put('UID', $data[0]['uid']);
                $request->session()->put('NAME', $data[0]['name']);
                $request->session()->put('UEMAIL-ID', $data[0]['email']);
                $request->session()->put('Mobile_no', $data[0]['mobile_no']);
                $request->session()->put('USERNAME', $data[0]['username']);
                $request->session()->put('UROLE', $data[0]['role']);
                $request->session()->put('USTATUS', $data[0]['status']);

                if (!empty($request->c_id)) {
                    return  redirect('course' . '/' . $request->c_id)
                        ->with('success', 'logged in successful!');
                } else {
                    return  redirect('/')
                        ->with('success', 'logged in successful!');
                }
            }
        } else {
            return redirect('signIn')
                ->with('error', 'Invalid Username or password!');
        }
    }
    public function signOut(Request $request)
    {
        /* Auth::logout(); */
        $request->session()->flush();
        $request->session()->regenerate();

        // return redirect('/');
        return redirect('/')
            ->with('success', 'successfully logged out!');
    }
}