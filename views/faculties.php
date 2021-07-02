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
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" >Add Faculty <span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Faculties</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Add Modal -->

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