<?php

// require "connection.php";

$dataPoints = array(
    array("y" => 3373.64, "label" => "Germany"),
    array("y" => 2435.94, "label" => "France"),
    array("y" => 1842.55, "label" => "China"),
    array("y" => 1828.55, "label" => "Russia"),
    array("y" => 1039.99, "label" => "Switzerland"),
    array("y" => 765.215, "label" => "Japan"),
    array("y" => 612.453, "label" => "Netherlands")
);

$today = date("Y-m-d");
$thismonth = date("m");
$year = explode('-', $today);
$thisyear  = $year[0];




// echo($today);
// echo($thismonth);
// echo($thisyear);


$test = array();

$count = 0;

$user_rs = Database::search("SELECT * FROM `user`");
$user_num = $user_rs-> num_rows;


for ($x = 0; $x < $user_num; $x++) {

   

    $user_data = $user_rs->fetch_assoc();

    $d_amount = "0";



    $monthlyCollection_rs = Database::search("SELECT * FROM `visit_location` WHERE `user_email` = '" . $user_data["email"] . "' ");
    $monthlyCollection_num = $monthlyCollection_rs->num_rows;

    for ($y = 0; $y < $monthlyCollection_num; $y++) {

        $monthlyCollection_data = $monthlyCollection_rs->fetch_assoc();

        $colletion_date = $monthlyCollection_data["date"];

        $splitDate = explode("-", $colletion_date);
        $LYear = $splitDate[0]; //year
        $LMonth = $splitDate[1]; //month

        if($LYear == $thisyear){
            if($LMonth == $thismonth){
                $d_amount = $d_amount + $monthlyCollection_data["amount"];
            }
        }
        $test[$count]["y"] = $d_amount;

        // echo ($d_amount);

    }

   


    $test[$count]["label"] = $user_data["last_name"];
   
    $count = $count + 1;
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Monthly Target"
                },
                axisY: {
                    title: "Monthly Trager (in LKR)"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.00 LKR",
                    dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>