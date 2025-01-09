<?php

session_start();

require "connection.php";

$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$bcode = $_POST["bcode"];
$uname = $_POST["uname"];
$password = $_POST["password"];


// echo($email);
// echo($fname);
// echo($lname);
// echo($mobile);
// echo($bcode);
// echo($uname);
// echo($password);



 if(empty($fname)){
    echo("Please Enter First Name");

}else if(empty($lname)){
    echo("Please Enter Last Name");

}else if(empty($mobile)){
    echo("Please Enter Officer mobile number");

}else if(empty($bcode)){
    echo("Please Enter Officer branch code");

}else if(empty($uname)){
    echo("Please Enter Officer username");

}else if(empty($password)){
    echo("Please Enter Officer password");

}else{

    $off_rs = Database::search("SELECT * FROM `user` WHERE  `email` = '".$email."' ");

    $off_num = $off_rs->num_rows;

    if($off_num == 1){

        Database::iud("UPDATE `user` SET `first_name` = '".$fname."', `last_name` = '".$lname."',`b_code` = '".$bcode."',
         `password` = '".$password."',`mobile` = '".$mobile."',`username` = '".$uname."'  WHERE `email` = '".$email."' ") ;
        echo("success");
     
        
    }else{

        echo("Invalid ID number");

    }



}




?>