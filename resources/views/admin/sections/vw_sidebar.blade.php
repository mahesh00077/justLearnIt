  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">


          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>
              @if(request()->session()->get('POST')=='1' || request()->session()->get('CAT')=='1' ||
              request()->session()->get('TAG')=='1' )
              <li class="treeview {{ request()->is('admin') ? 'active' : '' }}">
                  <a href="#">
                      <i class="fa fa-dashboard"></i> <span>Blog</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      @if(request()->session()->get('POST')=='1')
                      <li class="{{ request()->is('admin/post') ? 'active' : '' }}"><a href="{{url('admin/post')}}"><i
                                  class="fa fa-circle-o"></i>Post</a></li>
                      @endif
                      @if(request()->session()->get('CAT')=='1')
                      <li class="{{ request()->is('admin/category') ? 'active' : '' }}"><a
                              href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i>Categories</a>
                      </li>
                      @endif
                      @if(request()->session()->get('TAG')=='1')
                      <li class="{{ request()->is('admin/tag') ? 'active' : '' }}"><a href="{{url('admin/tag')}}"><i
                                  class="fa fa-circle-o"></i>Tags</a></li>
                      @endif

                  </ul>
              </li>
              @endif
              @if(request()->session()->get('USERS')=='1')
              <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
                  <a href="{{url('admin/users')}}">
                      <i class="fa fa-users"></i> <span>Users</span>
                  </a>
              </li>

              @endif
              @if(Session::get('UROLE')=='3')
              <li class="{{ request()->is('admin/std_course') ? 'active' : '' }}">
                  <a href="{{url('admin/std_course')}}">
                      <i class="fa fa-envelope"></i> <span>Your Courses</span>
                  </a>
              </li>
              <li class="{{ request()->is('users/helpdesk/') ? 'active' : '' }}">
                  <a href="{{url('users/helpdesk/')}}">
                      <i class="fa fa-envelope"></i> <span>Create Ticket</span>
                  </a>
              </li>
              @else
              <li class="{{ request()->is('admin/course') ? 'active' : '' }}">
                  <a href="{{url('admin/course')}}">
                      <i class="fa fa-envelope"></i> <span>Add Course</span>
                  </a>
              </li>
              <li class="{{ request()->is('admin/syllabus') ? 'active' : '' }}">
                  <a href="{{url('admin/syllabus')}}">
                      <i class="fa fa-envelope"></i> <span>Add Syllabus For Course</span>
                  </a>
              </li>
              <li class="{{ request()->is('admin/schedule') ? 'active' : '' }}">
                  <a href="{{url('admin/schedule')}}">
                      <i class="fa fa-file-excel-o"></i> <span>Add Schedules</span>
                  </a>
              </li>
              <li class="{{ request()->is('admin/set_schedule') ? 'active' : '' }}">
                  <a href="{{url('admin/set_schedule')}}">
                      <i class="fa fa-file-excel-o"></i> <span>Set Schedule Class for course</span>
                  </a>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-dashboard"></i> <span>Reports</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="{{ request()->is('admin/course_report') ? 'active' : '' }}"><a
                              href="{{url('admin/course_report')}}"><i class="fa fa-circle-o"></i>Courses Report</a>
                      </li>
                      <li class="{{ request()->is('admin/reg/students') ? 'active' : '' }}"><a
                              href="{{url('admin/reg/students')}}"><i class="fa fa-circle-o"></i>Registered Student
                              Reports</a>
                      </li>
                      <li class="{{ request()->is('admin/course_wise/daily') ? 'active' : '' }}"><a
                              href="{{url('admin/course_wise/daily')}}"><i class="fa fa-circle-o"></i>Daily Report</a>
                      </li>
                      <li class="{{ request()->is('admin/course_wise/weekly') ? 'active' : '' }}"><a
                              href="{{url('admin/course_wise/weekly')}}"><i class="fa fa-circle-o"></i>Weekly Report</a>
                      </li>

                  </ul>
              <li class="{{ request()->is('admin/helpdesk') ? 'active' : '' }}"><a href="{{url('admin/helpdesk')}}"><i
                          class="fa fa-circle-o"></i>Help Desk</a>
              </li>
              </li>
              @endif





          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">