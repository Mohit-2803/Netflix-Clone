<?php
session_start();
$login = (isset($_SESSION['loggedin'])) ? true : false;

$email = $_SESSION["email"];

if (!isset($_SESSION['email'])) {
    header("location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "partials/_dbconnect.php";

    $password = $_POST['password'];
    $email = $_SESSION['email'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE `netflixtable` SET `password` = '$hash' WHERE `email` = '$email' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['loggedin'] = true;
        $_SESSION['password'] = $hash;
        sleep(2.2);
        header("location: choose.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
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

        #container {
            margin: auto;
            text-align: start;
            width: 460px;
            margin-top: 2rem;
            margin-bottom: 10rem;
        }

        #container h1 {
            font-size: 2rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        #top p {
            font-size: .9rem;
            font-weight: 500;
        }

        span {
            font-weight: 700;
        }

        #down p {
            font-size: 1.1rem;
            font-weight: 400;
            padding-bottom: .65rem;
        }

        form {
            text-align: center;
        }

        form input {
            width: 460px;
            height: 60px;
            margin-top: 1rem;
            font-size: 1rem;
            padding-left: 8px;
            color: rgb(23, 23, 23);
            outline: none;
            border: 1px solid rgba(0, 0, 0, .35);
        }

        form p {
            text-align: start;
            font-size: .8rem;
            color: rgb(216, 0, 0);
            font-weight: 400;
        }

        form button,
        #btnCreated {
            min-width: auto;
            width: 460px;
            height: 60px;
            margin-top: 1.5rem;
            font-size: 1.35rem;
            font-weight: 500;
            color: white;
            background-color: red;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: rgb(206, 0, 0);
        }

        #btnCreated:hover {
            background-color: rgb(206, 0, 0);
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

        h3 {
            text-align: center;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        #email {
            border-color: green;
        }
    </style>
</head>

<header>
    <nav>
        <img src="images/Netflix-Logo.wine.svg" alt="">
        <?php
        if ($login == false) {
            echo '<button id="signin">Sign In</button>';
        } else {
            echo '<button id="signout" onclick="signOut()">Sign Out</button>';
        }
        ?>
    </nav>
</header>

<body>
    <div id="container">
        <div id="top">
            <p>STEP <span>1</span> OF <span>3</span></p>
            <?php
            if (!$login) {
                echo '<h1>Create a password to start your membership</h1>';
            } else {
                echo '<h1>Account Created</h1>';
            }
            ?>
        </div>

        <?php
        if (!$login) {
            echo " 
        <div id='down'>
             <p>Just a few more steps and you're done!</p>
             <p>We hate paperwork, too.</p>
        </div>";
        } else {
            echo "
        <div id='down'>
            <p>Use this email to access your account:</p>
        </div>";
        }
        ?>

        <?php
        if (!$login) {
            echo '
        <div>
            <form action="regform.php" method="post">
                <label for="email">
                    <input type="email" name="email" id="email" autocomplete="off" placeholder="Add a email" required
                        readonly value="' . $email . '">
                    <p id="required1"></p>
                </label>
    
                <label for="password">
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Add a password"
                        required minlength="6" onchange="passwordEvent()">
                    <p id="required2"></p>
                </label>
    
                <button id="btn" type="submit" onclick="check()">NEXT</button>
            </form>
        </div>';
        } else {
            echo '
        <div>
            <h3>' . $email . ' </h3>
            <button id="btnCreated" onclick="clickedForChoose()">NEXT</button>
        </div>';
        }
        ?>
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
        const start = document.getElementById('btn');
        const Created = document.getElementById('btnCreated');
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const user2 = document.getElementById("required1");
        const user3 = document.getElementById("required2");
        const space = /[ ]/;
        let flagE = 0;
        let flagp = 0;
        let emailValue = "";

        // Created.addEventListener('click', () => {
        //     setTimeout(() => {
        //         window.location.href = "choose.php";
        //     }, 1000);
        // });
        function clickedForChoose() {
            setTimeout(() => {
                window.location.href = "choose.php";
            }, 1000);
        };

        function passwordEvent() {
            passValue = password.value;
            if ((passValue.includes(" ")) || passValue.length < 6 || passValue.length > 60 || passValue.replace(/\s/g, "") == "" || passValue == "") {
                if (passValue.replace(/\s/g, "") == "" || passValue == "") {
                    user3.innerHTML = "Password is required"
                    password.style.borderColor = "red";
                    flagp = 1;
                }
                else {
                    flagp = 0;
                }
                if (flagp == 0) {
                    user3.innerHTML = "Password should be between 6 and 60 characters long, with no spaces."
                    password.style.borderColor = "red";
                }
            }
            else {
                user3.innerHTML = ""
                password.style.borderColor = "green";
            }
        };

        function check() {

            passValue = password.value;
            if ((passValue.includes(" ")) || passValue.length < 6 || passValue.length > 60 || passValue.replace(/\s/g, "") == "" || passValue == "") {
                if (passValue.replace(/\s/g, "") == "" || passValue == "") {
                    user3.innerHTML = "Password is required"
                    password.style.borderColor = "red";
                    flagp = 1;
                }
                else {
                    flagp = 0;
                }
                if (flagp == 0) {
                    user3.innerHTML = "Password should be between 6 and 60 characters long, with no spaces."
                    password.style.borderColor = "red";
                }
            }
            else {
                user3.innerHTML = ""
                password.style.borderColor = "green";
            }
        };

        function signOut() {
            setTimeout(() => {
                window.location.href = "logout.php";
            }, 1200);
            // console.log('signpout');
        };
    </script>
</body>

</html>