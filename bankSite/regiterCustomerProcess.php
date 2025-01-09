<?php

require "connection.php";

$code = $_POST["code"];
$name = $_POST["name"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];


if(empty($code)){
    echo("Please Enter Customer Code");

}else if(empty($name)){
    echo("Please Enter Customer name");

}else if(empty($mobile)){
    echo("Please Enter Officer Mobile Number");

}else if(empty($address)){
    echo("Please Enter Cstomer Address");

}else{

    $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$code."'  ");

    $cus_num = $cus_rs->num_rows;

    if($cus_num > 0){
        echo("NIC number Details already exsist");
    }else{
        Database::iud("INSERT INTO `customer` (`nic`,`name`,`mobile`,`address`)  
        VALUES ('".$code."','".$name."','".$mobile."','".$address."') ");

        echo("success");
    }


}



?>