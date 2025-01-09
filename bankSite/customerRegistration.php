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

        <title>Admin | Customer Registration</title>
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
                    <li class="mb-3" style="background-color:#d6d4d4;"><a href="customerRegistration.php">
                            <i class="uil uil-chart" ></i>
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
                        <div class="col-12 d-flex justify-content-center mb-4">
                            <h3 class=" mt-3 mb-3 fw-bold">Customer Registration</h3>
                        </div>
                        <div class="col-12  col-md-4 col-lg-3">
                            <div class="col-12 mb-3">
                                <label>Customer NIC</label>
                                <input type="text" class="form-control shadow" id="code" />
                            </div>

                            <div class="col-12 mb-3">
                                <label> Name</label>
                                <input type="text" class="form-control shadow" id="name" />
                            </div>


                            <div class="col-12 mb-3">
                                <label>Mobile</label>
                                <input type="text" class="form-control shadow" id="mobile" />
                            </div>

                            <div class="col-12 mb-3">
                                <label>Address</label>
                                <input type="text" class="form-control shadow" id="address" />
                            </div>

                            <div class="col-12 d-flex justify-content-center mt-4 mb-4">
                                <button class="btn rounded-2 fw-bold shadow  fs-6" style="background-color: #E8B4B8; width: 80%;"  id="cusRegistrationBtn" onclick="registerCustomer();">Register</button>
                            </div>

                            <div class="col-12 d-flex justify-content-center mt-4 mb-4">
                                <button class="btn rounded-2 fw-bold shadow  fs-6" style="background-color: #d1d1d1; width: 80%;" disabled id="cusUpdate" onclick="updateCustomer();">Update</button>
                            </div>


                        </div>
                        <div class="col-12 col-md-8 col-lg-9">
                            <div class="col-12 border-1 border-dark overflow-scroll " style="height: 500px; background-color: #fafafa; ">


                                <table class="table table-striped  ">
                                    <thead style="height: 60px; background-color: #EED6D3;">
                                        <tr>
                                            <th scope="col">Customer code</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Address</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $user_rs = Database::search("SELECT * FROM `customer` ");
                                        $user_num = $user_rs->num_rows;

                                        for ($x = 0; $x < $user_num; $x++) {

                                            $user_data  = $user_rs->fetch_assoc();

                                        ?>

                                            <tr id="rowclick" onclick="selectCusRecords('<?php echo ($user_data['nic']); ?>');">
                                                <!-- <th scope="row">1</th> -->
                                                <td><?php echo ($user_data["nic"]); ?></td>
                                                <td><?php echo ($user_data["name"]); ?></td>
                                                <td><?php echo ($user_data["mobile"]); ?></td>
                                                <td><?php echo ($user_data["address"]); ?></td>
                                                <td class=""><i id="dt" class=" RRdeleteBtn bi bi-archive-fill"></i></td>

                                            </tr>

                                        <?php
                                        }

                                        ?>



                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </section>

        <script src="adminScript.js"></script>
    </body>

    </html>


<?php

} else {
    echo ("you are not Valid User");
}



?>