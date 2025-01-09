<?php

session_start();

require "connection.php";

$uname = $_POST["un"];
$password = $_POST["password"];

// echo($uname);
// echo($password);
// echo("hariiii");






if(empty($uname)){
    echo("Please enter your Username");
}else if(empty($password)){
    echo("Please Enter your Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo("Password must have betveen 5-20 chararactors");
}else{




    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '".$uname."' AND `password` = '".$password."' ");
    $rs_num = $rs->num_rows;

    if($rs_num == 1){



        echo("success");
        $rs_data = $rs->fetch_assoc();
        $_SESSION["u"] = $rs_data;

    }else{

        echo("Invalid username OR Password ");

    }



}




?>