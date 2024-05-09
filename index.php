<?php
session_start();
$login = (isset($_SESSION['loggedin'])) ? true : false;
$processed = (isset($_SESSION['processed'])) ? true : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['processed'])) {
        sleep(1.8);
        header("location: main.php");
        exit;
    } else if (isset($_SESSION['phoneNumber'])) {
        sleep(1.8);
        header("location: whatDevices.php");
    } else if (isset($_SESSION['paid'])) {
        sleep(1.8);
        header("location: phoneRecovery.php");
    } else if (isset($_SESSION['loggedin'])) {
        sleep(1.8);
        header("location: welcomeBack.php");
    } else {
        require "partials/_dbconnect.php";
        $email = $_POST['email'];


        //check weather this username exists
        $existSql = "SELECT * FROM `netflixtable` WHERE `email`='$email'";
        $result = mysqli_query($conn, $existSql);

        //chechking if signup process is finished
        $sql1 = "SELECT `processed` FROM `netflixtable` WHERE `email`='$email'";
        $result1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_row($result1);
        if ($row['0'] == 'yes') {
            sleep(2.5);
            session_start();
            $_SESSION['email'] = $email;
            header("location: signin.php");
        } else if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['email'] = $email;
            sleep(2.5);
            header("location: welcomeBack.php");

        } else {
            $sql = "INSERT INTO `netflixtable` (`email`, `date`) VALUES ('$email', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // $showAlert = true;
                session_start();
                // $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                sleep(2.3);
                header("location: setup.php");
            }
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
    <title>Netflix India - Watch TV Shows Online</title>
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

        header {
            background: url('images/netfllix_back.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 92vh;
            width: 100%;
            margin-bottom: 0;
        }

        #overlay {
            background-color: rgba(0, 0, 0, .6);
            height: 92vh;
            width: 100%;
            box-shadow: inset 0px 130px 45px -10px rgba(0, 0, 0, .6), inset 0px -200px 25px -15px rgba(0, 0, 0, .6);
        }

        #head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 10%;
            width: 100%;
            margin-top: 0;
            padding-top: 18px;
        }

        #head #logo img {
            width: 190px;
        }

        #btn {
            padding-top: 0;
            margin-top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-right: 190px;
        }

        #logo {
            margin-left: 150px;
            padding-top: 5px;
        }

        #language {
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
            background: none;
            border: 1px solid rgba(255, 255, 255, .35);
            color: white;
            border-radius: 4px;
            cursor: pointer;
            /* margin-top: 3rem; */
        }

        #language .bi {
            color: #fff;
        }

        #language .bi-globe {
            font-size: 17px;
        }

        #signin,
        #signout {
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
            cursor: pointer;
        }

        #signin:hover {
            background-color: rgb(194, 2, 2);
        }

        #signout:hover {
            background-color: rgb(194, 2, 2);
        }

        #content {
            color: white;
            text-align: center;
            height: 90%;
            width: 100%;
            padding-top: 13rem;
        }

        #content h1 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        #content p {
            font-size: 1.35rem;
            font-weight: 400;
            margin-bottom: 1.5rem;
        }

        #content h3 {
            font-size: 1.1rem;
            font-weight: 400;
            margin-bottom: .95rem;
        }

        #content form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 4px;
        }

        #content form input {
            min-width: auto;
            width: 376px;
            height: 55px;
            border-radius: 4px;
            border: 1px solid rgba(255, 255, 255, .35);
            background-color: rgba(46, 46, 46, 0.45);
            padding-left: 13px;
            font-size: 1rem;
            color: #fff;
            outline-color: rgba(255, 255, 255, .5);
            outline-offset: 4px;
            outline-width: 1px;
        }

        #content form button,
        #finishUp {
            min-width: auto;
            width: 220px;
            height: 55px;
            background-color: red;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1.3rem;
            font-weight: 500;
            cursor: pointer;
        }

        #content form input::placeholder {
            color: grey;
            font-weight: 500;
            padding-bottom: 10px;
        }

        #content form button:hover {
            background-color: rgb(205, 3, 3);
            transition: .4s;
        }

        #finishUp:hover {
            background-color: rgb(205, 3, 3);
            transition: .4s;
        }

        #content #required {
            text-align: left;
            padding-left: 29rem;
            padding-top: 2px;
            font-size: .8rem;
            font-weight: 500;
            color: red;
            display: none;
        }

        #first_break,
        #second_break,
        #third_break,
        #fourth_break,
        #fifth_break,
        #sixth_break {
            height: 10px;
            width: 100%;
            background-color: rgb(44, 44, 44);
            border: none;
        }

        #second_div {
            background-color: black;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 10rem;
            height: 74vh;
            width: 100%;
        }

        #second_div h2 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
        }

        #second_div p {
            font-size: 1.25rem;
            margin-right: 4rem;
        }

        #second_div img {
            width: 750px;
            padding-right: 10.2rem;
            z-index: 1;
        }

        #third_div {
            background-color: black;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 10rem;
            height: 74vh;
            width: 100%;
        }

        #third_div h2 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            margin-right: 9rem;
        }

        #third_div p {
            font-size: 1.35rem;
            margin-right: 12rem;
        }

        #third_div img {
            width: 600px;
        }

        #fourth_div {
            background-color: black;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 10rem;
            height: 74vh;
            width: 100%;
        }

        #fourth_div h2 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
        }

        #fourth_div p {
            font-size: 1.25rem;
            margin-right: 4rem;
        }

        #fourth_div img {
            width: 750px;
            padding-right: 10.2rem;
        }

        #fifth_div {
            background-color: black;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 10rem;
            height: 74vh;
            width: 100%;
        }

        #fifth_div h2 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            margin-right: 9rem;
        }

        #fifth_div p {
            font-size: 1.35rem;
            margin-right: 12rem;
        }

        #fifth_div img {
            width: 600px;
        }

        #sixth_div {
            background-color: black;
            height: auto;
            color: #fff;
            width: 100%;
        }

        #sixth_div h2 {
            font-size: 2.7rem;
            font-weight: 700;
            text-align: center;
            padding-top: 5rem;
            margin-bottom: 1.8rem;
        }

        #Question_block {
            display: flex;
            flex-direction: column;
            gap: 9px;
            padding-bottom: 2rem;
            margin-bottom: 2rem;
        }

        #sixth_div #Question_block li {
            list-style: none;
            width: 1150px;
            margin: auto;
            /* background-color: grey; */
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        #question1,
        #question2,
        #question3,
        #question4,
        #question5,
        #question6 {
            display: flex;
            justify-content: space-between;
            width: 100%;
            height: 84px;
            font-size: 1.5rem;
            font-weight: 500;
            padding-top: 25px;
            padding-left: 17px;
            padding-right: 17px;
            color: #fff;
            background-color: rgb(45, 45, 45);
            transition: .3s linear;
        }

        #question1:hover,
        #question2:hover,
        #question3:hover,
        #question4:hover,
        #question5:hover,
        #question6:hover {
            background-color: rgb(75, 75, 75);
        }

        #question1 .bi,
        #question2 .bi,
        #question3 .bi,
        #question4 .bi,
        #question5 .bi,
        #question6 .bi {
            position: relative;
            font-size: 3.2rem;
            top: -1rem;
            cursor: pointer;
        }

        #question1 .fa-solid,
        #question2 .fa-solid,
        #question3 .fa-solid,
        #question4 .fa-solid,
        #question5 .fa-solid,
        #question6 .fa-solid {
            position: relative;
            font-size: 1.65rem;
            padding-right: 1rem;
            cursor: pointer;
        }

        #answer1,
        #answer2,
        #answer3,
        #answer4,
        #answer5,
        #answer6 {
            width: 100%;
            height: auto;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            padding-left: 1rem;
            font-size: 1.5rem;
            background-color: rgb(45, 45, 45);
            display: none;
        }

        .question_btn {
            padding-bottom: 5rem;
        }

        .question_btn h3 {
            font-size: 1.1rem;
            font-weight: 400;
            margin-bottom: .95rem;
            text-align: center;
        }

        .question_btn form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 4px;
        }

        .question_btn form input {
            min-width: auto;
            width: 376px;
            height: 55px;
            border-radius: 4px;
            border: 1px solid rgba(255, 255, 255, .35);
            background-color: rgba(46, 46, 46, 0.45);
            padding-left: 13px;
            font-size: 1rem;
            color: #fff;
            outline-color: rgba(255, 255, 255, .5);
            outline-offset: 4px;
            outline-width: 1px;
        }

        .question_btn form button {
            min-width: auto;
            width: 200px;
            height: 55px;
            background-color: red;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1.3rem;
            font-weight: 500;
            cursor: pointer;
        }

        .question_btn form input::placeholder {
            color: grey;
            font-weight: 500;
        }

        .question_btn form button:hover {
            background-color: rgb(205, 3, 3);
            transition: .4s;
        }

        #seventh_div {
            width: 100%;
            height: auto;
            padding-bottom: 4.5rem;
            background-color: black;
        }

        #heading {
            padding-left: 11rem;
            padding-top: 4.5rem;
            font-size: 1rem;
            color: rgb(153, 153, 153);
        }

        #heading a {
            color: rgb(153, 153, 153);
            cursor: pointer;
        }

        #details {
            padding-left: 11rem;
            padding-top: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            padding-bottom: 2rem;
            list-style: none;
        }

        #details li {
            padding-bottom: 10px;
        }

        #details li a {
            color: rgb(153, 153, 153);
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
            border: 1px solid rgba(255, 255, 255, .35);
            color: white;
            border-radius: 4px;
            outline-color: white;
            outline-offset: 3px;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        #language1 .bi {
            color: #fff;
        }

        #language1 .bi-globe {
            font-size: 17px;
        }

        .india {
            margin-left: 11rem;
        }

        .india p {
            color: #fff;
        }

        /* for videos */

        .feature {
            padding: 2rem 1rem;
            /* background-color: black; */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature__title {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            padding-left: 10rem;
            color: #fff;
        }

        .feature__sub__title {
            font-size: 1.25rem;
            margin-right: 4rem;
            text-align: left;
            padding-left: 10rem;
            margin-right: 12rem;
            color: #fff;
        }

        .feature__image__container {
            width: 750px;
            position: relative;
            right: 11rem;
        }

        .feature__image {
            width: 100%;
        }

        .feature__backgroud__video__container {
            position: absolute;
            width: 100%;
            top: 20%;
            left: 13%;
            height: 100%;
            max-width: 73%;
            max-height: 54%;
            z-index: -2;
        }

        .feature__backgroud__video {
            width: 100%;
        }

        body {
            background-color: black;
        }

        #download {
            position: absolute;
            left: 19%;
            top: 208%;
            height: 90px;
            width: 330px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 18px;
            background-color: black;
        }

        #photo_starnger img {
            /* height: 70px; */
            width: 65px;
            padding-left: 1rem;
            /* margin-top: 125px; */
        }

        #gif img {
            /* height: 60px; */
            width: 50px;
            margin-right: 10px;
        }

        #stranger {
            font-size: 1rem;
        }

        #stranger h3 {
            padding: 0;
            margin: 0;
            font-size: 1rem;
            font-weight: 500;
            margin-right: 3rem;
        }

        #stranger p {
            padding: 0;
            margin: 0;
            font-size: .85rem;
            margin-right: 3rem;
            color: rgb(0, 102, 255);
        }

        .feature__3__backgroud__video__container {
            max-width: 63%;
            max-height: 47%;
            z-index: -2;
            top: 9%;
            left: 19%;
        }

        .language {
            position: relative;
            text-align: center;
            color: black;
            background-color: white;
            border-radius: 4px;
            display: none;
        }

        .lang_hover:hover {
            background-color: rgb(29, 123, 255);
            color: #fff;
            /* border-radius: 4px; */
        }
    </style>
</head>

<header>
    <div id="overlay">
        <div id="head">
            <div id="logo"><img src="images/Netflix-Logo.wine.svg" alt=""></div>
            <div id="btn">
                <div id="langOutline">
                    <button id="language"><i class="bi bi-globe"></i> English <i
                            class="bi bi-caret-down-fill"></i></button>
                    <div class="language">
                        <div class="lang_hover" id="english">English</div>
                        <div class="lang_hover" id="hindi">Hindi</div>
                    </div>
                </div>
                <?php
                if ($login == false) {
                    echo '<button id="signin" onclick="submitted()">Sign In</button>';
                } else {
                    echo '<button id="signout" onclick="signOut()">Sign Out</button>';
                }
                ?>
            </div>
        </div>

        <div id="content">
            <?php
            if ($login) {
                echo '<p id="welcomeBack">Welcome Back!</p>';
            }
            ?>
            <h1>
                Unlimited movies, TV shows and more
            </h1>
            <p>
                Watch anywhere. Cancel anytime.
            </p>
            <div>
                <?php
                if ($login == false && $processed == false) {
                    echo ' <h3>
                              Ready to watch? Enter your email to create or restart your membership.
                          </h3>
                          <form action="index.php" method="post">
                               <input type="email" id="email" name="email" placeholder="Email address" autocomplete="off"
                                 required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="yourtext@domain.com"><button type="submit" id="started" onclick="start()">Get Started <i
                                  class="bi bi-chevron-right"></i></button>
                          </form>';
                } elseif ($processed == true) {
                    echo ' <form action="index.php" method="post">
                    <button type="submit" id="finishUp" name="submit">Go to Netflix<i class="bi bi-chevron-right"></i></button> </form>
                      ';
                } else {
                    echo ' <form action="index.php" method="post">
                        <button type="submit" id="finishUp" name="submit">Finish setting Up <i class="bi bi-chevron-right"></i></button> </form>
                          ';
                }
                ?>

            </div>
            <p id="required"><i class="bi bi-patch-exclamation-fill"></i> Email is required*</p>
        </div>
    </div>
</header>

<body>

    <hr id="first_break">
    <div id="back_color">
        <div class="feature">
            <div class="feature__details">
                <h3 class="feature__title">Enjoy on your TV.</h3>
                <h5 class="feature__sub__title">
                    Watch on smart TVs, PlayStation, Xbox, Chromecast, Apple TV,
                    Blu-ray players and more.
                </h5>
            </div>
            <div class="feature__image__container">
                <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/tv.png"
                    alt="Feature image" class="feature__image" />
                <div class="feature__backgroud__video__container">
                    <video autoplay="" loop="" muted="" class="feature__backgroud__video">
                        <source
                            src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-tv-in-0819.m4v"
                            type="video/mp4" />
                    </video>
                </div>
            </div>
        </div>
    </div>
    <hr id="second_break">
    <div id="third_div">
        <div>
            <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/mobile-0819.jpg" alt="">
        </div>

        <div>
            <h2>Download your shows to watch offline</h2>
            <p>Save your favourites easily and always have something to watch.</p>

            <div id="download">
                <div id="photo_starnger">
                    <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/boxshot.png"
                        alt="">
                </div>
                <div id="stranger">
                    <h3>Stranger Things</h3>
                    <p>Downloading...</p>
                </div>
                <div id="gif">
                    <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/download-icon.gif"
                        alt="downloading gif" class="gif" />
                </div>
            </div>

        </div>
    </div>
    <hr id="third_break">
    <div class="feature">
        <div class="feature__details">
            <h3 class="feature__title">Watch everywhere.</h3>
            <h5 class="feature__sub__title">
                Stream unlimited movies and TV shows on your phone, tablet,
                laptop, and TV.
            </h5>
        </div>
        <div class="feature__image__container feature__3__image__container">
            <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/device-pile-in.png"
                alt="Feature image" class="feature__image feature__3__image" />
            <div class="
        feature__backgroud__video__container
        feature__3__backgroud__video__container
      ">
                <video autoplay="" loop="" muted="" class="feature__backgroud__video feature__3__backgroud__video">
                    <source
                        src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-devices-in.m4v"
                        type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
    <hr id="fourth_break">
    <div id="fifth_div">
        <div>
            <img src="https://occ-0-1009-300.1.nflxso.net/dnm/api/v6/19OhWN2dO19C9txTON9tvTFtefw/AAAABcP49QA_MBbiVxTKVXPBboKPaOe5Lwwk5HwkQ4kgf0B997QbxljlGGmNMua338tvcBEUg-plCFXsCZmkoQoYflHdxgfwjOP5rgeQ.png?r=df8"
                alt="">
        </div>

        <div>
            <h2>Create profiles for kids</h2>
            <p>Send children on adventures with their favourite characters in a space made just for them—free with your
                membership.</p>
        </div>
    </div>
    <hr id="fifth_break">
    <div id="sixth_div">

        <h2>Frequently Asked Questions</h2>

        <div id="Question_block">
            <li class="question">
                <div id="question1">
                    <div>what is Netflix ?</div>
                    <div id="plus_cross1"><i class="bi bi-plus" id="plus1"></i></div>
                </div>
                <div id="answer1">
                    <span>Netflix is a streaming service that offers a wide variety of award-winning TV shows,
                        movies, anime, documentaries and more - on thousands of internet-connected devices.</span>
                    <br>
                    <br>
                    <span>You can watch as much as you want, whenever you want, without a single ad - all for one
                        low monthly price. There's always something new to discover, and new TV shows and movies are
                        added
                        every week!</span>
                </div>
            </li>

            <li class="question">
                <div id="question2">
                    <div>How much does Netflix cost ?</div>
                    <div id="plus_cross2"><i class="bi bi-plus" id="plus2"></i></div>
                </div>
                <div id="answer2">
                    <span> Watch Netflix on your smartphone, tablet, Smart TV, laptop, or streaming device, all for one
                        fixed monthly fee. Plans range from ₹ 149 to ₹ 649 a month. No extra costs, no contracts.</span>
                    </span>

                </div>
            </li>

            <li class="question">
                <div id="question3">
                    <div>where can I watch ?</div>
                    <div id="plus_cross3"><i class="bi bi-plus" id="plus3"></i></div>
                </div>
                <div id="answer3">
                    <span>Watch anywhere, anytime. Sign in with your Netflix account to watch instantly on the web at
                        netflix.com from your personal computer or on any internet-connected device that offers the
                        Netflix app, including smart TVs, smartphones, tablets, streaming media players and game
                        consoles.</span>
                    <br>
                    <br>
                    <span>You can also download your favourite shows with the iOS, Android, or Windows 10 app. Use
                        downloads to watch while you're on the go and without an internet connection. Take Netflix with
                        you anywhere.</span>
                </div>
            </li>

            <li class="question">
                <div id="question4">
                    <div>How do I cancel ?</div>
                    <div id="plus_cross4"><i class="bi bi-plus" id="plus4"></i></div>
                </div>
                <div id="answer4">
                    <span>Netflix is flexible. There are no annoying contracts and no commitments. You can easily cancel
                        your account online in two clicks. There are no cancellation fees - start or stop your account
                        anytime.</span>

                </div>
            </li>

            <li class="question">
                <div id="question5">
                    <div>what can I watch on Netflix ?</div>
                    <div id="plus_cross5"><i class="bi bi-plus" id="plus5"></i></div>
                </div>
                <div id="answer5">
                    <span>Netflix has an extensive library of feature films, documentaries, TV shows, anime,
                        award-winning Netflix originals, and more. Watch as much as you want, anytime you want.</span>

                </div>
            </li>

            <li class="question">
                <div id="question6">
                    <div>Is Netflix good for Kids ?</div>
                    <div id="plus_cross6"><i class="bi bi-plus" id="plus6"></i></div>
                </div>
                <div id="answer6">
                    <span>The Netflix Kids experience is included in your membership to give parents control while kids
                        enjoy family-friendly TV shows and films in their own space.
                    </span>
                    <br>
                    <br>
                    <span>Kids profiles come with PIN-protected parental controls that let you restrict the maturity
                        rating of content kids can watch and block specific titles you don't want kids to see.</span>
                </div>
            </li>

        </div>

        <div class="question_btn">
            <h3>
                Ready to watch? Enter your email to create or restart your membership.
            </h3>
            <form action="">
                <input type="email" id="email1" name="email1" placeholder="Email address" required><button>Get Started
                    <i class="bi bi-chevron-right"></i></button>
            </form>
        </div>
    </div>
    <hr id="sixth_break">
    <div id="seventh_div">

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
            <li><a href="">Contact Us</a></li>
            <li><a href="">Legal Notices</a></li>
            <li><a href="">Help Centre</a></li>
        </div>

        <div class="india">
            <button id="language1"><i class="bi bi-globe"></i> English <i class="bi bi-caret-down-fill"></i></button>
            <p>Netflix India</p>
        </div>
    </div>

    <script>

        function signOut() {
            setTimeout(() => {
                window.location.href = "logout.php";
            }, 1200);
            // console.log('signpout');
        };

        function submitted() {
            setTimeout(() => {
                window.location.href = "signin.php";
            }, 1000);
        }
    </script>

    <script src="app.js"></script>
</body>

</html>