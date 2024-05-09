<?php
session_start();
$_SESSION['whatDevice'] = 'set';

if(isset($_SESSION['processed'])){
    header('location: main.php');
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
            margin-left: 12rem;
            margin-right: 12rem;
        }

        #left {
            margin-right: 13rem;
        }

        #right {
            margin-top: 2rem;
        }

        .three {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: .7rem;
        }

        .box {
            text-align: center;
            border: 1px solid rgba(137, 137, 137, 0.5);
            border-radius: 4px;
            width: 160px;
            cursor: pointer;
            height: 220px;
        }

        .box h2 {
            font-size: 1.1rem;
            font-weight: 600;
            color: rgb(86, 86, 86);
            position: relative;
            top: -1rem;
            /* left: 2rem; */
        }

        .box p {
            font-size: .75rem;
            padding-left: 10px;
            padding-right: 10px;
            color: gray;
            position: relative;
            top: -1rem;
            /* position: absolute; */
        }

        .bi-tv {
            font-size: 6rem;
            color: rgb(186, 186, 186);
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .bi-phone {
            font-size: 2.6rem;
            color: rgb(186, 186, 186);
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .bi-tablet {
            font-size: 4.2rem;
            color: rgb(186, 186, 186);
            padding-bottom: 0;
            margin-bottom: 0;
            margin-right: 1rem;
            /* margin-top: 2rem; */
        }

        #tab {
            padding-top: 2rem;
            width: 160px;
        }

        #tabHead {
            margin-top: 1rem;
        }

        .bi-laptop {
            font-size: 6rem;
            color: rgb(186, 186, 186);
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .bi-controller {
            font-size: 6rem;
            color: rgb(186, 186, 186);
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .bi-router {
            color: rgb(186, 186, 186);
            padding-bottom: 0;
            margin-bottom: 0;
            font-size: 6rem;
        }

        .bi-cast {
            font-size: 6rem;
            color: rgb(186, 186, 186);
            padding-bottom: 0;
            margin-bottom: 0;
        }

        #stream {
            padding-left: 5px;
            padding-right: 5px;
        }

        #something {
            text-align: center;
            border: 1px solid rgba(137, 137, 137, 0.5);
            border-radius: 4px;
            margin-top: .75rem;
            cursor: pointer;
        }

        #something h2 {
            font-size: 1.1rem;
            font-weight: 600;
            color: rgb(86, 86, 86);
            padding-top: 10px;
        }

        #something p {
            font-size: .75rem;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 18px;
            color: gray;
        }

        #btn {
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
            margin-left: 21rem;
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
        <button id="help">Help</button>
    </nav>
</header>

<body>
    <div id="container">
        <div id="left">
            <div id="top">
                <p>STEP <span>1</span> OF <span>3</span></p>
                <h1>What devices will be you be watching on?</h1>
            </div>
            <div>
                <p>You can watch netflix on any of these devices.<span> Select all that apply.</span></p>
            </div>
        </div>

        <div id="right">
            <div class="three">
                <div class="box" id="box1">
                    <!-- <i class="bi bi-check-circle-fill" id="1"></i> -->
                    <i class="bi bi-tv"></i>
                    <h2>TV</h2>
                    <p>smart or internet connected TVs</p>
                </div>
                <div class="box" id="tab">
                    <!-- <i class="bi bi-check-circle-fill cir" id="2"></i> -->
                    <i class="bi bi-phone"></i>
                    <i class="bi bi-tablet"></i>
                    <h2 id="tabHead">Phone or tablet</h2>
                    <p>Download the netflix app to enjoy</p>
                </div>
                <div class="box" id="box3">
                    <!-- <i class="bi bi-check-circle-fill" id="3"></i> -->
                    <i class="bi bi-laptop"></i>
                    <h2>Computer</h2>
                    <p>Desktop or laptop</p>
                </div>
            </div>

            <div class="three">
                <div class="box" id="box4">
                    <!-- <i class="bi bi-check-circle-fill" id="4"></i> -->
                    <i class="bi bi-controller"></i>
                    <h2>Game console</h2>
                    <p>Connected to the internet</p>
                </div>
                <div class="box" id="box5">
                    <!-- <i class="bi bi-check-circle-fill" id="5"></i> -->
                    <i class="bi bi-cast"></i>
                    <h2 id="stream">Streaming device</h2>
                    <p>Connects your TV to the internet</p>
                </div>
                <div class="box" id="box6">
                    <!-- <i class="bi bi-check-circle-fill" id="6"></i> -->
                    <i class="bi bi-router"></i>
                    <h2>Set-up box</h2>
                    <p>From your cable provider</p>
                </div>
            </div>
            <div id="something">
                <h2>Something else</h2>
                <p>Enjoy netflix with other internet-connected devices</p>
            </div>
            <div>
                <button id="btn">NEXT</button>
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

        document.getElementById('btn').onclick = () => {
            setTimeout(() => {
                window.location.href = "whoIsWatching.php";
            }, 1000);
        };

        const box1 = document.getElementById('box1');
        const box2 = document.getElementById('tab');
        const box3 = document.getElementById('box3');
        const box4 = document.getElementById('box4');
        const box5 = document.getElementById('box5');
        const box6 = document.getElementById('box6');
        const box7 = document.getElementById('something');

        let box1Flag = 0;
        let flag1 = 0

        let box2Flag = 0;
        let flag2 = 0

        let box3Flag = 0;
        let flag3 = 0

        let box4Flag = 0;
        let flag4 = 0

        let box5Flag = 0;
        let flag5 = 0

        let box6Flag = 0;
        let flag6 = 0

        let box7Flag = 0;
        let flag7 = 0

        box1.onclick = () => {
            if (box1Flag == 0) {
                box1.style.border = "2px solid red";
                flag1 = 1
                document.querySelector('.bi-tv').style.color = 'red';
            }
            else {
                box1.style.border = "1px solid rgba(137, 137, 137, 0.5)";
                document.querySelector('.bi-tv').style.color = 'rgb(186, 186, 186)';
                flag1 = 0;
            }

            if (flag1 == 1) {
                box1Flag = 1;
            }
            else {
                box1Flag = 0;
            }
        }

        box2.onclick = () => {
            if (box2Flag == 0) {
                box2.style.border = "2px solid red";
                flag2 = 1
                document.querySelector('.bi-phone').style.color = 'red';
                document.querySelector('.bi-tablet').style.color = 'red';
            }
            else {
                box2.style.border = "1px solid rgba(137, 137, 137, 0.5)";
                document.querySelector('.bi-phone').style.color = 'rgb(186, 186, 186)';
                document.querySelector('.bi-tablet').style.color = 'rgb(186, 186, 186)';
                flag2 = 0;
            }

            if (flag2 == 1) {
                box2Flag = 1;
            }
            else {
                box2Flag = 0;
            }
        }

        box3.onclick = () => {
            if (box3Flag == 0) {
                box3.style.border = "2px solid red";
                flag3 = 1
                document.querySelector('.bi-laptop').style.color = 'red';
            }
            else {
                box3.style.border = "1px solid rgba(137, 137, 137, 0.5)";
                document.querySelector('.bi-laptop').style.color = 'rgb(186, 186, 186)';
                flag3 = 0;
            }

            if (flag3 == 1) {
                box3Flag = 1;
            }
            else {
                box3Flag = 0;
            }
        }

        box4.onclick = () => {
            if (box4Flag == 0) {
                box4.style.border = "2px solid red";
                flag4 = 1
                document.querySelector('.bi-controller').style.color = 'red';
            }
            else {
                box4.style.border = "1px solid rgba(137, 137, 137, 0.5)";
                document.querySelector('.bi-controller').style.color = 'rgb(186, 186, 186)';
                flag4 = 0;
            }

            if (flag4 == 1) {
                box4Flag = 1;
            }
            else {
                box4Flag = 0;
            }
        }

        box5.onclick = () => {
            if (box5Flag == 0) {
                box5.style.border = "2px solid red";
                flag5 = 1
                document.querySelector('.bi-cast').style.color = 'red';
            }
            else {
                box5.style.border = "1px solid rgba(137, 137, 137, 0.5)";
                document.querySelector('.bi-cast').style.color = 'rgb(186, 186, 186)';
                flag5 = 0;
            }

            if (flag5 == 1) {
                box5Flag = 1;
            }
            else {
                box5Flag = 0;
            }
        }

        box6.onclick = () => {
            if (box6Flag == 0) {
                box6.style.border = "2px solid red";
                flag6 = 1
                document.querySelector('.bi-router').style.color = 'red';
            }
            else {
                box6.style.border = "1px solid rgba(137, 137, 137, 0.5)";
                document.querySelector('.bi-router').style.color = 'rgb(186, 186, 186)';
                flag6 = 0;
            }

            if (flag6 == 1) {
                box6Flag = 1;
            }
            else {
                box6Flag = 0;
            }
        }

        box7.onclick = () => {
            if (box7Flag == 0) {
                box7.style.border = "2px solid red";
                flag7 = 1
            }
            else {
                box7.style.border = "1px solid rgba(137, 137, 137, 0.5)";
                flag7 = 0;
            }

            if (flag7 == 1) {
                box7Flag = 1;
            }
            else {
                box7Flag = 0;
            }
        }
    </script>
</body>

</html>