<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;



$bcode = $_POST["bCode"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$username = $_POST["un"];
$password = $_POST["password"];

 if(empty($email)){
    echo("Please Enter your Email");

}else if(empty($fname)){
    echo("Please Enter Officer First name");

}else if(empty($lname)){
    echo("Please Enter Officer Last name");

}else if(empty($mobile)){
    echo("Please Enter Officer Mobile Number");

}else if(empty($bcode)){
    echo("Please Enter Officer Branch Code");

}else if(empty($username)){
    echo("Please Enter Officer Username");

}else if(empty($password)){
    echo("Please Enter Officer Login Password");

}else{

    $user_rs = Database::search("SELECT * FROM `user` WHERE `username` = '".$username."' OR ( `first_name` = '".$fname."' AND `last_name`='".$lname."' AND `mobile` = '".$mobile."') ");

    $user_num = $user_rs->num_rows;

    // echo($user_num);

    if($user_num > 0){

        echo("Branch Code or Officer Details  already exsits");

    }else{



        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bizfastgcb@gmail.com';
        $mail->Password = 'alacvemdnvdaymcv';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('bizfastgcb@gmail.com', 'Bizfast officer Registration');
        $mail->addReplyTo('bizfastgcb@gmail.com', 'Bizfast officer Registration');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Your Registration Details';
        $bodyContent = '<p style="  font-size: 22px; margin-bottom: 20px;">You successfully registered as a user in BizFast application of GCB Bank.</p>
                        <p style="color: #6d6b6b; font-size: 17px;">Your Username is : <b style = "color: #1c1c1c">'.$username.'</b> </p>
                        <p style="color: #6d6b6b; font-size: 17px;">Your Password is : <b style = "color: #1c1c1c">'.$password.'</b></p>
                       <Lable style=" font-size: 17px;">Click the button : <a href = "http://localhost/banksite/login.php" ><button style="
                       width: 80px;
                       height: 35px;
                       font-weight: bold;
                       background-color: rgb(216, 147, 147);
                       border-style: none;
                       border-radius: 10px;
                       font-size: 14px;
                       box-shadow: 0px 0px 10px 1px rgb(160, 160, 160);
                       ">Log in</button></a></Lable> ';
        $mail->Body    = $bodyContent;

       

        if(!$mail->send()){
            echo("Register Details sending failes. Please Check Your connection");

        }else{
            Database::iud("INSERT INTO `user` (`email`,`first_name`,`last_name`,`b_code`,`password`,`mobile`,`username`) 
            VALUES ('".$email."','".$fname."','".$lname."','".$bcode."','".$password."','".$mobile."','".$username."') ");
            echo("success");

        }








        



    }
}










?>