<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Response;
use Session;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('CheckLogin');
    }
    public function index(Request $request)
    {
        // dd(urldecode($request->data));
        /* $new_data = [];
        $data = explode(',', urldecode($request->data));
        /* var_dump(empty($data));
        die; 
        $new_data['amt'] = $data[0];
        $new_data['id'] = $data[1];
        $new_data['old_p'] = $data[2];
        $new_data['new_p'] = $data[3];
        $new_data['img'] = $data[4];
        $new_data['title'] = $data[5];
        /* print_r($new_data);
        die; */
        return view('admin.login');
    }
    public function loginAction(Request $request)
    {
        $username = $request->username ? $request->username : '';
        $password = $request->password ? crypt($request->password, 'root') : '';
        // die;
        $users = DB::table('users')
            ->select('uid', 'name', 'mobile_no', 'username', 'email', 'role', 'status')
            ->where('password', $password)
            ->where('username', $username)
            ->where('status', '<>', 0)
            ->get();

        // dd($users->uesrname);
        $data = collect($users)->map(function ($x) {
            return (array) $x;
        })->toArray();
        // print_r($data[0]['username']);
        // die;
        if (!empty($data)) {
            if ($data[0]['status'] == '0') {
                return redirect('admin-login')
                    ->with('error', 'user is inactive!');
            } else {
                $request->session()->put('UID', $data[0]['uid']);
                $request->session()->put('NAME', $data[0]['name']);
                $request->session()->put('USERNAME', $data[0]['username']);
                $request->session()->put('UEMAIL-ID', $data[0]['email']);
                $request->session()->put('Mobile_no', $data[0]['mobile_no']);
                $request->session()->put('UROLE', $data[0]['role']);
                $request->session()->put('USTATUS', $data[0]['status']);

                return redirect('admin/dashboard')
                    ->with('success', 'logged in successful!');
            }
        } else {
            return redirect('admin/login')
                ->with('error', 'Invalid Username or password!');
        }
    }
    public function logout(Request $request)
    {
        /* Auth::logout(); */
        $request->session()->flush();
        $request->session()->regenerate();

        // return redirect('/');
        return redirect('admin/login')
            ->with('success', 'successfully logged out!');
    }
}