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

        <title>Admin | Officer Records</title>
    </head>

    <body>
        <nav>
            <div class="logo-name">
                <!-- <div class="col-12">
                    <div class="logoImg"></div>
                </div> -->
                

                <span class="logo_name font1">Company Logo</span>
            </div>

            <div class="menu-items ">
                <ul class="nav-links">
                    <li class="mb-3"><a href="adminPanel.php">
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
                    <li class="mb-3" style="background-color:#d6d4d4;"><a href="officerRecords.php">
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

            <div class="dash-content ">
                <div class="col-12 mt-4">
                    <div class="row">

                        <div class="col-12 d-flex justify-content-center">
                            <p class="fs-3 fw-bold">Officer Records</p>
                        </div>

                        <?php

                        $user_rs = Database::search("SELECT * FROM `user`  ");
                        $user_num = $user_rs->num_rows;

                        if ($user_num > 0) {

                            for ($x = 0; $x < $user_num; $x++) {
                                $user_data = $user_rs->fetch_assoc();



                                $today = date("Y-m-d");
                                $thismonth = date("m");
                                $year = explode('-', $today);
                                $thisyear  = $year[0];

                                $d_amount = "0";

                                // echo($today);
                                // echo($thismonth);
                                // echo($thisyear);

                                $dalyCollection_rs = Database::search("SELECT * FROM `visit_location` WHERE `user_email` = '" . $user_data["email"] . "' AND  `date` = '" . $today . "' ");
                                $dalyCollection_num = $dalyCollection_rs->num_rows;

                                for ($y = 0; $y < $dalyCollection_num; $y++) {

                                    $dalyCollection_data = $dalyCollection_rs->fetch_assoc();

                                    $colletion_date = $dalyCollection_data["date"];

                                    if ($colletion_date == $today) {

                                        $d_amount = $d_amount + $dalyCollection_data["amount"];
                                    }
                                }



                        ?>

                                <div class="col-12  mb-3 p-0">

                                    <div class="col-12">

                                    </div>

                                    <div class="col-12 mx-3 ">

                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            

                                            <div class="accordion-item">
                                                <h2 class="accordion-header  ">
                                                    <button class="accordion-button collapsed   " onclick="clearTxtField();" style=" background-color: #f4ddde; " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $x; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                                        <label class="col-3"><?php echo($user_data["first_name"]." ".$user_data["last_name"]); ?></label><label class="mt-2 col-7 text-end mx-5">daly collection : <b><?php echo $d_amount; ?>.00</b></label>
                                                    </button>

                                                </h2>
                                                <div id="flush-collapseOne<?php echo $x; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 mb-3" >

                                                            <!-- <div class="row">
                                                                <div class="col-12 col-lg-5 ">
                                                                    <label>From date</label>
                                                                    <input type="date" class="form-control" id="RfromD" />
                                                                </div>
                                                                <div class="col-12 col-lg-5 ">
                                                                    <label>To date</label>
                                                                    <input type="date" class="form-control" id="RtoD" />
                                                                </div>
                                                                <div class="col-12 col-lg-2 ">
                                                                    <button class="btn btn-secondary mt-4" style="width: 80%;" onclick="recordfilterDate('<?php echo $user_data['email']; ?>');">Find</button>
                                                                </div>
                                                            </div> -->


                                                        </div>

                                                        <div class="col-12 overflow-scroll " style="height: 500px;">
                                                            <?php

                                                            $vLocation_rs = Database::search("SELECT visit_location.id,visit_location.user_email,visit_location.location,visit_location.date,visit_location.time,visit_location.amount,visit_location.accuracy,visit_location.customer_nic,
                                                            customer.name AS customer_name FROM `visit_location` INNER JOIN `customer` ON visit_location.customer_nic = customer.nic  WHERE `user_email` =  '" . $user_data["email"] . "' ORDER BY `date` DESC ");
                                                            $vLocation_num = $vLocation_rs->num_rows;

                                                            if ($vLocation_num > 0) {
                                                            ?>

                                                                <table class="table table-striped">

                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"></th>
                                                                            <th scope="col">Date</th>
                                                                            <th scope="col">Time</th>
                                                                            <th scope="col">Customer Name</th>
                                                                            <th scope="col">Location</th>
                                                                            <th scope="col">Amount</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="DateFilterrecord">
                                                                        <?php

                                                                        for ($z = 0; $z < $vLocation_num; $z++) {

                                                                            $vLocation_data = $vLocation_rs->fetch_assoc();

                                                                        ?>

                                                                            <tr>
                                                                                <th scope="row"><?php echo $z + "1"; ?></th>
                                                                                <td><?php echo $vLocation_data["date"]; ?></td>
                                                                                <td><?php echo $vLocation_data["time"]; ?></td>
                                                                                <td><?php echo $vLocation_data["customer_name"]; ?></td>
                                                                                <td><?php echo $vLocation_data["location"]; ?></td>
                                                                                <td>RS.<?php echo $vLocation_data["amount"]; ?>.00</td>
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




                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>




                                </div>



                        <?php
                            }
                        }

                        ?>




                    </div>
                </div>


            </div>
        </section>

        <script src="adminScript.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>


<?php

} else {
    echo ("you are not Valid User");
}



?>