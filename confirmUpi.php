<?php
session_start();
$plan = $_SESSION['plan'];
$email = $_SESSION['email'];

if (isset($_SESSION['checkBack'])) {
    header("location: phoneRecovery.php");
}

$upi = $_SESSION['upiID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['paid'] = 'paid';

    //setting the status paid
    require "partials/_dbconnect.php";
    $sql = "UPDATE `netflixtable` SET `status` = 'paid' WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    sleep(1.5);
    header("location: phoneRecovery.php");
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

        #container h1 {
            font-size: 2rem;
            margin-top: 2.5rem;
            font-weight: 600;
        }

        #planType,
        #planConfirm {
            width: 442px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            background-color: rgb(240, 239, 239);
            border-radius: 2px;
            padding-left: 15px;
            padding-right: 15px;
            margin-top: 1.5rem;
        }

        #planConfirm {
            margin-top: 2px;
        }

        .price {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .price p {
            margin: 0%;
        }

        .rate {
            font-size: 1rem;
            font-weight: 600;
            color: black;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            /* letter-spacing: 1px; */
        }

        .type {
            font-size: .95rem;
            color: rgb(101, 101, 101);
            font-weight: 500;
        }

        #planType a,
        #planConfirm a {
            text-decoration: none;
            color: rgb(0, 98, 255);
            font-weight: 500;
        }


        #info p {
            font-size: .75rem;
            color: rgb(133, 132, 132);
            font-weight: 500;
            margin-top: 1rem;
            margin-right: 3rem;
        }

        #info p a {
            text-decoration: none;
            color: rgb(0, 98, 255);
            font-weight: 500;
        }

        #check {
            width: 25px;
            height: 25px;
        }

        #checkDiv {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: .95rem;
            color: rgb(110, 110, 110);
            font-weight: 500;
            margin-top: 1rem;
        }

        p {
            font-size: .75rem;
            color: brown;
            margin-bottom: .5rem;
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

        .warning {
            display: none;
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

        <div id="top">
            <h1>Confirm your details</h1>
        </div>

        <div id="planType">
            <div class="price">
                <div>
                    <p class="rate">
                        <?php
                        if ($plan == 1) {
                            echo "₹ 649/month";
                        } elseif ($plan == 2) {
                            echo '₹ 499/month';
                        } elseif ($plan == 3) {
                            echo '₹ 199/month';
                        } else {
                            echo '₹ 149/month';
                        }
                        ?>
                    </p>
                </div>
                <div>
                    <p class="type">Mobile</p>
                </div>
            </div>
            <div>
                <a href="plan.php">Change</a>
            </div>
        </div>
        <div id="planConfirm">
            <div class="price">
                <div>
                    <p class="rate">UPI Autopay</p>
                </div>
                <div>
                    <p class="type">
                        <?php echo $upi; ?>
                    </p>
                </div>
            </div>
            <div>
                <a href="upiPayment.php">Edit</a>
            </div>
        </div>

        <div id="info">
            <div>
                <p>Any payment above ₹ 2000 shall need additional authentication.</p>
            </div>

            <div>
                <p>By checking the checkbox below, you agree to our <a href="">
                        Terms of Use, Privacy Statement</a>, and that
                    you are over 18. Netflix will automatically continue your membership and charge the
                    membership fee (currently
                    <?php
                    if ($plan == 1) {
                        echo "₹ 649/month";
                    } elseif ($plan == 2) {
                        echo '₹ 499/month';
                    } elseif ($plan == 3) {
                        echo '₹ 199/month';
                    } else {
                        echo '₹ 149/month';
                    }
                    ?>) to your payment method until you cancel. You may
                    cancel at any time to avoid future charges.
                </p>
            </div>
        </div>

        <form action="confirmUpi.php" method='post'>
            <div id="boxTick">
                <div id="checkDiv">
                    <input type="checkbox" name="check" id="check" required> I agree
                </div>
                <div>
                    <p class="warning" id="checkWarning">You must acknowledge that you have read and agree to the
                        Terms of Use to
                        continue.</p>
                </div>
            </div>

            <div>
                <button type="submit" id="btn" name='submit'>NEXT</button>
            </div>
        </form>
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

        document.getElementById('btn').addEventListener(
            'click',
            checking
        );

        const checkBoxx = document.getElementById('check');

        function checking() {
            //for checkbox 
            if (checkBoxx.checked) {
                checkBoxx.style.borderColor = 'green';
                document.getElementById('checkWarning').style.display = 'none';

            }
            else {
                checkBoxx.style.borderColor = 'red';
                document.getElementById('checkWarning').style.display = 'block';
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