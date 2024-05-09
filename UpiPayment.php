<?php
session_start();

if (isset($_SESSION['upiID'])) {
    unset($_SESSION['upiID']);
    // header("location: howToPay.php");
}
if (isset($_SESSION['checkBack'])) {
    header("location: phoneRecovery.php");
}
?>

<?php
$showError1 = false;
$login = false;
$showError2 = false;
$set = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $upi = $_POST['upi'];
    if (isset($_POST['variable'])) {
        $variable = $_POST['variable'];
    }

    if (strlen($upi) == 0 || $variable == 0) {
        $showError1 = true;
    } else {
        if (str_contains($upi, '@oksbi') || str_contains($upi, '@icici') || str_contains($upi, '@HDFC') || str_contains($upi, '@axis')) {
            $login = true;
            $_SESSION['upiID'] = $upi;

            //set name
            $email = $_SESSION['email'];
            require "partials/_dbconnect.php";
            $string = $upi;
            $character = '@';

            $position = strpos($string, $character);
            if ($position !== false) {
                $newstring = substr($string, 0, $position);
                $Sql = "UPDATE `netflixtable` SET `user` = '$newstring' WHERE `email` = '$email'";
                $result = mysqli_query($conn, $Sql);

                if ($result) {
                    sleep(2);
                    header('Location: confirmUpi.php');
                }
            }

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
    <title>Netflix</title>
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

        #top p {
            font-size: .9rem;
            font-weight: 500;
            margin-top: 2.5rem;
        }

        span {
            font-weight: 700;
        }

        #container h1 {
            font-size: 2rem;
            font-weight: 600;
        }

        #down {
            margin-top: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 1.2rem;
        }

        form input {
            width: 440px;
            height: 60px;
            padding-left: 10px;
            outline: none;
            font-size: 1rem;
            border: 1px solid rgba(137, 137, 137, 0.83);
            border-radius: 2px;
        }

        #upi:focus {
            border-color: blue;
        }

        form p {
            font-size: .75rem;
            color: brown;
            margin-bottom: .5rem;
            display: none;
        }

        #selectWarning {
            margin-top: 0;
            padding-top: 0;
        }

        form button {
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
            margin-top: 1rem;
        }

        form button:hover {
            background-color: rgb(205, 3, 3);
            transition: .4s;
        }

        #UPI {
            display: flex;
            align-items: center;
        }

        form i {
            font-size: 1.2rem;
            color: rgb(46, 46, 46);
            position: relative;
            right: 160%;
            top: 40.5%;
            cursor: pointer;
        }

        img {
            width: 29px;
        }

        #list {
            list-style: none;
            background-color: white;
            width: 440px;
            border: 1px solid rgba(71, 71, 71, 0.35);
            position: relative;
            top: -1rem;
            display: none;
        }

        #list li {
            display: flex;
            align-items: center;
            gap: 13px;
            padding-left: 10px;
            padding-bottom: 11px;
            padding-top: 11px;
        }

        #list li:hover {
            background-color: rgb(234, 234, 234);
            cursor: pointer;
        }

        #topli {
            padding-top: 14px;
        }

        form a {
            text-decoration: none;
            color: rgb(0, 98, 255);
            font-weight: 400;
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
        <button id="signout">Sign Out</button>
    </nav>
</header>

<body>

    <div id="container">

        <?php
        if ($showError1) {
            echo '<div class="warning">
            <div><i class="bi bi-exclamation-triangle-fill"></i></div>
            <div>
                <p>Your must enter your UPI for further Payment process.</p>
            </div>
        </div>';
        }
        ?>

        <?php
        if ($showError2) {
            echo '<div class="warning">
            <div><i class="bi bi-exclamation-triangle-fill"></i></div>
            <div>
                <p>Please enter a Valid UPI ID</p>
            </div>
        </div>';
        }
        ?>

        <?php
        if ($login) {
            echo '<div class="success">
            <div><i class="bi bi-check-lg"></i></div>
            <div>
                <p>Confirm the Payment</p>
            </div>
        </div>';
        }
        ?>

        <div id="top">
            <p>STEP <span>3</span> OF <span>3</span></p>
            <h1>Set up UPI AutoPay</h1>
        </div>

        <div id="down">
            <p>You can change this recurring payment any time in your settings</p>
        </div>

        <div>
            <form action="UpiPayment.php" method="post" id="myForm">
                <div>
                    <div id="UPI">
                        <div>
                            <input type="hidden" name="variable" id="hiddenInput">
                            <input type="text" name="upi_type" id="upi_type" readonly value="Select your UPI app">
                        </div>
                        <div class="arrow">
                            <i class="bi bi-caret-down-fill"></i>
                        </div>
                    </div>
                    <p id="selectWarning">Please Select a UPI Method.</p>
                </div>

                <div id="list">
                    <li id="topli"><img src="images/icons8-bhim-48.png" alt=""> BHIM UPI</li>
                    <li id="google"><img src="images/icons8-google-pay-india-48.png" alt=""> Google Pay</li>
                    <li id="paytm"><img src="images/icons8-paytm-48.png" alt=""> Paytm</li>
                    <li id="phone"><img src="images/icons8-phone-pe-48.png" alt=""> Phone-Pe</li>
                    <li id="amazon"><img src="images/icons8-amazon-48.png" alt=""> Amazon Pay</li>
                    <li id="other"><img src="images/icons8-ellipsis-48.png" alt=""> Others</li>
                </div>

                <div id="upi_num">
                    <input type="text" name="upi" id="upi" placeholder="UPI ID" required autocomplete="off">
                    <p id="upiWarning">Please enter a valid UPI ID.</p>
                </div>

                <div>
                    <a
                        href="https://en.wikipedia.org/wiki/Unified_Payments_Interface#:~:text=Unified%20Payments%20Interface%20(UPI)%20is,funds%20between%20two%20bank%20accounts.">How
                        do I find my UPI ID?</a>
                </div>

                <div>
                    <button id="btn" type="submit" name="submit">NEXT</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('UPI').addEventListener('click', clicked);
        let flag = 0;
        let flagCheck = 0;
        let Selected = 0;

        function clicked() {
            if (flag == 0) {
                document.getElementById('list').style.display = "block";
                document.querySelector('.arrow').innerHTML = '<i class="bi bi-caret-up-fill"></i>';
                flagCheck = 1;
            }

            if (flag == 1) {
                document.getElementById('list').style.display = "none";
                document.querySelector('.arrow').innerHTML = '<i class="bi bi-caret-down-fill"></i>';
                flagCheck = 0;
            }

            if (flagCheck == 1) {
                flag = 1;
            }
            else {
                flag = 0;
            }
        }

        document.getElementById('topli').onclick = () => {
            document.getElementById('list').style.display = "none";
            document.getElementById('upi_type').value = ' BHIM UPI';
            document.querySelector('.arrow').innerHTML = '<i class="bi bi-caret-down-fill"></i>';
            document.getElementById('selectWarning').style.display = 'none';
            Selected = 1;
            flag = 0;
        }
        document.getElementById('google').onclick = () => {
            document.getElementById('list').style.display = "none";
            document.getElementById('upi_type').value = ' Google Pay UPI';
            document.getElementById('selectWarning').style.display = 'none';
            Selected = 1;
            flag = 0;
        }
        document.getElementById('paytm').onclick = () => {
            document.getElementById('list').style.display = "none";
            document.getElementById('upi_type').value = ' Paytm UPI';
            document.querySelector('.arrow').innerHTML = '<i class="bi bi-caret-down-fill"></i>';
            document.getElementById('selectWarning').style.display = 'none';
            Selected = 1;
            flag = 0;
        }
        document.getElementById('phone').onclick = () => {
            document.getElementById('list').style.display = "none";
            document.getElementById('upi_type').value = ' Phone-Pe UPI';
            document.querySelector('.arrow').innerHTML = '<i class="bi bi-caret-down-fill"></i>';
            document.getElementById('selectWarning').style.display = 'none';
            Selected = 1;
            flag = 0;
        }
        document.getElementById('amazon').onclick = () => {
            document.getElementById('list').style.display = "none";
            document.getElementById('upi_type').value = ' Amazon Pay UPI';
            document.querySelector('.arrow').innerHTML = '<i class="bi bi-caret-down-fill"></i>';
            document.getElementById('selectWarning').style.display = 'none';
            Selected = 1;
            flag = 0;
        }
        document.getElementById('other').onclick = () => {
            document.getElementById('list').style.display = "none";
            document.getElementById('upi_type').value = ' Other UPI';
            document.querySelector('.arrow').innerHTML = '<i class="bi bi-caret-down-fill"></i>';
            document.getElementById('selectWarning').style.display = 'none';
            Selected = 1;
            flag = 0;
        }

        document.getElementById('btn').onclick = () => {
            document.getElementById('hiddenInput').value = Selected;

            if (Selected != 1) {
                document.getElementById('selectWarning').style.display = 'block';
            }
            else {
                document.getElementById('selectWarning').style.display = 'none';
            }
            if (document.getElementById('upi').value.length == 0) {
                document.getElementById('upi').style.borderColor = "red";
                document.getElementById('upiWarning').style.display = "block";
            }
            else {

                document.getElementById('upi').style.borderColor = "green";
                document.getElementById('upiWarning').style.display = "none";
            }
        }

        const signOut = document.getElementById('signout');

        signOut.addEventListener('click', () => {
            setTimeout(() => {
                window.location.href = "logout.php";
            }, 1200);
            // console.log('signpout');
        });
    </script>
</body>

</html>