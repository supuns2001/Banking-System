<?php

require "connection.php";

if (isset($_GET["f"]) && isset($_GET["t"])) {
    $from = $_GET["f"];
    $to =  $_GET["t"];

    $vLoc_rs = Database::search("SELECT * FROM `visit_location` ORDER BY `date` DESC  ");
    $vLoc_num = $vLoc_rs->num_rows;


    // echo($from);
    // echo($to);

    for ($x = 0; $x < $vLoc_num; $x++) {
        $vLoc_data = $vLoc_rs->fetch_assoc();

        $visitDate = $vLoc_data["date"];

        if(!empty($from) && empty($to)){
            if ($from <= $visitDate ) { 

                $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$vLoc_data["customer_nic"]."'");
                $cus_data = $cus_rs->fetch_assoc();

                $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$vLoc_data["user_email"]."' ");
                $user_data = $user_rs->fetch_assoc();

?>

                <tbody id="filterDate">



                    <tr class=" " style="height: 60px; ">
                        <th scope="row"><?php echo $x ?></th>
                        <td><?php echo $vLoc_data["date"]; ?></td>
                        <td><?php echo $vLoc_data["time"]; ?></td>
                        <td><?php echo $user_data["b_code"]; ?></td>
                        <td><?php echo $user_data["first_name"]." ".$user_data["last_name"]; ?></td>
                        <td><?php echo $cus_data["name"];?></td>
                        <td><?php echo $vLoc_data["location"]; ?></td>
                        <td>Rs.<?php echo $vLoc_data["amount"]; ?>.00</td>
                    </tr>



                </tbody>




    <?php


            }
        }else if(empty($from) && !empty($to)){
            if ($to >= $visitDate ) { 

                $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$vLoc_data["customer_nic"]."'");
                $cus_data = $cus_rs->fetch_assoc();

                $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$vLoc_data["user_email"]."' ");
                $user_data = $user_rs->fetch_assoc();

?>

                <tbody id="filterDate">



                    <tr class=" " style="height: 60px; ">
                        <th scope="row"><?php echo $x ?></th>
                        <td><?php echo $vLoc_data["date"]; ?></td>
                        <td><?php echo $vLoc_data["time"]; ?></td>
                        <td><?php echo $user_data["b_code"]; ?></td>
                        <td><?php echo $user_data["first_name"]." ".$user_data["last_name"]; ?></td>
                        <td><?php echo $cus_data["name"];?></td>
                        <td><?php echo $vLoc_data["location"]; ?></td>
                        <td>Rs.<?php echo $vLoc_data["amount"]; ?>.00</td>
                    </tr>



                </tbody>




    <?php


            }
        }else if (!empty($from) && !empty($to)) {

            if ($from <= $visitDate && $to >= $visitDate) {

                $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$vLoc_data["customer_nic"]."'");
                $cus_data = $cus_rs->fetch_assoc();

                $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$vLoc_data["user_email"]."' ");
                $user_data = $user_rs->fetch_assoc();

?>

                <tbody id="filterDate">



                    <tr class=" " style="height: 60px; ">
                        <th scope="row"><?php echo $x ?></th>
                        <td><?php echo $vLoc_data["date"]; ?></td>
                        <td><?php echo $vLoc_data["time"]; ?></td>
                        <td><?php echo $user_data["b_code"]; ?></td>
                        <td><?php echo $user_data["first_name"]." ".$user_data["last_name"]; ?></td>
                        <td><?php echo $cus_data["name"];?></td>
                        <td><?php echo $vLoc_data["location"]; ?></td>
                        <td>Rs.<?php echo $vLoc_data["amount"]; ?>.00</td>
                    </tr>



                </tbody>




    <?php


            }
        }
    }

    ?>


<?php

}

?>