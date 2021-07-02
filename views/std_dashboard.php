<?php
/*
 * Created on Fri Jul 02 2021
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

session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
check_login();
require_once('../partials/head.php');
?>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <?php require_once('../partials/topbar.php'); ?>

    </header>
    <!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right m-t-15">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

           


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="export-data-table" class="table-bordered dt-responsive wrap">
                            <thead>
                                <tr>
                                    <th>Academic Year</th>
                                    <th>Semester</th>
                                    <th>Unit Name</th>
                                    <th>Lecturer Details</th>
                                    <th>Class Time</th>
                                    <th>Room Details</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $ret = "SELECT Timetable.Timetable_id, Year.Year_name, Semester.Semester_name, Unit.Unit_name, Lecturer.Lecturer_name, Lecturer.Lecturer_email, Lecturer.Lecturer_Mobile_Number, Time.Time_name, Room.Room_name FROM Timetable LEFT JOIN Year ON Timetable.Timetable_Year_id LEFT JOIN Semester ON Timetable.Timetable_Semester_id LEFT JOIN Unit ON Timetable.Timetable_Unit_id LEFT JOIN Lecturer ON Timetable.Timetable_Lecturer_id LEFT JOIN  Time ON Timetable.Timetable_Time_id LEFT JOIN Room ON  Timetable.Timetable_Room_id
                                WHERE Timetable.Timetable_Year_id = Year.Year_id AND Timetable.Timetable_Semester_id = Semester.Semester_id AND Timetable.Timetable_Unit_id = Unit.Unit_id AND Timetable.Timetable_Lecturer_id = Lecturer.Lecturer_id AND Timetable.Timetable_Time_id = Time.Time_id AND Timetable.Timetable_Room_id = Room.Room_id;
                                ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($time_table = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $time_table->Year_name; ?></td>
                                        <td><?php echo $time_table->Semester_name; ?></td>
                                        <td><?php echo $time_table->Unit_name; ?></td>
                                        <td><?php echo "Name: " . $time_table->Lecturer_name . "<br> Email: " . $time_table->Lecturer_email . "<br>Phone No: " . $time_table->Lecturer_Mobile_Number; ?></td>
                                        <td><?php echo $time_table->Time_name; ?></td>
                                        <td><?php echo $time_table->Room_name; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php require_once('../partials/footer.php'); ?>
            <!-- End Footer -->

        </div>
        <!-- Scripts -->
        <?php require_once('../partials/scripts.php'); ?>

</body>

</html>