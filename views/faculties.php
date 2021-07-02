<?php
/*
 * Created on Thu Jul 01 2021
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
/* Add Faculty */
if (isset($_POST['add_faculty'])) {
    $error = 0;
    if (isset($_POST['Faculty_name']) && !empty($_POST['Faculty_name'])) {
        $Faculty_name = mysqli_real_escape_string($mysqli, trim($_POST['Faculty_name']));
    } else {
        $error = 1;
        $err = "Faculty Name Cannot Be Empty";
    }
    if (isset($_POST['Faculty_desc']) && !empty($_POST['Faculty_desc'])) {
        $Faculty_desc = $_POST['Faculty_desc'];
    } else {
        $error = 1;
        $err = "Faculty Detailt Cannot Be Empty";
    }

    if (!$error) {
        //prevent Double entries
        $sql = "SELECT * FROM  Faculty WHERE  Faculty_name='$Faculty_name' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($Faculty_name == $row['Faculty_name']) {
                $err =  "$Faculty_name Already Exists";
            }
        } else {
            /* Persist Changes In Database */
            $query = "INSERT INTO Faculty (Faculty_name, Faculty_desc) VALUES(?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ss', $Faculty_name, $Faculty_desc);
            $stmt->execute();
            if ($stmt) {
                $success = "$Faculty_name Added";
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}
/* Update Faculty */

/* Delete Faculty */

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
                            <button type="button" data-toggle="modal" data-target="#AddFaculty" class="btn btn-custom dropdown-toggle waves-effect waves-light">Add Faculty <span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Faculties</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Add Modal -->
            <div class="modal fade" id="AddFaculty" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Faculty</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Faculty Name</label>
                                    <input type="text" name="Faculty_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Faculty Name</label>
                                    <textarea name="Faculty_desc" class="form-control" required rows="5"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="add_faculty" class="btn btn-primary">Submit</button>
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
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Faculty Name</th>
                                    <th>Faculty Details</th>
                                    <th>Manage Faculty</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $ret = "SELECT * FROM `Faculty` ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($faculty = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $faculty->Faculty_name; ?></td>
                                        <td><small><?php echo $faculty->Faculty_desc; ?></small></td>
                                        <td>
                                            <?php
                                            if ($_SESSION['Login_Rank'] == 'Administrator') {
                                                /* Allow User To Delete And Update Faculty */
                                                echo
                                                "
                                                        <a href='#update-$faculty->Faculty_id' data-toggle='modal' class='badge badge-warning'><i class ='fas fa-edit'></i> Update</a>
                                                        <a href='#delete-$faculty->Faculty_id' data-toggle='modal' class='badge badge-danger'><i class ='fas fa-trash'></i> Delete</a>

                                                    ";
                                            } else {
                                                /* Nothing */
                                            }
                                            ?>
                                            <!-- Update Modal -->

                                            <!-- End Modal -->

                                            <!-- Delete Modal -->

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


    </div> <!-- End wrapper -->
    <!-- Scripts -->
    <?php require_once('../partials/scripts.php'); ?>

</body>

</html>