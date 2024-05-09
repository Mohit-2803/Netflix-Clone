<?php
session_start();
$_SESSION['checkBack'] = 'set';
$email = $_SESSION['email'];

if(isset($_SESSION['processed'])){
    header('location: main.php');
}
?>

<?php
$showError1 = false;
$login = false;
$showError2 = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $phone = $_POST['phone'];

    if (strlen($phone) == 0) {
        $showError1 = true;
    } else {
        if (strlen($phone) == 12) {
            $login = true;

            //set phone number 
            require "partials/_dbconnect.php";
            $sql = "UPDATE `netflixtable` SET `phone` = '$phone' WHERE `email` = '$email'";
            $result = mysqli_query($conn, $sql);

            $_SESSION['phoneNumber'] = 'set';

            sleep(1.5);
            header('Location: whatDevices.php');

        } else {
            $showError2 = true;
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
    <title>Welcome to Netflix!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="images/icons8-netflix-48.png" type="image/png">

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

        #container {
            margin-left: 34rem;
            margin-right: 32rem;
            text-align: start;
        }

        #container h1 {
            font-size: 2rem;
            margin-top: 2.5rem;
            font-weight: 600;
        }

        #info {
            margin-right: 1rem;
        }

        #info p {
            font-size: 1.1rem;
            margin-top: .8rem;
            font-weight: 400;
        }

        #box {
            width: 440px;
            background-color: rgb(229, 229, 229);
            border-radius: 10px;
            text-align: center;
            font-size: 1.1rem;
            margin-top: .8rem;
            font-weight: 400;
            margin-top: 1.5rem;
            padding: 1rem;
        }

        #setUp {
            font-size: .9rem;
            font-weight: 500;
            color: rgb(116, 116, 116);
            margin-bottom: .5rem;
        }

        img {
            width: 25px;
        }

        #country {
            font-size: .8rem;
            font-weight: 500;
        }

        #logo {
            width: 60px;
            display: flex;
            align-items: center;
            /* justify-content: center; */
            gap: 7px;
            position: relative;
            left: 3rem;
            /* top: 190%; */
            top: 3.4rem;
        }

        form i {
            color: gray;
        }

        form input {
            width: 340px;
            height: 50px;
            font-size: .95rem;
            border: 1px solid rgba(61, 61, 61, .5);
            outline: none;
            cursor: pointer;
            margin-top: 1rem;
            /* text-align: center; */
            padding-left: 6rem;
        }

        form input:focus {
            border-color: blue;
        }

        #btn {
            min-width: auto;
            width: 440px;
            height: 60px;
            background-color: red;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1.3rem;
            font-weight: 500;
            cursor: pointer;
            margin-top: 2rem;
        }

        #btn:hover {
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

        #phoneWarning {
            color: red;
            font-size: .8rem;
            text-align: start;
            margin-left: 2.2rem;
            display: none;
        }


        .warning {
            width: 440px;
            height: 90px;
            margin: auto;
            /* margin-left: 34.8rem; */
            margin-top: 2rem;
            background-color: rgb(216, 157, 49);
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 17px;
            border-radius: 4px;
            margin-right: 4rem;
        }

        .warning p {
            font-size: .9rem;
        }

        .warning i {
            font-size: 1.4rem;
        }

        .success {
            width: 440px;
            height: 90px;
            margin: auto;
            margin-right: 4rem;
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

        .success i {
            font-size: 1.4rem;
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

        <?php
        if ($showError1) {
            echo '<div class="warning">
            <div><i class="bi bi-exclamation-triangle-fill"></i></div>
            <div>
                <p>Your must enter your Phone Number for further process.</p>
            </div>
        </div>';
        }
        ?>

        <?php
        if ($showError2) {
            echo '<div class="warning">
            <div><i class="bi bi-exclamation-triangle-fill"></i></div>
            <div>
                <p>Please enter a Valid Mobile Phone Number.</p>
            </div>
        </div>';
        }
        ?>

        <?php
        if ($login) {
            echo '<div class="success">
            <div><i class="bi bi-check-lg"></i></div>
            <div>
                <p>Phone Number registered successfully</p>
            </div>
        </div>';
        }
        ?>

        <div id="top">
            <h1>Welcome to Netflix!</h1>
        </div>

        <div id="info">
            <p>You've started your membership and we emailed the details to
                <?php echo $email ?>.
            </p>
            <p>Remember you can cancel online anytime in the Account section.</p>
        </div>

        <div id="box">
            <div id="setUp">
                <p>Set up password Recovery</p>
            </div>
            <div>
                <p>Your phone number will be used to help you access and recover your account. Message and data rates
                    may apply.</p>
            </div>
            <div>
                <form action="phoneRecovery.php" method="post" id="myForm">
                    <div id="logo">
                        <img src="images/icons8-india-48.png" alt="">
                        <p id="country">+91</p>
                        <i class="bi bi-caret-down-fill"></i>
                    </div>

                    <div>
                        <input type="text" id="phone" name="phone" required minlength="10"
                            placeholder="Mobile Phone Number" autocomplete="off" maxlength="10">
                        <p id="phoneWarning">Please enter a phone number.</p>
                    </div>
                </form>
            </div>
        </div>

        <div>
            <button id="btn" type='submit' name='submit' form='myForm'>NEXT</button>
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
        let phoneInput = document.getElementById('phone');

        phoneInput.addEventListener('input', function (e) {
            let inputValue = e.target.value;
            inputValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
            inputValue = inputValue.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3'); // Add spaces

            e.target.value = inputValue;
        });

        document.getElementById('btn').onclick = () => {
            if (phoneInput.value.length == 0) {
                phoneInput.style.borderColor = "red";
                document.getElementById('phoneWarning').style.display = "block";
            }
            else if (phoneInput.value.length == 10) {
                phoneInput.style.borderColor = "green";
                document.getElementById('phoneWarning').style.display = "none";
            }
        };

    </script>
</body>

</html>