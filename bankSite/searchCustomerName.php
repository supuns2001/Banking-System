<?php

require "connection.php";

if (isset($_GET["name"])) {

    $cusName = $_GET["name"];


    $cus_rs = Database::search("SELECT * FROM `customer`  WHERE `name` LIKE '%" . $cusName . "%' ");

    $cus_num = $cus_rs->num_rows;

    if ($cus_num  == 1) {


        $cus_data = $cus_rs->fetch_assoc();


?>

        <div class="col-12 mt-4">

            <?php

            $cus_rs = Database::search("SELECT visit_location.id,visit_location.user_email,visit_location.location,visit_location.date,visit_location.time,visit_location.amount,visit_location.accuracy,visit_location.customer_nic,
            customer.name AS customer_name FROM `visit_location` INNER JOIN `customer` ON visit_location.customer_nic = customer.nic WHERE `customer`.`name` LIKE '%" . $cus_data["name"] . "%' ORDER BY `date` DESC ");

            $loc_num  = $cus_rs->num_rows;


            if ($loc_num > 0) {

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

                        for ($x = 0; $x < $loc_num; ++$x) {
                            $cus_data = $cus_rs->fetch_assoc();

                        ?>

                            <tr class=" " style="height: 60px; ">
                                <th scope="row"><?php echo $x ?></th>
                                <td><?php echo $cus_data["date"]; ?></td>
                                <td><?php echo $cus_data["user_email"]; ?></td>
                                <td><?php echo $cus_data["customer_name"]; ?> </td>
                                <td><?php echo $cus_data["location"]; ?></td>
                                <td><?php echo $cus_data["time"]; ?></td>
                                <td>Rs.<?php echo $cus_data["amount"]; ?>.00</td>
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
} else if (empty($_GET["name"])) {

    ?>
    <!-- <script>
        window.location.reload();
    </script> -->




    <div class="col-12 mt-4">

        <?php

        $cus_rs = Database::search("SELECT visit_location.id,visit_location.user_email,visit_location.location,visit_location.date,visit_location.time,visit_location.amount,visit_location.accuracy,visit_location.customer_nic,
        customer.name AS customer_name FROM `visit_location` INNER JOIN `customer` ON visit_location.customer_nic = customer.nic  ORDER BY `date` DESC ");

        $loc_num  = $cus_rs->num_rows;


        if ($loc_num > 0) {

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

                    for ($x = 0; $x < $loc_num; ++$x) {
                        $cus_data = $cus_rs->fetch_assoc();

                    ?>

                        <tr class=" " style="height: 60px; ">
                            <th scope="row"><?php echo $x ?></th>
                            <td><?php echo $cus_data["date"]; ?></td>
                            <td><?php echo $cus_data["user_email"]; ?></td>
                            <td><?php echo $cus_data["customer_name"]; ?> </td>
                            <td><?php echo $cus_data["location"]; ?></td>
                            <td><?php echo $cus_data["time"]; ?></td>
                            <td>Rs.<?php echo $cus_data["amount"]; ?>.00</td>
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