<?php
session_start();
$_SESSION['choosing'] = 'set';

if (isset($_SESSION['checkBack'])) {
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
            width: 100px;
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
            text-align: center;
            margin-top: 7rem;
            width: 370px;
            margin-top: 8rem;
            margin-bottom: 10rem;
        }

        #container h1 {
            font-size: 2rem;
            font-weight: 500;
            margin-top: .5rem;
        }

        #container i {
            font-size: 2.75rem;
            color: red;
            margin-bottom: 1.8rem;
        }

        #top p {
            font-size: .9rem;
            font-weight: 500;
            margin-top: 1rem;
        }

        span {
            font-weight: 700;
        }

        #down {
            margin-left: 3rem;
            margin-right: 3rem;
            margin-top: 2rem;
        }

        #down i {
            font-size: 2rem;
            color: red;
        }

        #down li {
            list-style: none;
            font-size: 1.1rem;
            font-weight: 400;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        #check {
            padding-bottom: 1rem;
        }

        .check_para {
            text-align: left;
        }

        #container button {
            min-width: auto;
            width: 320px;
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

        #container button:hover {
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
    </style>
</head>

<header>
    <nav>
        <img src="images/Netflix-Logo.wine.svg" alt="">
        <button id='signout'>Sign Out</button>
    </nav>
</header>

<body>
    <div id="container">
        <div id="top">
            <i class="bi bi-check-circle"></i>
            <p>STEP <span>2</span> OF <span>3</span></p>
            <h1>Choose your plan.</h1>
        </div>
        <div id="down">
            <li>
                <div id="check"><i class="bi bi-check-lg"></i></div>
                <div class="check_para">No commitments, cancel anytime.</div>
            </li>
            <li>
                <div id="check"><i class="bi bi-check-lg"></i></div>
                <div class="check_para">Everything on Netflix for one low price.</div>
            </li>
            <li>
                <div id="check"><i class="bi bi-check-lg"></i></div>
                <div class="check_para">No ads and no extra fees. Ever.</div>
            </li>
        </div>
        <div>
            <button id='btn'>NEXT</button>
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
        document.getElementById('btn').onclick = () => {
            setTimeout(() => {
                window.location.href = "plan.php";
            }, 1600);
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