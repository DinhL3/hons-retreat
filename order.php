<?php
//connect to DB host, or show error message and end script if unsuccessful
$mysqli = new mysqli(
    "srv02958.soton.ac.uk",
    "MANG6531_student",
    "tintin6531",
    "mgmt_webapp_msc"
);

if ($mysqli->connect_error) {
    error_log("Connect failed: " . $mysqli->connect_error);
    die("Connect failed: " . $mysqli->connect_error);
}

//formulate SQL query to obtain holiday information
$get_holidays_sql = "SELECT holidayid, package, packagedetails, cost, duration FROM holiday";
//send query and store result set in $result
$result = $mysqli->query($get_holidays_sql);

if (!$result) {
    error_log("Query failed: " . $mysqli->error);
    die("Query failed: " . $mysqli->error);
}

//go through the result set, putting each row into an associative array $result_row
$holidays = [];
while ($result_row = $result->fetch_assoc()) {
    //put the row details into an array
    $holidays[] = $result_row;
}

$mysqli->close();

// Convert the holidays array to a JSON string
$json = json_encode($holidays);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <link rel="stylesheet" href="./css/form.css" />
    <link rel="stylesheet" href="./css/order.css" />
    <link rel="shortcut icon" href="assets/icons/favicon.ico" type="image/x-icon" />
    <script>
        var data = <?php echo $json; ?>;
    </script>
    <script src="./js/order.js"></script>
    <title>Order a package</title>
</head>

<body>
    <?php include 'components/nav.php'; ?>
    <?php include 'components/order-content.php'; ?>
    <?php include 'components/footer.php'; ?>
</body>

</html>