<?php
session_start();
$_SESSION['whoWatching'] = 'set';
$email = $_SESSION['email'];

if(isset($_SESSION['processed'])){
    header('location: main.php');
}

//getting username
require "partials/_dbconnect.php";

$sql = "SELECT `user` FROM `netflixtable` WHERE `email`='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$name = $row['0'];

$sql = "SELECT `user2` FROM `netflixtable` WHERE `email`='$email'";
$result1 = mysqli_query($conn, $sql);
if ($result1) {
    $row = mysqli_fetch_row($result1);
    $name2 = $row['0'];
}

$sql = "SELECT `user3` FROM `netflixtable` WHERE `email`='$email'";
$result2 = mysqli_query($conn, $sql);
if ($result2) {
    $row = mysqli_fetch_row($result2);
    $name3 = $row['0'];
}

$sql = "SELECT `user4` FROM `netflixtable` WHERE `email`='$email'";
$result3 = mysqli_query($conn, $sql);
if ($result3) {
    $row = mysqli_fetch_row($result3);
    $name4 = $row['0'];
}

$sql = "SELECT `user5` FROM `netflixtable` WHERE `email`='$email'";
$result4 = mysqli_query($conn, $sql);
if ($result4) {
    $row = mysqli_fetch_row($result4);
    $name5 = $row['0'];
}
?>

<?php

$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['username'];
    $user2 = $_POST['user2'];
    $user3 = $_POST['user3'];
    $user4 = $_POST['user4'];
    $user5 = $_POST['user5'];


    $sql = "UPDATE `netflixtable` SET `user` = '$user' WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE `netflixtable` SET `user2` = '$user2' WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE `netflixtable` SET `user3` = '$user3' WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE `netflixtable` SET `user4` = '$user4' WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE `netflixtable` SET `user5` = '$user5' WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    sleep(1.4);
    $_SESSION['categoryName'] = $user;
    header('location: category.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Netflix!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="images/icons8-netflix-48.png" type="image/png">
    <script src="https://kit.fontawesome.com/4048592ab8.js" crossorigin="anonymous"></script>

    <style>
        * {
            padding: 0%;
            margin: 0%;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        header nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 12vh;
            width: 100%;
            padding-left: 1.7rem;
            padding-top: 14px;
            padding-bottom: 1.3rem;
            border-bottom: 1px solid rgba(137, 137, 137, 0.3);
        }

        header img {
            width: 210px;
        }

        nav button {
            min-width: auto;
            width: 90px;
            padding: 10px;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: .9rem;
            font-weight: 500;
            color: white;
            background-color: red;
            border: none;
            border-radius: 4px;
            margin-right: 3.5rem;
            cursor: pointer;
        }

        nav button:hover {
            background-color: rgb(194, 2, 2);
        }

        #top {
            margin-bottom: 1.25rem;
        }

        #top p {
            font-size: .8rem;
            font-weight: 500;
            margin-top: 2.5rem;
        }

        span {
            font-weight: 700;
        }

        h1 {
            font-size: 2.2rem;
            font-weight: 600;
        }

        #container {
            display: flex;
            justify-content: space-between;
            margin-left: 15rem;
            margin-right: 15rem;
        }

        #left {
            margin-right: 3rem;
        }

        #right {
            margin-top: 3rem;
        }

        label {
            font-size: 1rem;
            font-weight: 600;
        }

        form input {
            width: 500px;
            height: 60px;
            font-size: 1rem;
            font-weight: 400;
            padding-left: 10px;
            outline: none;
            border: 1px solid rgba(137, 137, 137, 0.7);
            border-radius: 3px;
            margin-top: .5rem;
        }

        form input:focus {
            border-color: blue;
        }

        form i {
            font-size: 1.9rem;
            position: relative;
        }

        .username1 {
            margin-bottom: 3rem;
        }

        .username1,
        .userAdd {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #learn {
            width: 500px;
            height: 60px;
            font-size: .85rem;
            font-weight: 400;
            text-align: center;
            background-color: rgba(202, 202, 202, 0.4);
            margin-top: 1.5rem;
            border-radius: 3px;
            margin-left: 2.5rem;
            padding-top: 18px;
        }

        #learn a {
            /* text-decoration: none; */
            font-weight: 600;
            color: black;
        }

        #btn1 {
            min-width: auto;
            width: 170px;
            height: 45px;
            padding: 10px;
            font-size: .91rem;
            font-weight: 500;
            color: white;
            background-color: red;
            border: none;
            border-radius: 2px;
            /* margin-right: 3.5rem; */
            cursor: pointer;
            margin-top: 2.25rem;
            margin-left: 23rem;
        }

        #btn1:hover {
            background-color: rgb(194, 2, 2);
        }

        footer {
            padding-bottom: 4rem;
            background-color: #ebebeb;
            margin-top: 10rem;
        }

        #heading {
            padding-left: 11rem;
            padding-top: 2rem;
            font-size: 1rem;
            color: rgb(106, 106, 106);
        }

        #heading a {
            color: rgb(128, 128, 128);
            cursor: pointer;
        }

        #details {
            padding-left: 11rem;
            padding-top: 2rem;
            padding-right: 30rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            padding-bottom: 2rem;
            list-style: none;
        }

        #details li {
            padding-bottom: 10px;
        }

        #details li a {
            color: rgb(134, 134, 134);
            font-size: .8rem;
            cursor: pointer;
        }

        #language1 {
            min-width: auto;
            width: 130px;
            padding: 8px;
            padding-top: 2px;
            padding-bottom: 2px;
            font-size: .9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 16px;
            padding-right: 16px;
            background-color: rgba(255, 255, 255, .09);
            border: 1px solid rgba(71, 71, 71, 0.35);
            color: rgb(129, 129, 129);
            border-radius: 4px;
            outline-color: white;
            outline-offset: 3px;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        #language1 .bi {
            color: #686868;
        }

        #language1 .bi-globe {
            font-size: 17px;
        }

        .india {
            margin-left: 11rem;
        }

        .india p {
            color: rgb(84, 84, 84);
        }

        footer p {
            color: #686868;
        }

        .warning {
            width: 440px;
            height: 90px;
            margin: auto;
            margin-left: 34.8rem;
            margin-top: 2rem;
            background-color: rgb(216, 157, 49);
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 17px;
            border-radius: 4px;
        }

        .warning p {
            font-size: .9rem;
        }

        .warning i {
            font-size: 1.4rem;
        }

        #warn {
            font-size: .77rem;
            color: brown;
            display: none;
        }
    </style>

</head>

<header>
    <nav>
        <img src="images/Netflix-Logo.wine.svg" alt="">
        <button id="help">Help</button>
    </nav>
</header>

<body>
    <div id="container">
        <div id="left">
            <div id="top">
                <p>STEP <span>2</span> OF <span>3</span></p>
                <h1>Who will be watching Netflix?</h1>
            </div>
            <div>
                <p>People living in your can enjoy recommendations tailored to thier taste and language Preferences.
                    Great for children.</p>
            </div>
        </div>

        <div id="right">
            <form action="whoIsWatching.php" method="post" id="myForm">
                <label for="username">Your Profile
                    <div class="username1">
                        <div>
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <input type="text" name="username" id="username" placeholder="Name" autocomplete="off"
                                value="<?php echo $name ?>" required>
                            <p id='warn'>Altleast one username is required!</p>
                        </div>
                    </div>
                </label>

                <label for="users">Add profiles?
                    <div>
                        <div class="userAdd">
                            <div>
                                <i class="bi bi-person-add"></i>
                            </div>
                            <div>
                                <input type="text" name="user2" id="user2" placeholder="Name" autocomplete="off" value='<?php if ($result1) {
                                    echo $name2;
                                } ?>'>
                            </div>
                        </div>
                        <div class="userAdd">
                            <div>
                                <i class="bi bi-person-add"></i>
                            </div>
                            <div>
                                <input type="text" name="user3" id="user3" placeholder="Name" autocomplete="off" value='<?php if ($result2) {
                                    echo $name3;
                                } ?>'>
                            </div>
                        </div>
                        <div class="userAdd">
                            <div>
                                <i class="bi bi-person-add"></i>
                            </div>
                            <div>
                                <input type="text" name="user4" id="user4" placeholder="Name" autocomplete="off" value='<?php if ($result3) {
                                    echo $name4;
                                } ?>'>
                            </div>
                        </div>
                        <div class="userAdd">
                            <div>
                                <i class="bi bi-person-add"></i>
                            </div>
                            <div>
                                <input type="text" name="user5" id="user5" placeholder="Name" autocomplete="off" value='<?php if ($result4) {
                                    echo $name5;
                                } ?>'>
                            </div>
                        </div>
                    </div>
                </label>
            </form>

            <div id="learn">
                <p>Only people who live with you may use your account. <a href="">Learn More</a> </p>
            </div>

            <div>
                <button id="btn1" type='submit' name="submit" form='myForm'>NEXT</button>
            </div>
        </div>
    </div>

    <footer>
        <div id="heading">
            <p>Questions? Call <a href="">000-800-919-1694</a></p>
        </div>

        <div id="details">
            <li><a href="">FAQ</a></li>
            <li><a href="">Account</a></li>
            <li><a href="">Investor Relations</a></li>
            <li><a href="">Ways to Watch</a></li>
            <li><a href="">Privacy</a></li>
            <li><a href="">Corporate Information</a></li>
            <li><a href="">Speed Test</a></li>
            <li><a href="">Only on Netflix</a></li>
            <li><a href="">Media Centre</a></li>
            <li><a href="">Jobs</a></li>
            <li><a href="">Terms of Use</a></li>
            <li><a href="">Cookie Preferences</a></li>
        </div>

        <div class="india">
            <button id="language1"><i class="bi bi-globe"></i> English <i class="bi bi-caret-down-fill"></i></button>
            <p>Netflix India</p>
        </div>
    </footer>

    <script>
        document.getElementById('btn1').onclick = () => {
            if (document.getElementById('username').value.length == 0) {
                document.getElementById('username').style.borderColor = "red";
                document.getElementById('warn').style.display = 'block';
            }
            else {
                document.getElementById('username').style.borderColor = "green";
                document.getElementById('warn').style.display = 'none';
            }
        };
    </script>
</body>

</html>