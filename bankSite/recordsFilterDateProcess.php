<?php

require "connection.php";

if (isset($_GET["e"])) {

    $user_email = $_GET["e"];

    $fromD = $_POST["fDate"];
    $toD = $_POST["toDate"];


    // echo($user_email);
    // echo($fromD);
    // echo($toD);

    $rec_rs = Database::search("SELECT * FROM `visit_location` WHERE `user_email` = '" . $user_email . "' ORDER BY `date` DESC ");

    $rec_num = $rec_rs->num_rows;

    for ($x = 0; $x < $rec_num; $x++) {

        $rec_data = $rec_rs->fetch_assoc();

        $rec_date = $rec_data["date"];

        if (!empty($fromD) && empty($toD)) {
            if ($fromD <= $rec_date) {

                $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$rec_data["customer_nic"]."'");
                $cus_data = $cus_rs->fetch_assoc();

?>

                <tbody id="DateFilterrecord">
                    

                        <tr>
                            <th scope="row"><?php echo $x + "1"; ?></th>
                            <td><?php echo $rec_data["date"]; ?></td>
                            <td><?php echo $rec_data["time"]; ?></td>
                            <td><?php echo $cus_data["name"]; ?></td>
                            <td><?php echo $rec_data["location"]; ?></td>
                            <td>RS.<?php echo $rec_data["amount"]; ?>.00</td>
                        </tr>

                </tbody>

<?php

            }
        } else if (empty($fromD) && !empty($toD)) {
            if ($toD = $rec_date) {
               
                
                $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$rec_data["customer_nic"]."'");
                $cus_data = $cus_rs->fetch_assoc();

?>

                <tbody id="DateFilterrecord">
                    
 
                        <tr>
                            <th scope="row"><?php echo $x + "1"; ?></th>
                            <td><?php echo $rec_data["date"]; ?></td>
                            <td><?php echo $rec_data["time"]; ?></td>
                            <td><?php echo $cus_data["name"]; ?></td>
                            <td><?php echo $rec_data["location"]; ?></td>
                            <td>RS.<?php echo $rec_data["amount"]; ?>.00</td>
                        </tr>

                </tbody>

<?php

            }
        } else if (!empty($fromD) && !empty($toD)) {
            if ($fromD <= $rec_date && $toD >= $rec_date) {
                
                
                
                $cus_rs = Database::search("SELECT * FROM `customer` WHERE `nic` = '".$rec_data["customer_nic"]."'");
                $cus_data = $cus_rs->fetch_assoc();

?>

                <tbody id="DateFilterrecord">
                    

                        <tr>
                            <th scope="row"><?php echo $x + "1"; ?></th>
                            <td><?php echo $rec_data["date"]; ?></td>
                            <td><?php echo $rec_data["time"]; ?></td>
                            <td><?php echo $cus_data["name"]; ?></td>
                            <td><?php echo $rec_data["location"]; ?></td>
                            <td>RS.<?php echo $rec_data["amount"]; ?>.00</td>
                        </tr>

                </tbody>

<?php

            }
        }
    }
}

?>