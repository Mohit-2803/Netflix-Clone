<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location: index.php");
    exit;
} elseif (isset($_SESSION['choosing'])) {
    sleep(1.5);
    header("location: choose.php");
    exit;
} elseif (isset($_SESSION['category'])) {
    sleep(1.5);
    header("location: category.php");
    exit;
} elseif (isset($_SESSION['whoWatching'])) {
    sleep(1.5);
    header("location: whoIsWatching.php");
    exit;
} elseif (isset($_SESSION['whatDevice'])) {
    sleep(1.5);
    header("location: whatDevices.php");
    exit;
}
?>

<?php
$showError1 = false;
$showError2 = false;
$login = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require "partials/_dbconnect.php";

    $email = $_SESSION['email'];
    $password = $_POST['password'];

    if (strlen($password) == 0) {
        $showError1 = true;
    } else {
        $sql = "SELECT * FROM `netflixtable` WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $login = true;
                    $showError2 = false;
                    $_SESSION['loggedin'] = true;

                    //chechking if signup process is finished
                    $sql1 = "SELECT `processed` FROM `netflixtable` WHERE `email`='$email'";
                    $result1 = mysqli_query($conn, $sql1);
                    $row = mysqli_fetch_row($result1);

                    //chechking if paid process is finished
                    $sql2 = "SELECT `status` FROM `netflixtable` WHERE `email`='$email'";
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
                    $showError1 = false;
                    $login = false;
                }
            }
        } else {
            $login = false;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neflix</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/4048592ab8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/icons8-netflix-48.png" type="image/png">

    <style>
        * {
            padding: 0%;
            margin: 0%;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
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
            width: 80px;
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

        footer {
            padding-bottom: 4rem;
            background-color: #ebebeb;
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

        .container {
            text-align: start;
        }


        #top p {
            font-size: .85rem;
            margin-top: 3rem;
            margin-left: 35rem;
            margin-right: 38rem;
        }

        span {
            font-weight: 500;
        }

        #span1 {
            font-weight: 500;
        }

        h1 {
            font-size: 1.9rem;
            font-weight: 600;
            margin-left: 35rem;
            margin-right: 38rem;
        }

        #para {
            margin-bottom: 1.7rem;
            margin-top: .5rem;
            font-size: 1.1rem;
            margin-left: 35rem;
            margin-right: 34rem;
        }

        #email {
            margin-left: 35rem;
            margin-right: 38rem;
        }

        form {
            margin-left: 35rem;
            margin-right: 38rem;
            display: grid;
            gap: 1rem;
            margin-top: 1.2rem;
            margin-bottom: 11rem;
        }

        form input {
            width: 440px;
            height: 60px;
            font-size: 1rem;
            outline: none;
            padding-left: 10px;
            cursor: pointer;
            border: 1px solid rgba(71, 71, 71, 0.35);
        }

        form input:focus {
            border-color: blue;
        }

        form button {
            min-width: auto;
            width: 440px;
            height: 60px;
            background-color: red;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1.29rem;
            font-weight: 500;
            cursor: pointer;
        }

        form button:hover {
            background-color: rgb(205, 3, 3);
            transition: .4s;
        }

        #required {
            color: red;
            font-size: .85rem;
            display: none;
        }

        #forgot a {
            text-decoration: none;
            font-size: 1rem;
            color: #0071eb;
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

        .success {
            width: 440px;
            height: 90px;
            margin: auto;
            margin-left: 34.8rem;
            margin-top: 2rem;
            background-color: lightgreen;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 17px;
            border-radius: 4px;
        }

        .success p {
            font-size: .9rem;
        }

        .warning i {
            font-size: 1.4rem;
        }
    </style>
</head>

<header>
    <nav>
        <img src="images/Netflix-Logo.wine.svg" alt="">
        <button>Sign In</button>
    </nav>
</header>

<body>

    <div class="container">

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
            echo '<div class="warning">
            <div><i class="bi bi-exclamation-triangle-fill"></i></div>
            <div>
                <p>Incorrect password. Please try again or you can <a href="">reset your password.</a></p>
            </div>
        </div>';
        }
        ?>

        <?php
        if ($login) {
            echo '<div class="success">
            <div><i class="bi bi-check-lg"></i></div>
            <div>
                <p>You are logged in Successfully</p>
            </div>
        </div>';
        }
        ?>

        <div id="top">
            <p>STEP <span>1</span> OF <span>3</span></p>
            <h1>Welcome back! Joining Netflix is easy.</h1>
        </div>

        <div id='para'>
            <p>Enter your password and you'll be watching in no time.</p>
        </div>

        <div id='email'>
            <p>Email</p>
            <p id='span1'>
                <?php echo $_SESSION['email'] ?>
            </p>
        </div>

        <div>
            <form action="welcomeBack.php" method="POST">
                <label for="password">
                    <input type="password" name="password" id="password" placeholder="Enter Your Password"
                        minlength="4">
                    <p id="required"><i class="bi bi-patch-exclamation-fill"></i> Password is required*</p>
                </label>

                <label for="forgot" id='forgot'>
                    <a href="">Forgot your Password ?</a>
                </label>

                <button type="submit" name="submit" id='submit'>NEXT</button>
            </form>
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
        const input = document.getElementById('password');
        const btn = document.getElementById('submit');

        btn.onclick = () => {
            if (input.value == "") {
                document.getElementById('required').style.display = "block";
                input.style.borderColor = 'red';
            } else if (input.value.length >= 1 && input.value.length < 5) {
                document.getElementById('required').style.display = "block";
                document.getElementById('required').innerHTML = "Password should be between 4 and 60 characters long.";
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = 'green';
                document.getElementById('required').style.display = "none";
            }
        }
    </script>
</body>

</html>