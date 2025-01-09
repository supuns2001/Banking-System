<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $uemail = $_SESSION["u"]["email"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="viewRecordStyle.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="header.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>Officer | Daly Records</title>
    </head>

    <body class="body">

        <div class="" style="width: 100%;">
            <div class="col-12 mainBox">
                <div class="col-12 " style="height: 60px;">

                    <!-- header -->
                    <div class="main">
                        <div class="mainDiv1">
                            <div class="divrow1">
                                <div class=" hederDiv1">

                                    <div class="hederDiv12">
                                        <!-- <label for="">l</label> -->
                                        <span class="hederSpan1 font1 mt-1"> Company Name</span>
                                    </div>
                                    <!-- <span class="hederSpan1 "> VISIT SINGAPORE</span> -->
                                    <!-- <img src="./icon/logo (3).png" style="width: 10rem; " alt=""> -->
                                </div>

                                <div class=" hederDiv2"  id="navidiv1">
                                    <span id="home" class="hederAncer1" onclick="window.location='index.php'"><i class="bi bi-house-door me-2 d-lg-none d-md-none  text-black "></i> Home</span>
                                    <span id="recod" class="hederAncer2" onclick="window.location='viewRecord.php'"><i class="bi bi-card-heading me-2 d-lg-none d-md-none  text-black  "></i>  View Record</span>

                                    <img src="./css/icon/close but.svg" class="hederIcon3" alt="" onclick="navigation2();">
                                </div>

                                <div class=" hederDiv3">

                                    <img src="./css/icon/search.svg" class="icon1" alt="" id="icon" style="display: block;" onclick="headersearch();">




                                    <input type=" text " class="hedreinput2 " style="display: none;" id="hedreinput" placeholder="Search">

                                    <img src="./css/icon/search.svg " class="icon2" alt=" " style="display: none;" id="icon2">






                                </div>

                                <div class=" hederDiv4">

                                    <img src="./icon/list (2).svg" class="hederIcon2" alt="" onclick="navigation();">
                                </div> 



                            </div>
                        </div>
                    </div>
                    <!-- header -->

                    <!-- <div class="col-12" style="height: 10vh; background-color: #E8B4B8; margin-bottom: 5px; display: flex; flex-direction: row; justify-content: start; align-items: center;"></div> -->
                </div>

                <!-- <div class="col-12" ></div> -->


                <div class="col-12 mt-2 p-3">

                    <form action="deleteCusRecordProcess.php" method="POST">




                        <?php


                        $today = date("Y-m-d");
                        $thismonth = date("m");
                        $thisyear = ("Y");



                        $vLoc_rs = Database::search("SELECT * FROM `visit_location` WHERE `user_email` = '" . $uemail . "' AND `date` = '" . $today . "' ");

                        $vLoc_num = $vLoc_rs->num_rows;


                            // echo($vLoc_num);
                            // echo($uemail);
                            // echo($today);



                        for ($x = 0; $x < $vLoc_num; $x++) {


                            $vLoc_data = $vLoc_rs->fetch_assoc();

                        ?>

                            <div class="col-12 mt-2 mb-4">
                                <div class="row">





                                    <div class="col-11 " onselect="">
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item rounded-3 ">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fs-5  shadow" style="background-color: #E8B4B8;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $x; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                                        <?php echo ($vLoc_data["customer_nic"]); ?> | <?php echo ($vLoc_data["time"]); ?>
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne<?php echo $x; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12">



                                                            <div class="col-12">
                                                                <div class="row px-1">

                                                                    <div class="col-12 col-lg-4 text-start rounded-2">
                                                                        <label class="fw-bold font3 fs-5 mt-3 mb-1">Location :</label>
                                                                    </div>

                                                                    <div class="col-12 col-lg-8 text-start rounded-2" style="background-color: #F8F7F7;">
                                                                        <a href=" <?php echo ($vLoc_data["location"]); ?>" class="fs-6 mt-4 mb-3">
                                                                            <?php echo ($vLoc_data["location"]); ?>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="row px-1">

                                                                    <div class="col-12 col-lg-4 text-start rounded-2" >
                                                                        <label class="fw-bold font3  fs-5 mt-3 ">Accuracy :</label>
                                                                    </div>

                                                                    <div class="col-12 col-lg-8 text-start rounded-2 " style="background-color: #F8F7F7;">
                                                                        <label class="mt-2 mb-2 fs-5 "><?php echo ($vLoc_data["accuracy"]); ?></label>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-12 mt-3">
                                                                <div class="row">

                                                                    <div class="col-12 col-lg-4 bg-lg-white text-start rounded-2" >
                                                                        <label class="fw-bold font3 fs-5">Amount :</label>
                                                                    </div>

                                                                    <div class="col-8 col-lg-8 bg-lg-white text-start  rounded-2 " style="background-color: #F8F7F7;">
                                                                        <label class=" fs-5 mt-2 mb-2">RS. <?php echo ($vLoc_data["amount"]); ?>.00</label>
                                                                    </div>
                                                                    <div class="col-4 d-flex align-items-end">
                                                                        <label class="fs-5 mb-2">LKR</label>
                                                                    </div>

                                                                </div>
                                                            </div>




                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="col-1">
                                        <!-- <div class="form-check mt-2 mx-1">
                                            <input class="form-check-input fs-5" type="checkbox" name="cus_delete_id[]" value="<?php echo $vLoc_data["id"]; ?>" id="flexCheckDefault<?php echo $vLoc_data["id"]; ?>">
                                        </div> -->
                                        <div class="col-12">

                                            <div class=" fs-5 deleteBtn">
                                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" id="ddd<?php echo $vLoc_data['id'] ?>" onclick="deleteRecorsNum('<?php echo $vLoc_data['id'] ?>');">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Record</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this record?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn text-black" style="background-color: #c0c0c0;" data-bs-dismiss="modal">No</button>
                                                                <button type="button" class="btn text-white " style="background-color: #d9848a;" id="d<?php echo $vLoc_data['id'] ?>" onclick="deleteRecors();" >Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                    </div>





                                </div>

                            </div>




                        <?php


                        }


                        ?>







                    </form>

                </div>


            </div>





        </div>



        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script src="header.js"></script>
    </body>

    </html>


<?php




}


?>