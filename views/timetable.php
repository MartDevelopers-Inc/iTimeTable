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

/* Add TT */
if (isset($_POST['add_tt'])) {
    $error = 0;
    if (isset($_POST['Timetable_Unit_id']) && !empty($_POST['Timetable_Unit_id'])) {
        $Timetable_Unit_id = mysqli_real_escape_string($mysqli, trim($_POST['Timetable_Unit_id']));
    } else {
        $error = 1;
        $err = "Unit ID Cannot Be Empty";
    }

    if (isset($_POST['Timetable_Year_id']) && !empty($_POST['Timetable_Year_id'])) {
        $Timetable_Year_id = mysqli_real_escape_string($mysqli, trim($_POST['Timetable_Year_id']));
    } else {
        $error = 1;
        $err = "Year ID  Cannot Be Empty";
    }

    if (isset($_POST['Timetable_Semester_id']) && !empty($_POST['Timetable_Semester_id'])) {
        $Timetable_Semester_id = mysqli_real_escape_string($mysqli, trim($_POST['Timetable_Semester_id']));
    } else {
        $error = 1;
        $err = "Semester ID  Cannot Be Empty";
    }

    if (isset($_POST['Timetable_Lecturer_id']) && !empty($_POST['Timetable_Lecturer_id'])) {
        $Timetable_Lecturer_id = mysqli_real_escape_string($mysqli, trim($_POST['Timetable_Lecturer_id']));
    } else {
        $error = 1;
        $err = "Lecturer ID Cannot Be Empty";
    }

    if (isset($_POST['Timetable_Time_id']) && !empty($_POST['Timetable_Time_id'])) {
        $Timetable_Time_id = mysqli_real_escape_string($mysqli, trim($_POST['Timetable_Time_id']));
    } else {
        $error = 1;
        $err = "Timetable Time ID Cannot Be Empty";
    }

    if (isset($_POST['Timetable_Room_id']) && !empty($_POST['Timetable_Room_id'])) {
        $Timetable_Room_id = mysqli_real_escape_string($mysqli, trim($_POST['Timetable_Room_id']));
    } else {
        $error = 1;
        $err = "Room  ID Cannot Be Empty";
    }

    if (!$error) {
        /* Prevent Duplicates */
        $sql = "SELECT * FROM  Timetable WHERE  Timetable_Unit_id='$Timetable_Unit_id' AND  Timetable_Time_id = '$Timetable_Time_id' AND Timetable_Room_id = '$Timetable_Room_id'  ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($Timetable_Unit_id == $row['Timetable_Unit_id'] && $Timetable_Time_id = $row['Timetable_Time_id'] &&  $Timetable_Room_id = $row['Timetable_Room_id']) {
                $err =  "Unit Already Added In The Time Table";
            } else {
                $err =  "Room And Time Already Assigned Class";
            }
        } else {
            $query = "INSERT INTO Timetable (Timetable_Unit_id, Timetable_Year_id, Timetable_Semester_id, Timetable_Lecturer_id, Timetable_Time_id, Timetable_Room_id) VALUES(?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ssssss', $Timetable_Unit_id, $Timetable_Year_id, $Timetable_Semester_id, $Timetable_Lecturer_id, $Timetable_Time_id, $Timetable_Room_id);
            $stmt->execute();
            if ($stmt) {
                $success = "Unit Added In Time Table";
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}


/* Delete Room */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM Timetable WHERE Timetable_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=timetable");
    } else {
        $info = "Please Try Again Or Try Later";
    }
}

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
                            <button type="button" data-toggle="modal" data-target="#add" class="btn btn-custom dropdown-toggle waves-effect waves-light">Add Unit To Time Table<span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Time Table</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Add Modal -->
            <div class="modal fade" id="add" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Unit To Time Table</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Unit Name</label>
                                        <select class="form-control" id="UnitName" onchange="GetUnitDetails(this.value)">
                                            <option>Select Unit Name</option>
                                            <?php
                                            $ret = "SELECT * FROM `Unit` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($courses = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $courses->Unit_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="Timetable_Unit_id" id="UnitId">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Academic Year Name</label>
                                        <select class="form-control" id="YearName" onchange="GetYearDetails(this.value)">
                                            <option>Select Academic Year</option>
                                            <?php
                                            $ret = "SELECT * FROM `Year` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($year = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $year->Year_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="Timetable_Year_id" id="YearID">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Semester Name</label>
                                        <select class="form-control" id="SemesterName" onchange="GetSemesterDetails(this.value)">
                                            <option>Select Semester Name</option>
                                            <?php
                                            $ret = "SELECT * FROM `Semester` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($sem = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $sem->Semester_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="Timetable_Semester_id" id="SemesterID">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Lecturer Name</label>
                                        <select class="form-control" id="LectuerName" onchange="GetLectureDetails(this.value)">
                                            <option>Select Lecturer Name</option>
                                            <?php
                                            $ret = "SELECT * FROM `Lecturer` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($lec = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $lec->Lecturer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="Timetable_Lecturer_id" id="LecturerId">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Time </label>
                                        <select class="form-control" id="TimeName" onchange="GetTimeDetails(this.value)">
                                            <option>Select Class Time</option>
                                            <?php
                                            $ret = "SELECT * FROM `Time` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($time = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $time->Time_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="Timetable_Time_id" id="TimeId">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Room Name</label>
                                        <select class="form-control" id="RoomName" onchange="GetRoomDetails(this.value)">
                                            <option>Select Room Name</option>
                                            <?php
                                            $ret = "SELECT * FROM `Room` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($room = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $room->Room_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="Timetable_Room_id" id="RoomID">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" name="add_tt" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Modal -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table class="table table-bordered dt-responsive wrap">
                            <thead>
                                <tr>
                                    <th>Academic Year</th>
                                    <th>Semester</th>
                                    <th>Unit Name</th>
                                    <th>Lecturer Details</th>
                                    <th>Class Time</th>
                                    <th>Room Details</th>
                                    <th>Manage</th>
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
                                        <td>
                                            <?php
                                            if ($_SESSION['Login_Rank'] == 'Administrator') {
                                                /* Allow User To Delete And Update Faculty */
                                                echo
                                                "<a href='timetable?delete=$time_table->Timetable_id'  class='badge badge-danger'><i class ='fa fa-trash'></i> Delete</a>
                                                    ";
                                            } else {
                                                /* Nothing */
                                            }
                                            ?>
                                        </td>
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