<?php
session_start();
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

        #top {
            margin-left: 10rem;
            margin-top: 3rem;
        }

        #top p {
            font-size: .9rem;
            font-weight: 400;
            margin-top: 1rem;
        }

        span {
            font-weight: 500;
        }

        #top h1 {
            font-size: 2rem;
            font-weight: 600;
            color: rgb(41, 41, 41);
        }

        /* For cards */

        #cards {
            display: flex;
            /* justify-content: space-between; */
            gap: 12px;
            margin-left: 10rem;
            margin-right: 10rem;
            height: 505px;
        }

        .card {
            border: 1px solid rgba(115, 115, 115, 0.45);
            padding: .5rem;
            border-radius: 15px;
            height: 451px;
            margin-top: 2rem;
            cursor: pointer;
            transition: .3s linear;
        }

        .card .plan_name {
            background-color: aqua;
            color: white;
            padding: 1.2rem;
            padding-top: .5rem;
            padding-bottom: 3rem;
            border-radius: 15px;
        }

        .card .plan_name h2 {
            font-size: 1.39rem;
            font-weight: 600;
        }

        .card .plan_name p {
            font-size: 1.25rem;
            font-weight: 600;
            color: rgb(199, 207, 214);
        }

        .card .plan_details {
            margin-top: 1.25rem;
        }

        .card .plan_details li {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 15px;
            /* width: 275px; */
            padding-left: 1rem;
            padding-bottom: .9rem;
            padding-top: .75rem;
        }

        .card .plan_details li h3 {
            font-size: .8rem;
            font-weight: 600;
            color: rgb(104, 104, 104);
        }

        .card .plan_details li p {
            font-size: .9rem;
            font-weight: 500;
            color: rgb(68, 68, 68);
        }

        .card .plan_details li i {
            font-size: 1.3rem;
            color: gray;
            transition: .3s linear;
        }


        /* For hover card */
        .big {
            border: 2px solid rgb(165, 165, 165);
            padding: .5rem;
            border-radius: 15px;
            height: 488px;
            margin-top: 1rem;
            cursor: pointer;
            transition: .3s linear;
        }

        .big .plan_name {
            background: radial-gradient(140.76% 131.96% at 100% 100%, rgb(229, 9, 20) 0%, rgba(74, 42, 150, 0.5) 73.57%, rgba(74, 42, 150, 0) 100%), rgb(29, 82, 157);
            color: white;
            padding: 1.2rem;
            padding-top: .5rem;
            padding-bottom: 3rem;
            border-radius: 15px;
        }

        .big .plan_name h2 {
            font-size: 1.39rem;
            font-weight: 600;
        }

        .big .plan_name p {
            font-size: 1.25rem;
            font-weight: 600;
            color: rgb(199, 207, 214);
        }

        .big .plan_details {
            margin-top: 1.25rem;
        }

        .big .plan_details li {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 15px;
            /* width: 275px; */
            padding-left: 1rem;
            padding-bottom: .9rem;
            padding-top: .75rem;
        }

        .big .plan_details li h3 {
            font-size: .8rem;
            font-weight: 600;
            color: rgb(104, 104, 104);
        }

        .big .plan_details li p {
            font-size: .9rem;
            font-weight: 500;
            color: rgb(68, 68, 68);
        }

        .big .plan_details li i {
            font-size: 1.3rem;
            color: rgb(222, 32, 32);
            transition: .3s linear;
        }

        hr {
            width: 240px;
            height: 1px;
            margin-left: 1rem;
            background-color: rgba(137, 137, 137, 0.3);
            border: none;
        }

        #selected,
        #selected1,
        #selected2,
        #selected3 {
            padding: 0%;
            text-align: center;
            justify-content: center;
            gap: 5px;
        }

        #selected p,
        #selected1 p,
        #selected2 p,
        #selected3 p {
            font-size: .85rem;
            font-weight: 600;
            color: rgb(104, 104, 104);
            transition: width 2s, height 2s, transform 2s;
        }

        #selected i,
        #selected1 i,
        #selected2 i,
        #selected3 i {
            color: rgb(104, 104, 104);
            transition: width 2s, height 2s, transform 2s;
        }

        #selected1,
        #selected2,
        #selected3 {
            display: none;
        }

        #price1 p,
        #price2 p,
        #price3 p,
        #price4 p {
            font-size: 1rem;
            font-weight: 500;
        }

        .standard .plan_name {
            background: radial-gradient(140.76% 131.96% at 100% 100%, rgb(176, 56, 220) 0%, rgba(74, 42, 150, 0.5) 73.57%, rgba(74, 42, 150, 0) 100%), rgb(29, 82, 157);
        }

        .basic .plan_name {
            background: radial-gradient(140.76% 131.96% at 100% 100%, rgb(109, 59, 227) 0%, rgba(74, 42, 150, 0.5) 73.57%, rgba(74, 42, 150, 0) 100%), rgb(29, 82, 157);
        }

        .mobile .plan_name {
            background: radial-gradient(140.76% 131.96% at 100% 100%, rgb(33, 114, 227) 0%, rgba(74, 42, 150, 0.5) 73.57%, rgba(74, 42, 150, 0) 100%), rgb(29, 82, 157);
        }

        #para {
            font-size: .8rem;
            color: gray;
            text-align: start;
            margin-left: 10rem;
            margin-right: 10rem;
            margin-top: 1.5rem;
        }

        #btn {
            margin: auto;
            text-align: center;
            margin-top: 1.25rem;
            margin-bottom: 9rem;
        }

        #btn button {
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

        #btn button:hover {
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

        #selected3 {
            margin-top: 1.2rem;
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
    <div id="top">
        <p>STEP <span>2</span> OF <span>3</span></p>
        <h1>Choose the plan that's right for you.</h1>
    </div>

    <div id="cards">
        <div class="card big">
            <div class="plan_name">
                <h2>premium</h2>
                <p>4K + HDR</p>
            </div>

            <div class="plan_details">
                <li id="price1">
                    <div><i class="fa-sharp fa-solid fa-circle-check premiumCheck"></i></div>
                    <div>
                        <h3>Monthly price</h3>
                        <p>Rs. 649</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check premiumCheck"></i></div>
                    <div>
                        <h3>Resolution</h3>
                        <p>4K (Ultra HD) + HDR</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check premiumCheck"></i></div>
                    <div>
                        <h3>Video quality</h3>
                        <p>Best</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check premiumCheck"></i></div>
                    <div>
                        <h3>Supported devices</h3>
                        <p>TV, computer, mobile phone, tablet</p>
                    </div>
                </li>
                <li id="selected">
                    <div><i class="bi bi-check-lg"></i></div>
                    <div>
                        <p>Selected</p>
                    </div>
                </li>
            </div>
        </div>

        <div class="card standard">
            <div class="plan_name" id="plan_name">
                <h2>Standard</h2>
                <p>1080p</p>
            </div>

            <div class="plan_details">
                <li id="price2">
                    <div><i class="fa-sharp fa-solid fa-circle-check standardCheck"></i></div>
                    <div>
                        <h3>Monthly price</h3>
                        <p>Rs. 499</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check standardCheck"></i></div>
                    <div>
                        <h3>Resolution</h3>
                        <p>1080p (Full HD)</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check standardCheck"></i></div>
                    <div>
                        <h3>Video quality</h3>
                        <p>Better</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check standardCheck"></i></div>
                    <div>
                        <h3>Supported devices</h3>
                        <p>TV, computer, mobile phone, tablet</p>
                    </div>
                </li>
                <li id="selected1">
                    <div><i class="bi bi-check-lg"></i></div>
                    <div>
                        <p>Selected</p>
                    </div>
                </li>
            </div>
        </div>

        <div class="card basic">
            <div class="plan_name">
                <h2>basic</h2>
                <p>720p</p>
            </div>

            <div class="plan_details">
                <li id="price3">
                    <div><i class="fa-sharp fa-solid fa-circle-check basicCheck"></i></div>
                    <div>
                        <h3>Monthly price</h3>
                        <p>Rs. 199</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check basicCheck"></i></div>
                    <div>
                        <h3>Resolution</h3>
                        <p>720p (HD)</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check basicCheck"></i></div>
                    <div>
                        <h3>Video quality</h3>
                        <p>Good</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check basicCheck"></i></div>
                    <div>
                        <h3>Supported devices</h3>
                        <p>TV, computer, mobile phone, tablet</p>
                    </div>
                </li>
                <li id="selected2">
                    <div><i class="bi bi-check-lg"></i></div>
                    <div>
                        <p>Selected</p>
                    </div>
                </li>
            </div>
        </div>

        <div class="card mobile">
            <div class="plan_name">
                <h2>Mobile</h2>
                <p>480p</p>
            </div>

            <div class="plan_details">
                <li id="price4">
                    <div><i class="fa-sharp fa-solid fa-circle-check mobileCheck"></i></div>
                    <div>
                        <h3>Monthly price</h3>
                        <p>Rs. 149</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check mobileCheck"></i></div>
                    <div>
                        <h3>Resolution</h3>
                        <p>480p</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check mobileCheck"></i></div>
                    <div>
                        <h3>Video quality</h3>
                        <p>Good</p>
                    </div>
                </li>
                <hr>
                <li>
                    <div><i class="fa-sharp fa-solid fa-circle-check mobileCheck"></i></div>
                    <div>
                        <h3>Supported devices</h3>
                        <p>Mobile phone, tablet</p>
                    </div>
                </li>
                <li id="selected3">
                    <div><i class="bi bi-check-lg"></i></div>
                    <div>
                        <p>Selected</p>
                    </div>
                </li>
            </div>
        </div>
    </div>

    <div id="para">
        <p>HD (720p), Full HD (1080p), Ultra HD (4K) and HDR availability subject to your internet service and device
            capabilities. Not all content is available in all resolutions. See our Terms of Use for more details.
            Only people who live with you may use your account. Watch on 4 different devices at the same time with
            Premium, 2 with Standard, and 1 with Basic and Mobile.</p>
    </div>

    <div id="btn">
        <button id="payment">NEXT</button>
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
        const premium = document.querySelector(".big");
        const standard = document.querySelector(".standard");
        const basic = document.querySelector(".basic");
        const mobile = document.querySelector(".mobile");
        const standardcheck = document.querySelectorAll(".standardCheck");
        const Premiumcheck = document.querySelectorAll(".premiumCheck");
        const basiccheck = document.querySelectorAll(".basicCheck");
        const mobilecheck = document.querySelectorAll(".mobileCheck");
        let selected = 1;

        standard.onclick = function () {
            standard.style.height = "488px";
            standard.style.marginTop = "1rem";
            standard.style.border = "2px solid rgb(165, 165, 165)";
            document.getElementById("selected1").style.display = "flex";
            standardcheck.forEach((item) => item.style.color = "rgb(179, 33, 179)");

            premium.style.height = "451px";
            premium.style.marginTop = "2rem";
            premium.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected").style.display = "none";
            Premiumcheck.forEach((item) => item.style.color = "gray");

            basic.style.height = "451px";
            basic.style.marginTop = "2rem";
            basic.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected2").style.display = "none";
            basiccheck.forEach((item) => item.style.color = "gray");

            mobile.style.height = "451px";
            mobile.style.marginTop = "2rem";
            mobile.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected3").style.display = "none";
            mobilecheck.forEach((item) => item.style.color = "gray");

            selected = 2;
        }

        premium.onclick = function () {
            premium.style.height = "488px";
            premium.style.marginTop = "1rem";
            premium.style.border = "2px solid rgb(165, 165, 165)";
            document.getElementById("selected").style.display = "flex";
            Premiumcheck.forEach((item) => item.style.color = "rgb(222, 32, 32)");

            standard.style.height = "451px";
            standard.style.marginTop = "2rem";
            standard.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected1").style.display = "none";
            standardcheck.forEach((item) => item.style.color = "gray");

            basic.style.height = "451px";
            basic.style.marginTop = "2rem";
            basic.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected2").style.display = "none";
            basiccheck.forEach((item) => item.style.color = "gray");

            mobile.style.height = "451px";
            mobile.style.marginTop = "2rem";
            mobile.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected3").style.display = "none";
            mobilecheck.forEach((item) => item.style.color = "gray");

            selected = 1;
        }

        basic.onclick = function () {
            basic.style.height = "488px";
            basic.style.marginTop = "1rem";
            basic.style.border = "2px solid rgb(165, 165, 165)";
            document.getElementById("selected2").style.display = "flex";
            basiccheck.forEach((item) => item.style.color = "rgb(105, 46, 184)");

            premium.style.height = "451px";
            premium.style.marginTop = "2rem";
            premium.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected").style.display = "none";
            Premiumcheck.forEach((item) => item.style.color = "gray");

            standard.style.height = "451px";
            standard.style.marginTop = "2rem";
            standard.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected1").style.display = "none";
            standardcheck.forEach((item) => item.style.color = "gray");

            mobile.style.height = "451px";
            mobile.style.marginTop = "2rem";
            mobile.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected3").style.display = "none";
            mobilecheck.forEach((item) => item.style.color = "gray");

            selected = 3;
        }

        mobile.onclick = function () {
            mobile.style.height = "488px";
            mobile.style.marginTop = "1rem";
            mobile.style.border = "2px solid rgb(165, 165, 165)";
            document.getElementById("selected3").style.display = "flex";
            mobilecheck.forEach((item) => item.style.color = "rgb(7, 116, 240)");

            premium.style.height = "451px";
            premium.style.marginTop = "2rem";
            premium.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected").style.display = "none";
            Premiumcheck.forEach((item) => item.style.color = "gray");

            standard.style.height = "451px";
            standard.style.marginTop = "2rem";
            standard.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected1").style.display = "none";
            standardcheck.forEach((item) => item.style.color = "gray");

            basic.style.height = "451px";
            basic.style.marginTop = "2rem";
            basic.style.border = "1px solid rgba(115, 115, 115, 0.45)";
            document.getElementById("selected2").style.display = "none";
            basiccheck.forEach((item) => item.style.color = "gray");

            selected = 4;
        }

        const signOut = document.getElementById('signout');

        signOut.addEventListener('click', () => {
            setTimeout(() => {
                window.location.href = "logout.php";
            }, 1200);
            // console.log('signpout');
        });

        const payment = document.getElementById('payment');

        payment.addEventListener('click', () => {

            let plan = selected;
            var url = 'howToPay.php?plan=' + encodeURIComponent(selected);
            window.location.href = url;

            setTimeout(() => {
                window.location.href = "howToPay.php";
            }, 1200);
            // console.log('signpout');
        });

    </script>
</body>

</html>