<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

    $au_email = $_SESSION["au"]["email"];
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

        <title>Admin Profile</title>
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
                    <li class="mb-3"><a href="officerRecords.php">
                            <i class="uil uil-thumbs-up"></i>
                            <span class="link-name">Officer Records</span>
                        </a></li>
                    <li class="mb-3" style="background-color:#d6d4d4;"><a href="adminProfile.php">
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
                        <div class="col-12 mb-5 d-flex justify-content-center align-items-center">
                            <h1>My Profile</h1>
                        </div>
                        <div class="col-12 mt-4 ">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-lg-2 d-flex justify-content-center">
                                    <div style="width: 200px; height: 200px;  border-radius: 10px; background-image: url(img/adminp2.png); border-style: solid; border-width: 2px; border-color: #d6d4d4; background-position: center; background-size: cover; transform: scale(1.3);"></div>
                                </div>

                                <div class="col-10 col-md-8 col-lg-7 ">

                                    <?php

                                    $a_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $au_email . "'");

                                    $a_num = $a_rs->num_rows;

                                    if ($a_num > 0) {

                                        $a_data = $a_rs->fetch_assoc();

                                    ?>

                                        <div class="col-12 mt-3 mb-3">
                                            <div class="row">
                                                <div class="col-4 col-lg-4 text-start text-lg-end ">
                                                    <p class="fs-5">Name :</p>
                                                </div>
                                                <div class="col-8 col-lg-8">
                                                    <p class="fs-5"><?php echo($a_data["first_name"]." ".$a_data["last_name"]);?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3 mb-3">
                                            <div class="row">
                                                <div class="col-4 col-lg-4 text-start text-lg-end">
                                                    <p class="fs-5">Email :</p>
                                                </div>
                                                <div class="col-8 col-lg-8">
                                                    <p class="fs-5"><?php echo $au_email; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3 mb-3">
                                            <div class="row">
                                                <div class="col-12 col-lg-4 text-start text-lg-end">
                                                    <p class="fs-5"> Password :</p>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="row">
                                                        <div class="col-10 ">
                                                            <input type="password" id="npi" class="form-control col-lg-5 "  value="<?php echo ($a_data["password"]); ?>" >
                                                        </div>
                                                        <div class="col-2 ">
                                                            <button class="btn btn-outline-secondary  border-secondary"  type="button" id="npb"  ><i id="e1" onclick="showPassword();" class="bi bi-eye-fill"></i></button>
                                                        </div>


                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3 mb-3">
                                            <div class="row d-flex justify-content-end">
                                                <button class="btn btn-secondary fw-bold me-5" style="width: 30%; height: 40px;" onclick="updatePassword();">Update Password</button>
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>




                                </div>
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