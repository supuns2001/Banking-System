<?php

session_start();

require "connection.php";

if(isset($_GET["nic"])){

    $nic = $_GET["nic"];


    $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$nic."' ");

    $cus_num  = $cus_rs->num_rows;



    if($cus_num == 1){
        
        $cus_data = $cus_rs->fetch_assoc();

        $array["nic"] = $nic;
        $array["name"] = $cus_data["name"];
        $array["mobile"] = $cus_data["mobile"];
        $array["address"] = $cus_data["address"];

        echo json_encode($array);

    }



}



?>