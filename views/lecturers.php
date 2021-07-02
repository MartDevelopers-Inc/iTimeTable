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

/* Add Lec */
if (isset($_POST['add_lec'])) {
    $error = 0;
    if (isset($_POST['Lecturer_name']) && !empty($_POST['Lecturer_name'])) {
        $Lecturer_name = mysqli_real_escape_string($mysqli, trim($_POST['Lecturer_name']));
    } else {
        $error = 1;
        $err = "Name Cannot Be Empty";
    }
    if (isset($_POST['Lecturer_email']) && !empty($_POST['Lecturer_email'])) {
        $Lecturer_email = mysqli_real_escape_string($mysqli, trim($_POST['Lecturer_email']));
    } else {
        $error = 1;
        $err = "Email Cannot Be Empty";
    }
    if (isset($_POST['Lecturer_Mobile_Number']) && !empty($_POST['Lecturer_Mobile_Number'])) {
        $Lecturer_Mobile_Number = mysqli_real_escape_string($mysqli, trim($_POST['Lecturer_Mobile_Number']));
    } else {
        $error = 1;
        $err = "Mobile Number Cannot Be Empty";
    }
    if (!$error) {
        //prevent Double entries
        $sql = "SELECT * FROM  Lecturer WHERE  Lecturer_email='$Lecturer_email' || Lecturer_Mobile_Number = '$Lecturer_Mobile_Number'  ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($Lecturer_Mobile_Number == $row['Lecturer_Mobile_Number']) {
                $err =  "Mobile Number Already Exists";
            } else {
                $err =  "Email  Already Exists";
            }
        } else {
            $query = "INSERT INTO Lecturer (Lecturer_name, Lecturer_email, Lecturer_Mobile_Number) VALUES(?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('sss', $Lecturer_name, $Lecturer_email, $Lecturer_Mobile_Number);
            $stmt->execute();
            if ($stmt) {
                $success = "$Lecturer_name Added";
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}


/* Update Time */
if (isset($_POST['update_lec'])) {
    $error = 0;
    if (isset($_POST['Lecturer_name']) && !empty($_POST['Lecturer_name'])) {
        $Lecturer_name = mysqli_real_escape_string($mysqli, trim($_POST['Lecturer_name']));
    } else {
        $error = 1;
        $err = "Name Cannot Be Empty";
    }
    if (isset($_POST['Lecturer_email']) && !empty($_POST['Lecturer_email'])) {
        $Lecturer_email = mysqli_real_escape_string($mysqli, trim($_POST['Lecturer_email']));
    } else {
        $error = 1;
        $err = "Email Cannot Be Empty";
    }
    if (isset($_POST['Lecturer_Mobile_Number']) && !empty($_POST['Lecturer_Mobile_Number'])) {
        $Lecturer_Mobile_Number = mysqli_real_escape_string($mysqli, trim($_POST['Lecturer_Mobile_Number']));
    } else {
        $error = 1;
        $err = "Mobile Number Cannot Be Empty";
    }
    if (isset($_POST['Lecturer_id']) && !empty($_POST['Lecturer_id'])) {
        $Lecturer_id = mysqli_real_escape_string($mysqli, trim($_POST['Lecturer_id']));
    } else {
        $error = 1;
        $err = "ID Cannot Be Empty";
    }
    if (!$error) {
        $query = "UPDATE Lecturer SET Lecturer_name =?, Lecturer_email =?, Lecturer_Mobile_Number =? WHERE Lecturer_id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ssss', $Lecturer_name, $Lecturer_email, $Lecturer_Mobile_Number, $Lecturer_id);
        $stmt->execute();
        if ($stmt) {
            $success = "$Lecturer_name Updated";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}

/* Delete Year */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM Lecturer WHERE Lecturer_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=lecturers");
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
                            <button type="button" data-toggle="modal" data-target="#AddLecturer" class="btn btn-custom dropdown-toggle waves-effect waves-light">Add Lecturer<span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Lecturers</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Add Modal -->
            <div class="modal fade" id="AddLecturer" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Lecturer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="Lecturer_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email </label>
                                    <input type="text" name="Lecturer_email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile Number </label>
                                    <input type="text" name="Lecturer_Mobile_Number" class="form-control" required>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="add_lec" class="btn btn-primary">Submit</button>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $ret = "SELECT * FROM `Lecturer` ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($lec = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $lec->Lecturer_name; ?></td>
                                        <td><?php echo $lec->Lecturer_email; ?></td>
                                        <td><?php echo $lec->Lecturer_Mobile_Number; ?></td>
                                        <td>
                                            <?php
                                            if ($_SESSION['Login_Rank'] == 'Administrator') {
                                                /* Allow User To Delete And Update Faculty */
                                                echo
                                                "
                                                        <a href='#update-$lec->Lecturer_id' data-toggle='modal' class='badge badge-warning'><i class ='fa fa-edit'></i> Update</a>
                                                        <a href='lec?delete=$lec->Lecturer_id'  class='badge badge-danger'><i class ='fa fa-trash'></i> Delete</a>

                                                    ";
                                            } else {
                                                /* Nothing */
                                            }
                                            ?>
                                            <!-- Update Modal -->
                                            <div class="modal fade" id="update-<?php echo $lec->Lecturer_id; ?>" tabindex="-1">
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
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input type="text" name="Lecturer_name" value="<?php echo $lec->Lecturer_name; ?>" class="form-control" required>
                                                                    <input type="text" name="Lecturer_id" value="<?php echo $lec->Lecturer_id; ?>" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email </label>
                                                                    <input type="text" name="Lecturer_email" value="<?php echo $lec->Lecturer_email; ?>" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Mobile Number </label>
                                                                    <input type="text" name="Lecturer_Mobile_Number" value="<?php echo $lec->Lecturer_Mobile_Number; ?>" class="form-control" required>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_lec" class="btn btn-primary">Submit</button>
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