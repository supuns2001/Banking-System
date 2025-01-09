<?php

session_start();

require "connection.php";

if(isset($_GET["id"])){
    $r_id = $_GET["id"];

    $id_rs = Database::search("SELECT * FROM `visit_location` WHERE `id` = '".$r_id."' ");
    
    $id_num = $id_rs->num_rows;

    if($id_num == 1){
        $id_data = $id_rs->fetch_assoc();

        Database::iud("DELETE FROM `visit_location` WHERE `id` = '".$r_id."' ");

        echo("success");
    }

   
    
}else{
    echo("Some thing went Wrong");
}


?>