<?php

require "connection.php";

if (isset($_GET["id"])) {

    $officerId = $_GET["id"];


    $off_rs = Database::search("SELECT * FROM `user`  WHERE `b_code` LIKE '%" . $officerId . "%' ");

    $off_num = $off_rs->num_rows;

    if ($off_num  == 1) {


        $off_data = $off_rs->fetch_assoc();


?>

        <div class="col-12 mt-4">

            <?php

            $loc_rs = Database::search("SELECT visit_location.id,visit_location.user_email,visit_location.location,visit_location.date,visit_location.time,visit_location.amount,visit_location.accuracy,visit_location.customer_nic,
            customer.name AS customer_name , user.first_name AS fname , user.last_name AS lname , user.b_code AS bCode FROM `visit_location` INNER JOIN `customer` ON visit_location.customer_nic = customer.nic INNER JOIN `user` ON visit_location.user_email = user.email WHERE `user`.`b_code` LIKE '%".$off_data["b_code"]."%' ORDER BY `date` DESC ");

            $loc_num  = $loc_rs->num_rows;


            if ($loc_num > 0) {

            ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Branch Code</th>
                            <th scope="col">Officer Name</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        for ($x = 0; $x < $loc_num; ++$x) {
                            $loc_data = $loc_rs->fetch_assoc();

                        ?>

                            <tr class=" " style="height: 60px; ">
                                <th scope="row"><?php echo $x ?></th>
                                <td><?php echo $loc_data["date"]; ?></td>
                                <td><?php echo $loc_data["time"]; ?></td>
                                <td><?php echo $loc_data["bCode"]; ?></td>
                                <td><?php echo $loc_data["fname"]." ".$loc_data["lname"]; ?></td>
                                <td><?php echo $loc_data["customer_name"]; ?> </td>
                                <td><?php echo $loc_data["location"]; ?></td>
                                <td>Rs.<?php echo $loc_data["amount"]; ?>.00</td>
                            </tr>

                        <?php

                        }

                        ?>


                    </tbody>
                </table>

            <?php



            }


            ?>



        </div>


<?php

    }
}else if(empty($_GET["id"])){

    ?>




<div class="col-12 mt-4">

            <?php

            $loc_rs2 = Database::search("SELECT visit_location.id,visit_location.user_nic,visit_location.location,visit_location.date,visit_location.time,visit_location.amount,visit_location.accuracy,visit_location.customer_nic,
            customer.name AS customer_name FROM `visit_location` INNER JOIN `customer` ON visit_location.customer_nic = customer.nic ORDER BY `date` DESC ");

            $loc_num2  = $loc_rs2->num_rows;


            if ($loc_num2 = 0) {

            ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Date</th>
                            <th scope="col">Officer ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Time</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        for ($x = 0; $x < $loc_num2; ++$x) {
                            $loc_data2= $loc_rs2->fetch_assoc();

                        ?>

                            <tr class=" " style="height: 60px; ">
                                <th scope="row"><?php echo $x ?></th>
                                <td><?php echo $loc_data2["date"]; ?></td>
                                <td><?php echo $loc_data2["user_nic"]; ?></td>
                                <td><?php echo $loc_data2["customer_name"]; ?> </td>
                                <td><?php echo $loc_data2["location"]; ?></td>
                                <td><?php echo $loc_data2["time"]; ?></td>
                                <td>Rs.<?php echo $loc_data2["amount"]; ?>.00</td>
                            </tr>

                        <?php

                        }

                        ?>


                    </tbody>
                </table>

            <?php



            }


            ?>



        </div>
    
    
    <?php
}




?>