<?php

session_start();

require "connection.php";

$nic = $_POST["nic"];
$name = $_POST["name"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];

// echo($nic);
// echo($name);
// echo($mobile);
// echo($address);


 if(empty($name)){
    echo("Please Enter Customer name");

}else if(empty($mobile)){
    echo("Please Enter Officer Mobile Number");

}else if(empty($address)){
    echo("Please Enter Cstomer Address");

}else{

    $cus_rs = Database::search("SELECT * FROM `customer` WHERE  `nic` = '".$nic."' ");

    $cus_num = $cus_rs->num_rows;

    if($cus_num == 1){

        Database::iud("UPDATE `customer` SET `name` = '".$name."', `mobile` = '".$mobile."',`address` = '".$address."' WHERE `nic` = '".$nic."' ") ;
        echo("success");
     
        
    }else{

        echo("Invalid ID number");

    }



}




?>