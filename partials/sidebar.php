<?php
/*
 * Created on Fri Jun 11 2021
 *
 * The MIT License (MIT)
 * Copyright (c) 2021 MartDevelopers Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 * TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

$ret = "SELECT * FROM `ezanaLMS_Settings` ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($system_settings = $res->fetch_object()) {
    /* System Logo */
    $system_logo_url = "../public/images/$system_settings->logo"
?>
    <div class="leftbar-tab-menu">
        <div class="main-icon-menu slimscroll-menu">
            <a href="dashboard" class="logo logo-metrica d-block text-center">
                <span>
                    <img src="<?php echo $system_logo_url; ?>" alt="logo-small" class="logo-sm">
                </span>
            </a>
            <nav class="nav">
                <a href="#Dashboard" class="nav-link active" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Dashboard">
                    <i data-feather="home" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <!--end MetricaDashboards-->

                <a href="#Faculties" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Faculties">
                    <i data-feather="briefcase" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <!--end MetricaApps-->

                <a href="#Departments" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Departments">
                    <i data-feather="airplay" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <!--end MetricaUikit-->

                <a href="#Courses" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Courses">
                    <i data-feather="archive" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <!--end MetricaPages-->

                <a href="#Modules" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Modules">
                    <i data-feather="book" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <!--end MetricaAuthentication-->
                <a href="#NonTeachingStaff" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Non Teaching Staffs">
                    <i data-feather="user" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <!--end MetricaAuthentication-->
                <a href="#TeachingStaff" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Lecturers">
                    <i data-feather="user-check" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <!--end MetricaAuthentication-->
                <a href="#Students" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Students">
                    <i data-feather="users" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <a href="#Reports" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="Reports">
                    <i data-feather="file" class="align-self-center menu-icon icon-dual"></i>
                </a>
                <a href="#SystemSettings" class="nav-link" data-toggle="tooltip-custom" data-placement="right" data-trigger="hover" title="" data-original-title="System Settings">
                    <i data-feather="sliders" class="align-self-center menu-icon icon-dual"></i>
                </a>
            </nav>
            <!--end nav-->

        </div>
        <!--end main-icon-menu-->

        <div class="main-menu-inner">
            <div class="topbar-left">
                <br><br>
            </div>
            <div class="menu-body slimscroll">
                <div id="Dashboard" class="main-icon-menu-pane active">
                    <div class="title-box">
                        <h6 class="menu-title">Dashboards</h6>
                    </div>
                    <ul class="nav active">
                        <li class="nav-item"><a class="nav-link" href="dashboard">Admin Dashboard </a></li>
                    </ul>
                </div>
                <div id="Faculties" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">Faculties</h6>
                    </div>
                    <ul class="nav metismenu">
                        <!--end nav-item-->
                        <li class="nav-item"><a class="nav-link" href="faculty_add">Add Faculty</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty_import">Bulk Import</a></li>
                        <li class="nav-item"><a class="nav-link" href="facuty_allocate_admin">Allocate Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty_school_calendar">School Calendar</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty_manage">Manage Faculties</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty_search">Advanced Search</a></li>
                    </ul>
                </div><!-- end Crypto -->

                <div id="Departments" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">Departments</h6>
                    </div>
                    <ul class="nav metismenu">
                        <!--end nav-item-->
                        <li class="nav-item"><a class="nav-link" href="dept_add">Add Department</a></li>
                        <li class="nav-item"><a class="nav-link" href="dept_import">Bulk Import</a></li>
                        <li class="nav-item"><a class="nav-link" href="dept_memos">Dept. Memos </a></li>
                        <li class="nav-item"><a class="nav-link" href="dept_notices">Dept. Notices </a></li>
                        <li class="nav-item"><a class="nav-link" href="dept_documents">Dept. Documents </a></li>
                        <li class="nav-item"><a class="nav-link" href="dept_manage">Manage Depts.</a></li>
                        <li class="nav-item"><a class="nav-link" href="dept_search">Search</a></li>
                    </ul>
                    <!--end nav-->
                </div><!-- end Others -->

                <div id="Courses" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">Courses</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="course_add">Add Course</a></li>
                        <li class="nav-item"><a class="nav-link" href="course_import">Bulk Import</a></li>
                        <li class="nav-item"><a class="nav-link" href="course_memos">Course Memos</a></li>
                        <li class="nav-item"><a class="nav-link" href="course_modules">Modules</a></li>
                        <li class="nav-item"><a class="nav-link" href="course_module_allocations">Module Allocations</a></li>
                        <li class="nav-item"><a class="nav-link" href="course_time_table">Time Table</a></li>
                        <li class="nav-item"><a class="nav-link" href="course_enrolled_students">Enrolled Students</a></li>
                        <li class="nav-item"><a class="nav-link" href="course_manage">Manage Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="course_search">Advanced Search</a></li>
                    </ul>
                </div><!-- end Pages -->
                <div id="Modules" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">Modules</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="module_add">Add Module</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_import">Bulk Import</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_notices">Notices & Memos</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_reading_materials">Reading Materials</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_class_recording">Class Recordings</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_assignments">Assignments</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_pastpapers">Past Papers</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_student_groups">Student Groups</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_groups_assignments">Groups Assignments</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_enrollments">Enrollments</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_grades">Grades</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_manage">Manage Modules</a></li>
                        <li class="nav-item"><a class="nav-link" href="module_search">Advanced Search</a></li>

                    </ul>
                </div>
                <div id="NonTeachingStaff" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">Administrators</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="admins_add">Add</a></li>
                        <li class="nav-item"><a class="nav-link" href="admins_import">Bulk Import</a></li>
                        <li class="nav-item"><a class="nav-link" href="admins_manage">Manage </a></li>
                        <li class="nav-item"><a class="nav-link" href="admins_search">Advanced Search</a></li>
                </div>
                <div id="TeachingStaff" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">Teaching Staff</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="staff_add">Add</a></li>
                        <li class="nav-item"><a class="nav-link" href="staff_import">Bulk Import</a></li>
                        <li class="nav-item"><a class="nav-link" href="staff_allocate_module">Allocate Module</a></li>
                        <li class="nav-item"><a class="nav-link" href="staff_manage">Manage</a></li>
                        <li class="nav-item"><a class="nav-link" href="staff_search">Advanced Search</a></li>
                    </ul>
                </div>
                <div id="Students" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">Students</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="student_add">Add Student</a></li>
                        <li class="nav-item"><a class="nav-link" href="student_import">Bulk Import</a></li>
                        <li class="nav-item"><a class="nav-link" href="student_enroll">Enroll </a></li>
                        <li class="nav-item"><a class="nav-link" href="student_grades">Grades</a></li>
                        <li class="nav-item"><a class="nav-link" href="student_manage">Manage Students</a></li>
                        <li class="nav-item"><a class="nav-link" href="student_search">Advanced Search</a></li>
                    </ul>
                </div>
                <div id="Reports" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">Reports</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="report_faculties">Faculties</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_departments">Departments </a></li>
                        <li class="nav-item"><a class="nav-link" href="report_courses">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_modules">Modules</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_admins">Administrators</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_lecs">Lecturers</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_students">Students</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_teaching_allocations">Teaching Allocations</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_course_enrollments">Enrollments</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_timetable">Time Table</a></li>
                        <li class="nav-item"><a class="nav-link" href="report_student_grades">Student Grades</a></li>
                    </ul>
                </div>
                <div id="SystemSettings" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">System Settings</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="settings_academic">Academic Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="settings_plugins">System Plugins</a></li>
                        <li class="nav-item"><a class="nav-link" href="settings_add">Add Functionality</a></li>
                        <li class="nav-item"><a class="nav-link" href="settings_customization">Customization</a></li>
                        <li class="nav-item"><a class="nav-link" href="settings_mailing">Mail Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="settings_export">Export Data</a></li>
                        <li class="nav-item"><a class="nav-link" href="settings_import">Import Data</a></li>
                        <li class="nav-item"><a class="nav-link" href="settings_delete">Bulk Delete</a></li>
                    </ul>
                </div>
            </div>
            <!--end menu-body-->
        </div><!-- end main-menu-inner-->
    </div>
<?php
} ?>