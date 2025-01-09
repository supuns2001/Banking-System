<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>

    <!DOCTYPE html>
    <!-- Coding By CodingNepal - codingnepalweb.com -->
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!----======== CSS ======== -->
        <link rel="stylesheet" href="adminStyle.css">

        <!----===== Iconscout CSS ===== -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <!----===== bootstrap CSS ===== -->
        <link rel="stylesheet" href="bootstrap.css" />

        <!-- Boostraps Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <title>Admin Dashboard </title>
    </head>

    <body>

        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>

        <script>
            $(window).on("load", function() {
                $(".loader-wrapper").fadeOut("slow");
            });
        </script>

        <div style="width: 100%;">
            <nav>
                <div class="logo-name">
                    <!-- <div class="col-12">
                    <div class="logoImg"></div>
                </div> -->


                    <span class="logo_name font1 fw-bold">Company Logo</span>
                </div>

                <div class="menu-items ">
                    <ul class="nav-links ">
                        <li class="mb-3" style="background-color:#e3dede;"><a href="adminPanel.php">
                                <i class="uil uil-estate"></i>
                                <span class="link-name">Dahsboard</span>
                            </a></li>
                        <li class="mb-3"><a href="officerRegistration.php">
                                <i class="uil uil-files-landscapes"></i>
                                <span class="link-name">Officer Register</span>
                            </a></li>
                        <li class="mb-3"><a href="customerRegistration.php">
                                <i class="uil uil-chart"></i>
                                <span class="link-name">Customer Register</span>
                            </a></li>
                        <li class="mb-3"><a href="officerRecords.php">
                                <i class="uil uil-thumbs-up"></i>
                                <span class="link-name">Officer Records</span>
                            </a></li>
                        <li class="mb-3"><a href="adminProfile.php">
                                <i class="uil uil-comments"></i>
                                <span class="link-name">Profile</span>
                            </a></li>
                        <!-- <li><a href="#">
                            <i class="uil uil-share"></i>
                            <span class="link-name">Share</span>
                        </a></li> -->

                        <div class="col-12 " style="margin-top: 250px; padding-top: 7px; padding-bottom: 7px;">
                            <button type="button" class="btn col-12 text-start" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-box-arrow-left fs-5 me-2  fw-bold"></i> <span class="fw-bold">LOG OUT</span>
                            </button>

                        </div>
                    </ul>

                    <ul class="logout-mode">
                        <li><a href="#">
                                <!-- <i class="uil uil-signout"></i>
                            <span class="link-name logoutbtn">Logout</span> -->
                            </a></li>

                        <li class="mode">
                            <a href="#">
                                <!-- <i class="uil uil-moon"></i>
                            <span class="link-name">Dark Mode</span> -->
                            </a>

                            <div class="mode-toggle">
                                <!-- <span class="switch"></span> -->
                            </div>
                        </li>
                    </ul>


                </div>


            </nav>



            <section class="dashboard">
                <div class="top" style="background-color: #E8B4B8;">
                    <i class="uil uil-bars sidebar-toggle"></i>

                    <div class="search-box">
                        <i class="uil uil-search"></i>
                        <input type="text" placeholder="Search here...">
                    </div>

                    <!--<img src="images/profile.jpg" alt="">-->
                </div>

                <div class="dash-content">
                    <div class="overview">
                        <!-- <div class="title">
                        <i class="uil uil-tachometer-fast-alt" style="background-color: #E8B4B8; color: black;"></i>
                        <span class="text">Dashboard</span>
                    </div> -->

                        <div class="boxes mt-4">
                            <div class="box box1 ">
                                <?php
                                $vLoc_rs = Database::search("SELECT * FROM `visit_location`");
                                $vLoc_num  = $vLoc_rs->num_rows;

                                ?>
                                <i class="bi bi-geo-alt-fill"></i>
                                <!-- <i class="bi bi-person-circle"></i> -->
                                <span class="text">All Visited Locations</span>
                                <span class="number"><?php echo $vLoc_num; ?></span>
                            </div>
                            <div class="box box2">

                                <?php



                                $today = date("Y-m-d");
                                $thismonth = date("m");
                                $year = explode('-', $today);
                                $thisyear  = $year[0];

                                $am = "0";
                                $td = "0";
                                $vl = "0";


                                $collect_ammount_rs = Database::search("SELECT * FROM `visit_location`");
                                $collect_ammount_num = $collect_ammount_rs->num_rows;


                                for ($x = 0; $x < $collect_ammount_num; $x++) {

                                    $collect_ammount_data = $collect_ammount_rs->fetch_assoc();



                                    $LDate = $collect_ammount_data["date"];

                                    if ($LDate == $today) {
                                        $td = $td + $collect_ammount_data["amount"];
                                    }

                                    $splitDate = explode("-", $LDate);
                                    $LYear = $splitDate[0]; //year
                                    $LMonth = $splitDate[1]; //month

                                    // echo($thisyear);
                                    // echo ($LMonth);

                                    if ($LYear == $thisyear) {
                                        if ($LMonth == $thismonth) {
                                            $am = $am + $collect_ammount_data["amount"];
                                        }
                                    }
                                }

                                ?>

                                <i class="bi bi-wallet2"></i>
                                <span class="text">Daly Collection</span>
                                <span class="number"><?php echo $td; ?></span>
                            </div>
                            <div class="box box3">

                                <i class="bi bi-wallet-fill"></i>
                                <span class="text">Monthly Collection</span>
                                <span class="number"><?php echo $am; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="activity">
                        <!-- <div class="title">
                        <i class="uil uil-clock-three" style="background-color: #E8B4B8; color: black;"></i>
                        <span class="text">Recent Activity</span>
                    </div> -->

                        <div class="col-12 mb-5 py-lg-5 ">
                            <div class="row ">
                                <div class="col-12 col-lg-5 " style="height: 400px;">
                                    <div class="col-12">
                                        <div class="d-flex-column align-items-center">
                                            <div class="col-12">
                                                <p class="fs-2 fw-bold text-center" style="color: #575757;">Best seller</p>
                                            </div>
                                            <div class="col-12 px-4 ">

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Rank</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td colspan="2">Larry the Bird</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-lg-7 px-lg-5 chartBox">
                                    <?php
                                    include "barChart.php";
                                    ?>
                                </div>
                            </div>


                        </div>

                        <div class="col-12  ">

                            <div class="col-12 mb-5">
                                <div class="row p-4">

                                    <div class="col-12 col-lg-3 " style="height: 60px;">
                                        <div class="row ">

                                            <div class="col-12 mt-2">
                                                <label>Customer Name</label>
                                                <input class="form-control shadow " type="text" id="cusName" onkeyup="searchCustomerName();" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-3 " style="height: 60px;">

                                        <div class="row ">

                                            <div class="col-12 mt-2">
                                                <label>Branch Code</label>
                                                <input class="form-control shadow" id="oId" type="text" onkeyup="searchOfficerId();" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-2 " style="height: 60px;">

                                        <div class="row ">

                                            <div class="col-12 mt-2">
                                                <label>from Date</label>
                                                <input class="form-control shadow" type="date" id="fromD" />
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-2 ">

                                        <div class="row ">

                                            <div class="col-12 mt-2">
                                                <label>to Date</label>
                                                <input class="form-control shadow" type="date" id="toD" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-2 ">

                                        <div class="row mx-3 me-1 mt-4">
                                            <div class="col-8 d-grid ">
                                                <button class="btn btn-warning fw-bold shadow mt-2" style="height: 45px;" onclick="findData();">Find</button>
                                            </div>
                                            <div class="col-4   d-flex justify-content-center align-items-center ">
                                                <button class="    d-flex justify-content-center align-content-center downloadBtn" onclick="DownloadBtn();"><i class="bi bi-arrow-bar-down fs-3 text-white   fw-bold"></i></button>
                                            </div>
                                        </div>

                                    </div>





                                </div>

                            </div>




                            <div class="col-12 mt-4 overflow-scroll" id="loadTable1" style="height: 570px;">

                                <?php

                                $loc_rs = Database::search("SELECT visit_location.id,visit_location.user_email,visit_location.location,visit_location.date,visit_location.time,visit_location.amount,visit_location.accuracy,visit_location.customer_nic,
                            customer.name AS customer_name , user.first_name AS fname , user.last_name AS lname , user.b_code AS bCode FROM `visit_location` INNER JOIN `customer` ON visit_location.customer_nic = customer.nic 
                            INNER JOIN `user` ON visit_location.user_email = user.email  ORDER BY `date` DESC ");

                                $loc_num  = $loc_rs->num_rows;



                                if ($loc_num > 0) {

                                ?>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Branch Code</th>
                                                <th scope="col">Officer Name</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Location</th>

                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="filterDate">

                                            <?php

                                            for ($x = 0; $x < $loc_num; ++$x) {
                                                $loc_data = $loc_rs->fetch_assoc();

                                            ?>

                                                <tr class=" " style="height: 60px; ">
                                                    <th scope="row"><?php echo $x + 1; ?></th>
                                                    <td><?php echo $loc_data["date"]; ?></td>
                                                    <td><?php echo $loc_data["time"]; ?></td>
                                                    <td><?php echo $loc_data["bCode"]; ?></td>
                                                    <td><?php echo $loc_data["fname"] . " " . $loc_data["lname"]; ?></td>
                                                    <td><?php echo $loc_data["customer_name"]; ?> </td>
                                                    <td><?php echo $loc_data["location"]; ?></td>
                                                    <td>Rs.<?php echo $loc_data["amount"]; ?>.00</td>
                                                </tr>

                                            <?php

                                            }

                                            ?>


                                        </tbody>
                                    </table>

                                <?php



                                }


                                ?>





                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">LOG OUT</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to log out?
                                        </div>
                                        <div class="modal-footer gap-1">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
                                            <button type="button" class="btn " style="background-color: #E8B4B8;" onclick="logout();"> Yes </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->



                        </div>

                    </div>


                </div>




            </section>
        </div>




        






        <script src="adminScript.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>


<?php

} else {
    echo ("you are not Valid User");
}



?>