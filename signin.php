<?php
session_start();
$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : false;
if (isset($_SESSION['processed'])) {
    sleep(.8);
    header('location: main.php');
}
?>

<?php
$showError1 = false;
$showError2 = false;
$showError3 = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "partials/_dbconnect.php";

    $email1 = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($password) == 0) {
        $showError1 = true;
    }

    $sql1 = "SELECT `email` FROM `netflixtable` WHERE `email`='$email1'";
    $result1 = mysqli_query($conn, $sql1);
    $num = mysqli_num_rows($result1);

    if ($num == 1) {
        $sql = "SELECT `password` FROM `netflixtable` WHERE `email`='$email1'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;

            //chechking if signup process is finished
            $sql1 = "SELECT `processed` FROM `netflixtable` WHERE `email`='$email1'";
            $result1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_row($result1);

            //chechking if paid process is finished
            $sql2 = "SELECT `status` FROM `netflixtable` WHERE `email`='$email1'";
            $result2 = mysqli_query($conn, $sql2);
            $row1 = mysqli_fetch_row($result2);

            if ($row["0"] == 'yes') {
                sleep(1.5);
                header("location: main.php");
            } else if ($row1["0"] == 'paid') {
                // sleep(1.5);
                header("location: whatDevices.php");
            } else {
                // sleep(2.5);
                header("location: choose.php");
            }
        } else {
            $showError2 = true;
        }
    } else {
        $showError3 = true;
        unset($_SESSION['email']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix - Sign In</title>
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

        header {
            background: url('images/netfllix_back.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: auto;
            width: 100%;
            margin-bottom: 0;
        }

        #overlay {
            background-color: rgba(0, 0, 0, .6);
            height: auto;
            width: 100%;
            box-shadow: inset 0px 100px 45px -10px rgba(0, 0, 0, .6), inset 0px -100px 25px -15px rgba(0, 0, 0, .6);
        }

        #logo {
            width: 100%;
            height: 50px;
            margin-top: 0;
            padding-left: 25px;
            padding-top: 0;
        }

        #logo img {
            width: 190px;
        }

        #box {
            text-align: center;
            margin-top: 3rem;
            /* border: 1px solid white; */
            margin-left: 33rem;
            margin-right: 33rem;
            padding: 4.5rem;
            background-color: rgba(0, 0, 0, .75);
            padding-top: 3.5rem;
            height: 85vh;
        }

        #box h1 {
            text-align: start;
            color: white;
            font-weight: 600;
            padding-left: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 1.5rem;
        }

        form input {
            width: 310px;
            height: 50px;
            border: none;
            outline: none;
            border-radius: 3px;
            background: #333;
            color: white;
            font-size: .95rem;
            font-weight: 500;
            padding-left: 15px;
            /* border-bottom: 2px solid #e87c03; */
        }

        form input:focus {
            background: #434343;
        }

        form button {
            width: 310px;
            height: 50px;
            border-radius: 3px;
            border: none;
            background: red;
            font-size: .98rem;
            font-weight: 500;
            /* text-align: center; */
            margin-left: .20rem;
            margin-top: 2rem;
            color: white;
        }

        form button:hover {
            background: rgb(172, 1, 1);
        }

        #inside {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        #bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 5px;
            padding-right: 7px;
            color: #b3b3b3;
            font-size: 13px;
        }

        #bottom a {
            text-decoration: none;
            color: #b3b3b3;
            font-size: 13px;
        }

        #check {
            width: 17px;
            height: 17px;
            background: #333;
        }

        #down {
            margin-top: 4rem;
            text-align: start;
        }

        #protect {
            color: #8c8c8c;
            font-size: 13px;
            margin-top: 11px;
        }

        #protect a {
            color: #0071eb;
            text-decoration: none;
        }

        #new {
            color: #737373;
            font-size: 16px;
            font-weight: 400;
        }

        #new a {
            color: #fff;
            text-decoration: none;
        }

        footer {
            padding-bottom: 4rem;
            background-color: rgba(0, 0, 0, .75);
            margin-top: 10rem;
            padding-top: 2rem;
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
            background-color: rgba(0, 0, 0, .75);
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

        .warn {
            color: #e87c03;
            font-size: .72rem;
            text-align: start;
            margin-top: 2px;
            margin-left: 5px;
            margin-right: 0;
            display: none;
        }

        .warning {
            width: 97%;
            height: auto;
            margin: auto;
            /* margin-left: rem; */
            /* margin-top: .5rem; */
            background-color: rgb(232, 124, 3);
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 17px;
            border-radius: 4px;
            color: white;
        }

        .warning p {
            font-size: .9rem;
        }

        .warning i {
            font-size: 1.4rem;
            color: black;
        }

        .warning2 {
            width: 97%;
            height: auto;
            margin: auto;
            /* margin-left: rem; */
            /* margin-top: .5rem; */
            background-color: rgb(232, 124, 3);
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 17px;
            border-radius: 4px;
            color: white;
            text-align: left;
        }

        .warning2 p {
            font-size: .9rem;
        }

        .warning2 i {
            font-size: 1.4rem;
            color: black;
        }

        .warning2 a {
            color: #fff;
        }

        .warning2 span {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <header>
        <div id="overlay">
            <div id="logo">
                <img src="images/Netflix-Logo.wine.svg" alt="">
            </div>

            <div id="backBox">
                <div id="box">
                    <h1>Sign In</h1>
                    <form action="signin.php" method="post">
                        <?php
                        if ($showError1) {
                            echo '<div class="warning">
                                      <div><i class="bi bi-exclamation-triangle-fill"></i></div>
                                      <div>
                                          <p>Your password must contain between 4 and 60 characters.</p>
                                      </div>
                                  </div>';
                        }
                        ?>

                        <?php
                        if ($showError2) {
                            echo '<div class="warning2">
                                      <div>
                                          <p><span>Incorrect password</span>. Please try again or you can <a href="">reset your password.</a></p>
                                      </div>
                                  </div>';
                        }
                        ?>

                        <?php
                        if ($showError3) {
                            echo "<div class='warning2'>
                                      <div>
                                          <p>Sorry, we can't find an account with this email address. Please try again or create a new account.</p>
                                      </div>
                                  </div>";
                        }
                        ?>
                        <div>
                            <input type="text" name="email" id="email" required placeholder="Email or Phone number"
                                autocomplete="off" value='<?php if ($email) {
                                    echo $email;
                                } ?>'>
                            <p class="warn" id="emailWarn">Please enter a valid email address or phone number.</p>
                        </div>

                        <div>
                            <input type="password" name="password" id="password" required placeholder="Password"
                                autocomplete="off" oninput="submitted()">
                            <p class="warn" id="passWarn">Your password must contain between 4 and 60 characters.</p>
                        </div>

                        <button type="submit" id="submit" name="submit">Sign In</button>

                        <div id="bottom">
                            <label for="check">
                                <div id="inside"><input type="checkbox" name="check" id="check"> Remember me</div>
                            </label>

                            <p><a href="">Need help?</a></p>
                        </div>
                    </form>

                    <div id="down">
                        <p id="new">New to Netflix?<span><a href=""> Sign up now.</a></span></p>
                        <p id="protect">This page is protected by Google reCAPTCHA to ensure you're not a bot. <a
                                href="">Learn more.</a></p>
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
                    <button id="language1"><i class="bi bi-globe"></i> English <i
                            class="bi bi-caret-down-fill"></i></button>
                    <p>Netflix India</p>
                </div>
            </footer>
        </div>
    </header>

    <script>
        document.getElementById('submit').addEventListener('click', submitted);

        function submitted() {
            if (document.getElementById('email').value.length == 0) {
                document.getElementById('email').style.borderBottom = "2px solid #e87c03";
                document.getElementById('emailWarn').style.display = "block";
            } else {
                document.getElementById('email').style.borderBottom = "none";
                document.getElementById('emailWarn').style.display = "none";
            }

            if (document.getElementById('password').value.length == 0 || document.getElementById('password').value.length < 4) {
                document.getElementById('password').style.borderBottom = "2px solid #e87c03";
                document.getElementById('passWarn').style.display = "block";
            } else {
                document.getElementById('password').style.borderBottom = "none";
                document.getElementById('passWarn').style.display = "none";
            }
        };
    </script>
</body>

</html>