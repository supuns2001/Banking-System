<?php


session_start();
require "connection.php";

$uemail = $_SESSION["u"]["email"];

$cusID = $_POST["cuID"];
$location = $_POST["loc"];
$accuracy = $_POST["accu"];
$date = $_POST["date"];
$time = $_POST["time"];
$amount = $_POST["amount"];


if(empty($cusID)){
    echo("Qr code Not Scan Correctly. Try Again ");
}else if(empty($location)){
    echo("please on the location and Rescan the qr Code  ");
}else {


    $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$cusID."'");
    $cus_num = $cus_rs->num_rows;

    if($cus_num == 1){

        if(empty($amount)){

            echo("Valid qr");
            Database::iud("INSERT INTO `visit_location` (`user_email`,`location`,`date`,`time`,`amount`,`accuracy`,`customer_nic`) 
             VALUES ('".$uemail."','".$location."','".$date."','".$time."','0','".$accuracy."','".$cusID."') ");

        }else{

            echo("Valid qr");
            Database::iud("INSERT INTO `visit_location` (`user_email`,`location`,`date`,`time`,`amount`,`accuracy`,`customer_nic`) 
             VALUES ('".$uemail."','".$location."','".$date."','".$time."','".$amount."','".$accuracy."','".$cusID."') ");

        }

       


    }else{
        echo("Invalid qr Code");
    }




}







?>