<?php
$data = json_decode(file_get_contents("php://input"), true);

$servername = "localhost";
$username = "root";
$password = "";
$database = "netflix";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("sorry we failed to connect to database : " . mysqli_connect_error());
} else {
    // echo "Connection was successful";
    // echo PHP_EOL;
}

$email = $data["email"];

//check weather this username exists
$existSql = "SELECT * FROM `netflixtable` WHERE `email`='$email'";
$result = mysqli_query($conn, $existSql);
if (mysqli_num_rows($result) > 0) {
    echo 1;
} else {
    echo 0;
}
?>