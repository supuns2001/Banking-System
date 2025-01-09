<?php

session_start();

require "connection.php";

if(isset($_GET["email"])){

    $email = $_GET["email"];


    $off_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' ");

    $off_num  = $off_rs->num_rows;



    if($off_num == 1){
        
        $off_data = $off_rs->fetch_assoc();

        $array["email"] = $email;
        $array["first_name"] = $off_data["first_name"];
        $array["last_name"] = $off_data["last_name"];
        $array["b_code"] = $off_data["b_code"];
        $array["password"] = $off_data["password"];
        $array["mobile"] = $off_data["mobile"];
        $array["username"] = $off_data["username"];



        echo json_encode($array);

    }



}



?>