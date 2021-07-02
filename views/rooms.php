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

/* Add Room */
if (isset($_POST['add_room'])) {
    $error = 0;
    if (isset($_POST['Room_name']) && !empty($_POST['Room_name'])) {
        $Room_name = mysqli_real_escape_string($mysqli, trim($_POST['Room_name']));
    } else {
        $error = 1;
        $err = "Name Cannot Be Empty";
    }
    if (isset($_POST['Room_desc']) && !empty($_POST['Room_desc'])) {
        $Room_desc = ($_POST['Room_desc']);
    } else {
        $error = 1;
        $err = "Room Details Cannot Be Empty";
    }
    if (isset($_POST['Room_No_floor']) && !empty($_POST['Room_No_floor'])) {
        $Room_No_floor = mysqli_real_escape_string($mysqli, trim($_POST['Room_No_floor']));
    } else {
        $error = 1;
        $err = "Room Number Floor Cannot Be Empty";
    }
    if (!$error) {
        $query = "INSERT INTO Room (Room_name, Room_desc, Room_No_floor) VALUES(?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sss', $Room_name, $Room_desc, $Room_No_floor);
        $stmt->execute();
        if ($stmt) {
            $success = "$Room_name Added";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}



/* Update Room */
if (isset($_POST['update_room'])) {
    $error = 0;
    if (isset($_POST['Room_name']) && !empty($_POST['Room_name'])) {
        $Room_name = mysqli_real_escape_string($mysqli, trim($_POST['Room_name']));
    } else {
        $error = 1;
        $err = "Name Cannot Be Empty";
    }
    if (isset($_POST['Room_desc']) && !empty($_POST['Room_desc'])) {
        $Room_desc = ($_POST['Room_desc']);
    } else {
        $error = 1;
        $err = "Room Details Cannot Be Empty";
    }
    if (isset($_POST['Room_No_floor']) && !empty($_POST['Room_No_floor'])) {
        $Room_No_floor = mysqli_real_escape_string($mysqli, trim($_POST['Room_No_floor']));
    } else {
        $error = 1;
        $err = "Room Number Floor Cannot Be Empty";
    }
    if (isset($_POST['Room_id']) && !empty($_POST['Room_id'])) {
        $Room_id = mysqli_real_escape_string($mysqli, trim($_POST['Room_id']));
    } else {
        $error = 1;
        $err = "Room ID Cannot Be Empty";
    }
    if (!$error) {
        $query = "UPDATE Room SET Room_name =?, Room_desc =?, Room_No_floor =? WHERE Room_id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ssss', $Room_name, $Room_desc, $Room_No_floor, $Room_id);
        $stmt->execute();
        if ($stmt) {
            $success = "$Room_name Updated";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}


/* Delete Room */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM Room WHERE Room_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=rooms");
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
                            <button type="button" data-toggle="modal" data-target="#Rooms" class="btn btn-custom dropdown-toggle waves-effect waves-light">Add Room<span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Rooms</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Add Modal -->
            <div class="modal fade" id="Rooms" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Room Name</label>
                                        <input type="text" name="Room_name" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Room Number Or Floor Number </label>
                                        <input type="text" name="Room_No_floor" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room Details </label>
                                    <textarea name="Room_desc" class="form-control Summernote" required rows="5"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="add_room" class="btn btn-primary">Submit</button>
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
                        <table id="datatable" class="table table-bordered dt-responsive wrap">
                            <thead>
                                <tr>
                                    <th>Room Name</th>
                                    <th>Room No / Floor No</th>
                                    <th>Room Details</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $ret = "SELECT * FROM `Room` ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($room = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $room->Room_name; ?></td>
                                        <td><?php echo $room->Room_No_floor; ?></td>
                                        <td><?php echo $room->Room_desc; ?></td>
                                        <td>
                                            <?php
                                            if ($_SESSION['Login_Rank'] == 'Administrator') {
                                                /* Allow User To Delete And Update Faculty */
                                                echo
                                                "
                                                        <a href='#update-$room->Room_id' data-toggle='modal' class='badge badge-warning'><i class ='fa fa-edit'></i> Update</a>
                                                        <a href='rooms?delete=$room->Room_id'  class='badge badge-danger'><i class ='fa fa-trash'></i> Delete</a>

                                                    ";
                                            } else {
                                                /* Nothing */
                                            }
                                            ?>
                                            <!-- Update Modal -->
                                            <div class="modal fade" id="update-<?php echo $room->Room_id; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Lec</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputEmail1">Room Name</label>
                                                                        <input type="text" name="Room_name" class="form-control" value="<?php echo $room->Room_name; ?>" required>
                                                                        <input type="hidden" name="Room_id" value="<?php echo $room->Room_id; ?>" class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputEmail1">Room Number Or Floor Number </label>
                                                                        <input type="text" name="Room_No_floor" value="<?php echo $room->Room_No_floor; ?>" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Room Details </label>
                                                                    <textarea name="Room_desc" class="form-control Summernote" required rows="5"><?php echo $room->Room_desc; ?></textarea>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_room" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- Footer -->
        <?php require_once('../partials/footer.php'); ?>
        <!-- End Footer -->

    </div>
    <!-- Scripts -->
    <?php require_once('../partials/scripts.php'); ?>

</body>

</html>