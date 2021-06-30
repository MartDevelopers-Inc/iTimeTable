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

$id  = $_SESSION['id'];
$ret = "SELECT * FROM `ezanaLMS_Admins` WHERE id ='$id' ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($admin = $res->fetch_object()) {
    /* Count Unread Notifications */
    $query = "SELECT COUNT(*)  FROM `ezanaLMS_Notifications` WHERE status = 'Unread' ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($unread);
    $stmt->fetch();
    $stmt->close();
    /* Has Profile Picture */
    if ($admin->profile_pic == '') {
        $url = "../public/images/no-profile.png";
    } else {
        $url = "../public/uploads/user_data/admins/$admin->profile_pic";
    }
    /*Load System Settings */
    $ret = "SELECT * FROM `ezanaLMS_Settings` ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($system_settings = $res->fetch_object()) {
        /* System Logo */
        $system_logo_url = "../public/images/$system_settings->logo"
?>
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti-bell noti-icon"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge"><?php echo $unread; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">

                            <h6 class="dropdown-item-text font-15 m-0 py-3 bg-primary text-white d-flex justify-content-between align-items-center">
                                Notifications <span class="badge badge-light badge-pill"><?php echo $unread; ?></span>
                            </h6>
                            <div class="slimscroll notification-list">
                                <!-- item-->
                                <?php
                                /* Load Notifications On Order Created */
                                $ret = "SELECT * FROM `ezanaLMS_Notifications` WHERE status = 'Unread' ORDER BY `created_at` DESC ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($notification = $res->fetch_object()) {
                                ?>
                                    <a href="notitifications" class="dropdown-item py-3">
                                        <small class="float-right text-muted pl-2"><?php echo date('d M Y g:ia', strtotime($notification->created_at)); ?></small>
                                        <div class="media">
                                            <div class="avatar-md bg-primary">
                                                <i class="la la-angle-double-right"></i> text-white"></i>
                                            </div>
                                            <div class="media-body align-self-center ml-2 text-truncate">
                                                <small class="text-muted mb-0"><?php echo  substr($notification->notification_detail, 0, 30) . "..."; ?></small>
                                            </div>
                                            <!--end media-body-->
                                        </div>
                                        <!--end media-->
                                    </a>
                                <?php
                                } ?>
                                <!--end-item-->

                            </div>
                            <!-- All-->
                            <a href="notifications" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo $url; ?>" alt="profile-user" class="rounded-circle" />
                            <span class="ml-1 nav-user-name hidden-sm"><?php echo $admin->name; ?><i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <a href="admn_dashboard">
                            <span class="responsive-logo">
                                <img src="<?php echo $system_logo_url; ?>" alt="logo-small" class="logo-sm align-self-center" height="34">
                            </span>
                        </a>
                    </li>
                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light">
                            <i data-feather="menu" class="align-self-center"></i>
                        </button>
                    </li>
                    <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" id="AllCompo" placeholder="Search..." class="form-control">
                            <a href="#"><i class="fas fa-search"></i></a>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
<?php
    }
} ?>