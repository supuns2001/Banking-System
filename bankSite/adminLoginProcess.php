<?php

session_start();
require "connection.php";


$email = $_POST["email"];
$password = $_POST["password"];

// echo("ok1");
// echo($email);
// echo($password);

if(empty($email)){
    echo("Please enter your Email");
}else if(strlen($email) > 100){
    echo("Email must have less than 100 chararactors");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email");
}else if(empty($password)){
    echo("Please Enter your Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo("Password must have betveen 5-20 chararactors");
}else{

    
// echo($email);
// echo($password);

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."' AND `password` = '".$password."' ");

    $admin_num = $admin_rs->num_rows;

    if($admin_num == 1){
        
        $admin_data = $admin_rs->fetch_assoc();
        $_SESSION["au"] = $admin_data;

        ?>

        <script>
            window.location = "adminPanel.php";

        </script>
        
        
        <?php

        // header("Location:adminPanel.php");

        // echo("success");

    }else{
        ?>
        <script>
            window.location = "adminLogin.php";
             alert("Invalid Email or Password ");
             
        </script>
        <?php
       
    }
}


?>