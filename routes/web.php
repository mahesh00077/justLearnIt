<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
#frontend part
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('course/{id}', 'HomeController@openCoursePage');
    // Route::post('enroll_now', 'EnrollController@index')->middleware('checklg');
    Route::post('enroll_now', 'EnrollController@index');
    Route::get('signUp', 'EnrollController@register');
    Route::get('signOut', 'EnrollController@signOut');
    Route::get('signIn', 'EnrollController@login');
    Route::get('signIn/{id}', 'EnrollController@login');
    Route::post('signUp/action', 'EnrollController@registerAction');
    Route::post('signIn/action', 'EnrollController@loginAction');
    Route::get('about-us', 'HomeController@about');
    Route::get('contact-us', 'HomeController@contact');
    Route::post('contact/action', 'HomeController@contact_action');
});

#backend part
Route::group(['namespace' => 'Admin'], function () {
    // Dashboard Route
    Route::get('admin/dashboard', 'DashboardController@index');
    // Users Route
    Route::get('admin/users', 'UsersController@index');
    Route::get('admin/add_user', 'UsersController@create');
    Route::get('admin/add_user/{id}', 'UsersController@create');
    Route::post('admin/add_user/action', 'UsersController@user_action');
    Route::get('admin/user_del/{id}', 'UsersController@destroy');
    Route::get('admin/user_status/{id}/{status_value}', 'UsersController@change_status');

    // Student Courses Route
    Route::get('admin/std_course', 'CourseController@stdCourses');
    // Course Route
    Route::get('admin/course', 'CourseController@index');
    Route::get('admin/course/{id}', 'CourseController@index');
    Route::post('admin/course/add_update', 'CourseController@add_update');
    Route::get('admin/course_status/{id}/{status}', 'CourseController@change_status');
    Route::get('admin/course_del/{id}', 'CourseController@destroy');
    // Syllabus content Route
    Route::get('admin/syllabus', 'CourseContentController@index');
    Route::get('admin/syllabus/add', 'CourseContentController@addPage');
    Route::get('admin/syllabus/add/{id}', 'CourseContentController@addPage');
    Route::post('admin/syllabus/add_update', 'CourseContentController@add_update');
    Route::get('admin/syllabus_status/{id}/{status}', 'CourseContentController@change_status');
    Route::get('admin/syllabus_del/{id}', 'CourseContentController@destroy');
    // Schedule Route
    Route::get('admin/schedule', 'ScheduleController@index');
    Route::get('admin/schedule/{id}', 'ScheduleController@index');
    Route::post('admin/schedule/add_update', 'ScheduleController@add_update');
    Route::get('admin/schedule_status/{id}/{status}', 'ScheduleController@change_status');
    Route::get('admin/schedule_del/{id}', 'ScheduleController@destroy');
    //Set Schedule class for course Route
    Route::get('admin/set_schedule', 'ScheduleController@setSchedulePage');
    Route::get('admin/set_schedule/{id}', 'ScheduleController@setSchedulePage');
    Route::post('admin/set_schedule/add_update', 'ScheduleController@sc_add_update');
    Route::get('admin/set_schedule_status/{id}/{status}', 'ScheduleController@change_status1');
    Route::get('admin/set_schedule_del/{id}', 'ScheduleController@destroy1');
    // admin login Route
    Route::get('admin/login', 'LoginController@index')->name('login');
    Route::post('admin/login-action', 'LoginController@loginAction');
    Route::get('admin/logout', 'LoginController@logout')->name('admin-logout');
    // Reports section
    Route::get('admin/course_report', 'ReportController@course_report');
    Route::get('admin/courseReportExport', 'ReportController@courseReportExport');
    #students report
    Route::get('admin/reg/students', 'ReportController@reg_students');
    Route::get('admin/students/result', 'ReportController@studentData');
    #daily
    Route::get('admin/course_wise/daily', 'ReportController@course_wise');
    Route::get('admin/course_wise/Dresult', 'ReportController@getCourseWiseDR');
    Route::get('admin/dailyCourseReportExport', 'ReportController@dailyCourseReportExport');
    #weekly
    Route::get('admin/course_wise/weekly', 'ReportController@course_wise_week');
    Route::get('admin/course_wise/Wresult', 'ReportController@getCourseWiseWR');
    Route::get('admin/weeklyCourseReportExport', 'ReportController@weeklyCourseReportExport');
    #Help Desk
    #admin
    Route::get('admin/helpdesk', 'HelpDeskController@index');
    Route::post('admin/helpdesk/listTickets', 'HelpDeskController@listTickets');
    Route::post('admin/heldesk/getTicketDetails', 'HelpDeskController@getTicketDetails');
    Route::post('admin/heldesk/closeTicket', 'HelpDeskController@closeTicket');
    Route::post('admin/helpdesk/saveTicketReplies', 'HelpDeskController@saveTicketReplies');
    #student
    Route::get('users/helpdesk/', 'HelpDeskController@index');
    Route::post('user/helpdesk/add_ticket', 'HelpDeskController@addTicket');
    Route::get('admin/view-ticket/{ticket_id}', 'HelpDeskController@viewTicket');
});

// https://webdamn.com/build-helpdesk-system-with-php-mysql/