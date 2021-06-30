<?php
/*
 * Created on Wed Jun 30 2021
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
require_once('../partials/analytics.php');
check_login();
require_once('../partials/head.php');

?>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <?php require_once('../partials/topbar.php'); ?>
        <!-- end topbar-main -->
    </header>
    <!-- End Navigation Bar-->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Faculties</h6>
                        <h2 class="m-b-20" data-plugin="counterup"><?php echo $faculties; ?></h2>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Departments</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?php echo $departments; ?></span></h2>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Courses</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?php echo $courses; ?></span></h2>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Units</h6>
                        <h2 class="m-b-20" data-plugin="counterup"><?php echo $courses; ?></h2>
                    </div>
                </div>
            </div>

        </div> <!-- container -->

        <!-- Footer -->
        <?php require_once('../partials/footer.php'); ?>
        <!-- End Footer -->

    </div> <!-- End wrapper -->


    <!-- jQuery  -->
    <?php require_once('../partials/scripts.php'); ?>

</body>

</html>