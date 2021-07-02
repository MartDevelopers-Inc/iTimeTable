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
check_login();

/* Update Profile */
if (isset($_POST['Update_Profile'])) {

    $Login_username = $_POST['Login_username'];
    $Login_Rank = $_POST['Login_Rank'];
    $Login_password = sha1(md5($_POST['Login_password']));
    $Login_id = $_SESSION['Login_id'];

    $query = "UPDATE Login SET Login_username = ?, Login_Rank = ?, Login_password = ? WHERE Login_id = '$Login_id' ";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sss', $Login_username,  $Login_Rank, $Login_password);
    $stmt->execute();
    if ($stmt) {

        $success = "Profile Updated";
    } else {
        $err = "Failed, Try Again Or Later";
    }
}
require_once('../partials/head.php');
?>


<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <?php require_once('../partials/topbar.php');
        $Login_id = $_SESSION['Login_id'];
        $ret = "SELECT * FROM  Login WHERE Login_id = '$Login_id'";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($user = $res->fetch_object()) {
        ?>
    </header>
    <!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title"><?php echo $user->Login_username; ?> Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">User Name</label>
                                        <input type="text" value="<?php echo $user->Login_username; ?>" name="Login_username" class="form-control">
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="Login_password" class="form-control" placeholder="Password">
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="exampleSelect1">Login Rank</label>
                                        <select class="form-control" name="Login_Rank" id="exampleSelect1">
                                            <option>Administrator</option>
                                            <option>Staff</option>
                                        </select>
                                    </fieldset>
                                    <button type="submit" name="Update_Profile" class="btn btn-primary">Submit</button>
                                </form>
                            </div><!-- end col -->

                        </div><!-- end row -->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->


        <!-- Footer -->
        <?php require_once('../partials/footer.php'); ?>
        <!-- End Footer -->


    </div>

<?php
        }
        require_once('../partials/scripts.php'); ?>

</body>

</html>