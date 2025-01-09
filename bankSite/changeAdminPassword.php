<?php

session_start();
require "connection.php";

if(isset($_SESSION["au"])){

    $email = $_SESSION["au"]["email"]; 


    $password = $_POST["pass"];


    if(empty($password)){
        echo("Pleasse Enter the Password");
    }else{

        $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."' ");
        $admin_num = $admin_rs->num_rows;

        if($admin_num == 1){
            Database::iud("UPDATE `admin` SET `password` = '".$password."' ");
            echo("success");
        }else{
            echo("Invalid Admin user");
        }



        
    }
}


    









?>