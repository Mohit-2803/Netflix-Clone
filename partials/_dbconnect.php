<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "netflix";


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("sorry we failed to connect to database : " . mysqli_connect_error());
} else{
    // echo "success";
}

?>
