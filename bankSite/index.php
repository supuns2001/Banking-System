<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

  $uData = $_SESSION["u"];

?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="header.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Scan QR Code </title>
  </head>

  <body class="b" style="width: 100%; display: flex; flex-direction: row; justify-content: center; align-items: center;">


    <script src="html5-qrcode.min.js"></script>
    <style>
      .result {
        background-color: green;
        color: #fff;
        padding: 20px;
      }

      .row {
        display: flex;
      }
    </style>

    <div class=" col-12 d-flex justify-content-center align-items-center ">
      <div class=" row col-12 " style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
        <div class="col-12 headerBox ">

          <!-- header -->
          <div class="main">
            <div class="mainDiv1">
              <div class="divrow1">
                <div class=" hederDiv1">

                  <div class="hederDiv12 ">
                    <!-- <label for="">l</label> -->
                    <span class="hederSpan1 font1 mt-1"> Company Name</span>
                  </div>

                  <!-- <img src="./icon/logo (3).png" style="width: 10rem; " alt=""> -->
                </div>

                <div class=" hederDiv2  " id="navidiv1">
                  <img src="icon/close but.svg" class="hederIcon3" alt="" onclick="navigation2();">
                  <!-- <div class="col-12 d-flex justify-content-end align-items-center " style="height: 5vh; background-color: #E8B4B8;">
                    <div class="me-3" style="width: 30px; height: 30px; "><i class="bi bi-x-lg fs-3 fw-bold"></i></div>
                  </div> -->
                  <span id="home" class="hederAncer2" onclick="window.location='index.php'"><i class="bi bi-house-door me-2 d-lg-none d-md-none  text-black "></i> Home</span>
                  <span id="recod" class="hederAncer1" onclick="window.location='viewRecord.php'"><i class="bi bi-card-heading me-2 d-lg-none d-md-none  text-black  "></i> View Record</span>

                  
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




        </div>

        <div class="col-12 mt-3 " style="height: 30px; margin-bottom: 30px; display: flex; flex-direction: row; justify-content: center; align-items: center;">
          <p class="font5" style="color: black;  font-size: 18px; margin-top: 10px;">Welcome <?php echo ($uData["first_name"] . " " . $uData["last_name"]); ?></p>
        </div>

        <div class="col-lg-8  ">
          <div class="col-12" id="reader" style="background-color: #e2e2e2;"> </div>
        </div>
        <div class="col-lg-8 " style="padding:30px;">
          <div class="  col-12 " style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
            <div class="row " style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
              <h4 style="text-align: center; margin-bottom: 30px;">SCAN RESULT</h4>
              <div id="result" style="text-align: center; ">
                <label id="result2">Result Here</label>
              </div>
            </div>

          </div>

        </div>

        <script type="text/javascript">
          function onScanSuccess(qrCodeMessage) {
            var resltDiv = document.getElementById('result2').innerHTML = qrCodeMessage;


            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                console.log(position);




                // alert( position.coords.latitude + "," + position.coords.longitude);
                var location = document.getElementById("location").innerHTML = "http://maps.google.com/maps?q=" + position.coords.latitude + "," + position.coords.longitude;
                var locAccuracy = document.getElementById("accuracy").innerHTML = position.coords.accuracy





                n = new Date();
                yy = n.getFullYear();
                mm = n.getMonth() + 1;
                dd = n.getDate();
                document.getElementById("date").innerHTML = yy + "-" + mm + "-" + dd;


                var d = new Date();
                h = d.getHours(); // => 9
                m = d.getMinutes(); // =>  30
                s = d.getSeconds(); // => 51

                var time = document.getElementById("Time").innerHTML = h + ":" + m + ":" + s;


                // var currentDate = document.getElementById("date").innerHTML = "todayDate";

                // $.get( "http://maps.googleapis.com/maps/api/geocode/json?latlng="+ position.coords.latitude + "," + position.coords.longitude +"&sensor=false", function(data) {
                //   console.log(data);

                // document.getElementById("pp").innerHTML = latitude;
                // alert(position.coords.latitude);


                // })













                // var img = new Image();
                // img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + position.coords.latitude + "," + position.coords.longitude + "&zoom=13&size=800x400&sensor=false";
                // $('#output').html(img);
              });

            }

          }


          // function getloc(){
          //   alert("awaa");
          //   window.location = "https://maps.googleapis.com/maps/api/staticmap?center=" + position.coords.latitude + "," + position.coords.longitude + "&zoom=13&size=800x400&sensor=false";

          // }


          function onScanError(errorMessage) {
            //handle scan error
          }
          var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
              fps: 10,
              qrbox: 250
            });
          html5QrcodeScanner.render(onScanSuccess, onScanError);
        </script>

        <div class="ditailsDiv1 ">
          <div class="col-12" style="margin-top: 20px;"></div>
          <p id="pp"></p>
          <div class="col-12">

            <div class="col-12 box1">

              <div class=" alignbox1  ">
                <div class="txtBox1L text-start ">
                  <lable class="topicTxt font3">Location :</lable>
                </div>
                <div class=" outPutBox1 ">
                  <p class="locaTxt font3 " id="location"></p>
                </div>
              </div>

            </div>

            <div class="col-12 box1">
              <div class="row ">
                <div class="txtBox1 text-start" >
                  <lable class="topicTxt font3">Accuracy :</lable>
                </div>
                <div class="outPutBox">
                  <label id="accuracy" class="outPutTex1 font3"></label>
                </div>
              </div>
            </div>


            <div class="col-12 box1">
              <div class="row">
                <div class="txtBox1 text-start" >
                  <label class="topicTxt font3">Date :</label>
                </div>
                <div class="outPutBox">
                  <label id="date" class="outPutTex1 font3"></label>
                </div>
              </div>
            </div>

            <div class="col-12 box1">
              <div class="row">
                <div class="txtBox1 text-start" >
                  <label class="topicTxt">Time : </label>
                </div>
                <div class="outPutBox">
                  <label id="Time" class="outPutTex1 font3"></label>
                </div>
              </div>
            </div>


            <div class="col-12 box1">
              <div class="row">
                <div class="txtBox1 text-start" >
                  <label class="topicTxt font3">Amount : </label>
                </div>
                <div class="outPutBox">
                  <input class="input1 " type="number" default=0 id="amount" />
                </div>
              </div>
            </div>

            <div class="col-12 box12 ">
              <div class="row btnBox" >
                <button class="saveBtn" onclick="savedata();">Save Record</button>
              </div>
            </div>


          </div>


        </div>

      </div>

    </div>




    <div style="width: 500px; height: 300px; ">
    </div>


    <!-- loader -->
    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
      $(window).on("load", function() {
        $(".loader-wrapper").fadeOut("slow");
      });
    </script>
    <!-- loader -->



    <script src="script.js"></script>
    <script src="header.js"></script>
    <script src="bootstrap.bundle.js"></script>

  </body>

  </html>


<?php


} else {

  header("location:login.php");
}

?>