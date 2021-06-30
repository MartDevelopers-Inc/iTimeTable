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
require_once('../partials/head.php');
?>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <?php require_once('../partials/topbar.php');?>
        <!-- end topbar-main -->


        <div class="navbar-custom">
            <div class="container">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li>
                            <a href="index.html"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-format-underlined"></i> <span> User Interface </span> </a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="ui-buttons.html">Buttons</a></li>
                                        <li><a href="ui-cards.html">Cards</a></li>
                                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                        <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                        <li><a href="ui-navs.html">Navs</a></li>
                                        <li><a href="ui-progress.html">Progress</a></li>
                                        <li><a href="ui-modals.html">Modals</a></li>
                                        <li><a href="ui-alerts.html">Alerts</a></li>
                                        <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                                        <li><a href="ui-typography.html">Typography</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="ui-notification.html">Notification</a></li>
                                        <li><a href="ui-carousel.html">Carousel</a></li>
                                        <li><a href="components-grid.html">Grid</a></li>
                                        <li><a href="components-range-sliders.html">Range sliders</a></li>
                                        <li><a href="components-sweet-alert.html">Sweet Alerts</a></li>
                                        <li><a href="components-ratings.html">Ratings</a></li>
                                        <li><a href="components-treeview.html">Treeview</a></li>
                                        <li><a href="components-tour.html">Tour</a></li>
                                        <li><a href="widgets-tiles.html">Tile Box</a></li>
                                        <li><a href="widgets-charts.html">Chart Widgets</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-album"></i> <span> Icons </span> </a>
                            <ul class="submenu">
                                <li><a href="icons-materialdesign.html">Material Design</a></li>
                                <li><a href="icons-ionicons.html">Ion Icons</a></li>
                                <li><a href="icons-fontawesome.html">Font awesome</a></li>
                                <li><a href="icons-themify.html">Themify Icons</a></li>
                                <li><a href="icons-simple-line.html">Simple line Icons</a></li>
                                <li><a href="icons-weather.html">Weather Icons</a></li>
                                <li><a href="icons-pe7.html">PE7 Icons</a></li>
                                <li><a href="icons-typicons.html">Typicons</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-collection-text"></i><span> Forms </span> </a>
                            <ul class="submenu">
                                <li><a href="form-elements.html">General Elements</a></li>
                                <li><a href="form-advanced.html">Advanced Form</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-pickers.html">Form Pickers</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-mask.html">Form Masks</a></li>
                                <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                <li><a href="form-xeditable.html">X-editable</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-format-list-bulleted"></i> <span> Tables </span> </a>
                            <ul class="submenu">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Data Table</a></li>
                                <li><a href="tables-responsive.html">Responsive Table</a></li>
                                <li><a href="tables-tablesaw.html">Tablesaw</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-chart"></i><span> Charts </span> </a>
                            <ul class="submenu">
                                <li><a href="chart-flot.html">Flot Chart</a></li>
                                <li><a href="chart-morris.html">Morris Chart</a></li>
                                <li><a href="chart-chartjs.html">Chartjs</a></li>
                                <li><a href="chart-peity.html">Peity Charts</a></li>
                                <li><a href="chart-chartist.html">Chartist Charts</a></li>
                                <li><a href="chart-c3.html">C3 Charts</a></li>
                                <li><a href="chart-sparkline.html">Sparkline charts</a></li>
                                <li><a href="chart-knob.html">Jquery Knob</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-collection-item"></i> <span> Pages </span> </a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="calendar.html">Calendar</a></li>
                                        <li><a href="pages-starter.html">Starter Page</a></li>
                                        <li><a href="pages-login.html">Login</a></li>
                                        <li><a href="pages-register.html">Register</a></li>
                                        <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                        <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                        <li><a href="pages-404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="pages-500.html">Error 500</a></li>
                                        <li><a href="pages-timeline.html">Timeline</a></li>
                                        <li><a href="pages-invoice.html">Invoice</a></li>
                                        <li><a href="pages-pricing.html">Pricing</a></li>
                                        <li><a href="pages-gallery.html">Gallery</a></li>
                                        <li><a href="pages-maintenance.html">Maintenance</a></li>
                                        <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!-- End navigation menu  -->
                </div>
            </div>
        </div>
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
                        <div class="btn-group float-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>

                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Orders</h6>
                        <h2 class="m-b-20" data-plugin="counterup">1,587</h2>
                        <span class="badge badge-success"> +11% </span> <span class="text-muted">From previous period</span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-paypal float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Revenue</h6>
                        <h2 class="m-b-20">$<span data-plugin="counterup">46,782</span></h2>
                        <span class="badge badge-danger"> -29% </span> <span class="text-muted">From previous period</span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-chart float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Average Price</h6>
                        <h2 class="m-b-20">$<span data-plugin="counterup">15.9</span></h2>
                        <span class="badge badge-pink"> 0% </span> <span class="text-muted">From previous period</span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-rocket float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Product Sold</h6>
                        <h2 class="m-b-20" data-plugin="counterup">1,890</h2>
                        <span class="badge badge-warning"> +89% </span> <span class="text-muted">Last year</span>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-6 col-xl-8">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-20">Sales Statistics</h4>

                        <div class="text-center">
                            <ul class="list-inline chart-detail-list m-b-0">
                                <li class="list-inline-item">
                                    <h6 style="color: #3db9dc;"><i class="zmdi zmdi-circle-o m-r-5"></i>Series A</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 style="color: #1bb99a;"><i class="zmdi zmdi-triangle-up m-r-5"></i>Series B</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 style="color: #818a91;"><i class="zmdi zmdi-square-o m-r-5"></i>Series C</h6>
                                </li>
                            </ul>
                        </div>

                        <div id="morris-bar-stacked" class="morris-chart" style="height: 320px;"></div>

                    </div>
                </div><!-- end col-->

                <div class="col-lg-6 col-xl-4">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Trends Monthly</h4>

                        <div class="text-center m-b-20">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-sm btn-secondary">Today</button>
                                <button type="button" class="btn btn-sm btn-secondary">This Week</button>
                                <button type="button" class="btn btn-sm btn-secondary">Last Week</button>
                            </div>
                        </div>

                        <div id="morris-donut-example" class="morris-chart" style="height: 265px;"></div>

                        <div class="text-center">
                            <ul class="list-inline chart-detail-list mb-0 m-t-10">
                                <li class="list-inline-item">
                                    <h6 style="color: #3db9dc;"><i class="zmdi zmdi-circle-o m-r-5"></i>English</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 style="color: #1bb99a;"><i class="zmdi zmdi-triangle-up m-r-5"></i>Italian</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 style="color: #818a91;"><i class="zmdi zmdi-square-o m-r-5"></i>French</h6>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div><!-- end col-->


            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xl-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-20">Inbox</h4>

                                <div class="inbox-widget nicescroll" style="height: 339px;">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Chadengle</p>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">13:40 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Tomaslau</p>
                                            <p class="inbox-item-text">I've finished it! See you so...</p>
                                            <p class="inbox-item-date">13:34 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Stillnotdavid</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date">13:17 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kurafire</p>
                                            <p class="inbox-item-text">Nice to meet you</p>
                                            <p class="inbox-item-date">12:20 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shahedk</p>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">10:15 AM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Adhamdannaway</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date">9:56 AM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-8.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Arashasghari</p>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">10:15 AM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-9.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Joshaustin</p>
                                            <p class="inbox-item-text">I've finished it! See you so...</p>
                                            <p class="inbox-item-date">9:56 AM</p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-20">Sales Statistics</h4>

                                <p class="font-600 m-b-5">iMacs <span class="text-danger float-right"><b>78%</b></span></p>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                                </div>
                            </div>

                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-20">Monthly Sales</h4>

                                <p class="font-600 m-b-5">Macbooks <span class="text-success float-right"><b>25%</b></span></p>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-20">Daily Sales</h4>

                                <p class="font-600 m-b-5">Mobiles <span class="text-warning float-right"><b>75%</b></span></p>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div><!-- end col-->

                <div class="col-xl-5">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Top Contracts</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-muted">Apple Technology</th>
                                        <td>20/02/2014</td>
                                        <td>19/02/2020</td>
                                        <td><span class="badge badge-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Envato Pty Ltd.</th>
                                        <td>20/02/2014</td>
                                        <td>19/02/2020</td>
                                        <td><span class="badge badge-danger">Unpaid</span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Dribbble LLC.</th>
                                        <td>20/02/2014</td>
                                        <td>19/02/2020</td>
                                        <td><span class="badge badge-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Adobe Family</th>
                                        <td>20/02/2014</td>
                                        <td>19/02/2020</td>
                                        <td><span class="badge badge-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Apple Technology</th>
                                        <td>20/02/2014</td>
                                        <td>19/02/2020</td>
                                        <td><span class="badge badge-danger">Unpaid</span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Envato Pty Ltd.</th>
                                        <td>20/02/2014</td>
                                        <td>19/02/2020</td>
                                        <td><span class="badge badge-success">Paid</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div><!-- end col-->

            </div>
            <!-- end row -->

        </div> <!-- container -->


        <!-- Footer -->
        <footer class="footer">
            2016 - 2019 © Uplon.
        </footer>
        <!-- End Footer -->


        <!-- Right Sidebar -->
        <div class="side-bar right-bar">
            <div class="nicescroll">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a href="#home-2" class="nav-link active" data-toggle="tab" aria-expanded="false">
                            Activity
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#messages-2" class="nav-link" data-toggle="tab" aria-expanded="true">
                            Settings
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home-2">
                        <div class="timeline-2">
                            <div class="time-item">
                                <div class="item-info">
                                    <small class="text-muted">5 minutes ago</small>
                                    <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <small class="text-muted">30 minutes ago</small>
                                    <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <small class="text-muted">59 minutes ago</small>
                                    <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <small class="text-muted">1 hour ago</small>
                                    <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <small class="text-muted">3 hours ago</small>
                                    <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <small class="text-muted">5 hours ago</small>
                                    <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="messages-2">

                        <div class="row m-t-10">
                            <div class="col-8">
                                <h5 class="m-0">Notifications</h5>
                                <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                            </div>
                            <div class="col-4 text-right">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" data-size="small" />
                            </div>
                        </div>

                        <div class="row m-t-10">
                            <div class="col-8">
                                <h5 class="m-0">API Access</h5>
                                <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                            </div>
                            <div class="col-4 text-right">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" data-size="small" />
                            </div>
                        </div>

                        <div class="row m-t-10">
                            <div class="col-8">
                                <h5 class="m-0">Auto Updates</h5>
                                <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                            </div>
                            <div class="col-4 text-right">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" data-size="small" />
                            </div>
                        </div>

                        <div class="row m-t-10">
                            <div class="col-8">
                                <h5 class="m-0">Online Status</h5>
                                <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                            </div>
                            <div class="col-4 text-right">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" data-size="small" />
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end nicescroll -->
        </div>
        <!-- /Right-bar -->



    </div> <!-- End wrapper -->


    <!-- jQuery  -->
    <?php require_once('../partials/scripts.php'); ?>

</body>

</html>