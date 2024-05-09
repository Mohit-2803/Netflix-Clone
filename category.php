<?php
session_start();
$_SESSION['category'] = 'set';
$email = $_SESSION['email'];
$name = $_SESSION['categoryName'];

if(isset($_SESSION['processed'])){
    header('location: main.php');
}
?>

<?php
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myVariable = $_POST['myVariable'];

    if ($myVariable > 2) {
        sleep(1.2);
        $showError = false;
        require "partials/_dbconnect.php";
        $sql = "UPDATE `netflixtable` SET `processed` = 'yes' WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        $_SESSION['processed'] = 'set';
        header("location: main.php");
    } else {
        $showError = true;
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
            margin-left: 15rem;
            margin-right: 15rem;
        }

        #left {
            margin-right: 3rem;
        }

        #right {
            margin-top: 3rem;
            margin-left: 2rem;
        }

        #boxes img {
            width: 130px;
            border-radius: 3px;
        }

        #boxes {
            width: auto;
            height: auto;
        }

        .four {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 9px;
        }

        .box {
            border: 4px solid white;
            border-radius: 6px;
            height: 80.5px;
            padding: 0;
            margin: 0;
            cursor: pointer;
        }

        #btn {
            width: 200px;
            height: 40px;
            font-size: .95rem;
            font-weight: 500;
            border: none;
            color: white;
            background-color: red;
            border-radius: 4px;
            cursor: pointer;
            transition: .4s;
            margin-top: 18px;
            margin-left: 22.5rem;
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

        #warning p {
            font-size: .9rem;
            color: brown;
            font-weight: 500;
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
                <p>STEP <span>3</span> OF <span>3</span></p>
                <h1><?php echo $name; ?>, Select 3 you like.</h1>
            </div>
            <div>
                <p>This helps us to find TV shows and movies you'll love. <span>Select the ones you like.</span></p>
            </div>

            <form method="post" action="category.php" id='myform'>
                <input type="hidden" name="myVariable" id="myVariable">
            </form>
        </div>

        <div id="right">
            <div id="boxes">
                <div class="four">
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABZObFUOVBT45jj3fXo7SuvCMMhHQH__YJSxd7sWKIrvOz5osQVksw4fkJZJBA0uq7WkHIoCrLxhVBYYKSWarIap2lPoU2IuMeHYLdeldEXtds5SYlDYqwidXUtMrr1plYB8UCMZ57FCQwpkmPu2ZAd0TLBGZ_SgF-D_qJLTbCK2WJx-eSHk21XsYy2iCrsPi888hPnJ-XQhG3qq10eHFBkUfoGP6vuGBkCkO2aa-dvTDOeg8am0-EaazmvCSB1YDbR1T6ZKVRjRklENOFJ5MK85PLZE8kNdWhY-7_cjNMQ-8hBSUTHSxs30_Yew5PLggI1AOJjsGujp7h1s6MqgLWwSH258OKFqdnwx4qNIkanPDerR517yzrmyQ3MhRxiQ6eVt5LCmmdK2ZGEghG-onr_WLRMCP9fMDgvyHLMCArsGwIg.webp?r=e1b%22"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABTF6OeDtx5QcmucV05rWrMPWa7btLXUUD7Hy_36_7GIhWjGBJfj_YGY595BKECdidj62DwMeCausnlRoP0JxTp6hKemxP3RUC8iMaDp9K-eZYd8zX0BXJuWTzuOcVq0eM6MVx3zR9teC1Y4hgB4jCaB8FAzWpKAYyuSTPJhhICIHEs2SuZxjF7zOUaXRp0aK.jpg?r=42a"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABfHJPSe-HF7FfZzQpQJGe0TJlAZB6WZZhNhpEFl5dIfK7bO4AWr4KkFktKNz4cCY5RHVX-vzOLBYNY-MQ_-1iguRlnOdDxC8oHs1XP8iT-0Z0TlFxEAKn99-FxcTA0rewI6vkw.jpg?r=501"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABb4QrONkk_08zveFWUqwzbnsz6mE_wh6T-piiNSVj1CMI8U0R8g6pCBVXc-S__Sr-86rHSh_8ZU4thJxA_bu-IOrd5YIVMF2pK7z.webp?r=777"
                            alt="">
                    </div>
                </div>
                <div class="four">
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABbFYOVzxsBwM0X2rPGsEkZ_HhApzKofFgU9XBcLRkoRxh4rZ8KAu6FqXjogBT9la12MfXjEKT_RGjNLZ2PMNIQWppVaGJQ4FQ3ehjTTniDqPZ1E-aoNADRzd3Gs3bNFwQ6lCUqCbkxl8lO4QGuu-JMVv_UaI2O2LMWFfq6DbQ7ahjyK8478NKg2dl9JGlh7n.jpg?r=4d2"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABa_xAIpXv2iYlnNT6n8bgO1SMVppi1Sc5fHHIy7W0p__R3-VKqsnwXI7IeW5M0cn3uVDKk67SnhwBoyNU2xBUhHi6PaN2JA8PJxwChUhZ0ifbW9RdWfPIcuXimk_F5LMAQBhcloRaU2bd4ikMkUKL08LRl1ZJTQ4j3I2s_0JToMyKR_Oexxv9CGGukZGC7TC.jpg?r=695"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABbFUnnyN3kQ6hVBBZ6aKAeCt4cvjkbxDbQQeZofOpCMcsWSkY-4dyU_F1Gmhn_Z3uaKyHAvCTPUL81OZDCWjGyf3zl7XYXQ69Wvp.webp?r=01d"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABY1QPEhbAKknNJ1x8IlXg4yuhYdwaeTfWkBMrNl5qjR5b3Qi54GZukQPvTvoNBAyOSSVSBRTKzGjSF0pFt3FYXmLBsksCtvfAZL9glB5m_al3UFIRxrwohGcQ2DGDkL_IXHa.jpg?r=4f6"
                            alt="">
                    </div>
                </div>
                <div class="four">
                    <div class="box">
                        <img src="https://occ-0-2774-2773.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABUfDF6o2CQxIPJ3mh0VaUwY3QVe__E1d3rK9a9NieFdkxm_XRLKFy0spw6FMy8CUwg32e-lieLGmAfr4vgj9sHpe1C6zALw3yMrhyjR_Z3_0CA8BU6DAVSnJ93_JdXsqaQcMWA.jpg?r=f95"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-2774-2773.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABf9auUb1277uAsiflWUNZUwtN_OoXi-yKsIC9rIvOXISTKerZbswdI-yA29vZvXzuk1wDCfCY1RX4goyvS2DC0seHlkn8lIMqi8C.webp?r=d0a"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-2774-2773.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABf8GlfEPNJtReNff7HL5jwCpRnRX5n_-pbSVDw4I_V3_-P4FlynA_Cp7hka0TVtY3tqA7bgAWYVobBIcRuw-tvZqpcmzt_fYjL_K9P65UkKo0cnfyxyQLjE6l3z6ocBIXA-SDdRbQzFFXc7Bc_iDE4oyrv8MJj5uODQcFZznFVwOQFvMv-oPlGND9Y7HiQJp.jpg?r=891"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-2774-2773.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABYsdfZ-U3PmUekTl_EyF3j2WFY8DRTHAlQu4mthWWfQ1upH7ykrqzvjQ9RPvKrPxCilyIomUQ22iPgfpRDXFD5jfD7cW_ObJ5pp9.webp?r=75b"
                            alt="">
                    </div>
                </div>
                <div class="four">
                    <div class="box">
                        <img src="https://occ-0-2774-2773.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABRlDwXBSSEw5mD5-c7GenArJstzwubgbCU3352Yari9Rp-thy3VrtGmp2UWvu5en3Z0eHvb4AJB9_5yY3GeLhoGlVuXzWFJ29aHE.webp?r=a69"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-2774-2773.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABZ0Jrlhq76CvwHDK95vWu3kEaSQ8jTrqv6_y7bviDMMaQU3r00uIyb_khRz7I5WCppapNBYh82-801dnqRTN-kejXzlYTmRHhW_E.webp?r=8d0"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABTz83euH6Cnl-jAtrsdg0QjysT5hvUj0kW9M08J8IzT42QC8zolj0Y5VBy91dbS6L242LBbnVc-OAuzx8AKFdIVYKzn_2_bPvxk.webp?r=83c"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABRu2TkawoO7K6hDcaIDtJoCyc6dU7qBiLFmluyFgxN-pWSqW1vOvelyN5ypIp0jJ9ifskeWtOjnvdqScibJq0sxFSNNwyTDeHqDI.webp?r=aa7"
                            alt="">
                    </div>
                </div>
                <div class="four">
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABXcQI2iq06czPTGGHo2T5ukwZac_3dYp1gD94tfov8_5RaKzRexxwFZOQrNkHILiuzlUvyR76TUXmKeEsz0Ngz6CAV_f4DftjLUf.webp?r=4f7"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABYdzddtukrbKnZD9fC7PkWmpCVxvKlViXRsBabvlrZtM_BqRc70gra5ZwP3b8LMSgnbeVGCUdzPY8_4TyIJvWd0VivVCXSvLiiY4dyVJWbNSZSGhrfEnoSwPY5_Amy1i5qNJxA.jpg?r=393"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABdY-6Tw17pbNEnxoTeEbvBwo9dymu_TG2Ch_nEC_t8kFxZt4F4MFFiyFnLe5x1YIQfpCvma1vjB9JAAcOyA6Yay9NmvHGKqIAB5g.webp?r=888"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABd06ovvq0Nu5TxSffoBz6ysP2paYXUdt1iNRXWY5rkrlxFEcK6rMNs8X34AWiY12OxiypoN7nraAazuNiu1eK2XNwsiDFE_nuz8q1Sh1LS_BCoXasdLHQK6KethQfI38WpbA7w.jpg?r=681"
                            alt="">
                    </div>
                </div>
                <div class="four">
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABQp1b1wdyqU7Gt0_DPJCfJsP9rj-jMKAQ24FUkJ6rtaYphfnGIoFkfPXL2kD5qlwGeGZe2u3hZK5js8a71mb3E2X_5Bs_F98gnE57H9HIUBZIVD7nWYdqDAz5DB0bdq-3hb72A.jpg?r=136"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABcV7AUFXb6wwLLf1cPqu6yplRRRcsk72M8W46_qP-GXp4XglRvSNawn5JVeenpAlSBGQvMfPA1ykQ-JL8uihDDOCNWxY45aEk3TW660l87ddJN950V7SfKSdqt_hGFMByEPEAQ.jpg?r=74a"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABSTaCUnc1wGCwjdVuHsKjl7M0i8hL7Y3lb25_8WFBtIRAhpfJ8-aMAoi7SpMyUKGwhMnpbqt2N7NBxrXdqkG3xZGTj2ZUOT3Eek31oZfO7j_0PQwgefzgqEUcOh1F9nA3QK-4Q.jpg?r=3ab"
                            alt="">
                    </div>
                    <div class="box">
                        <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABYr4Ae322fHytgYguNXS3lP2U8fJK2ZZZwxU73sIgNZ4hZSrL8g3RaprA-AQ-WGJsFFqPGABW3C6Ot5UZmtwzVzFL__0Wcpw-_U.webp?r=4e0"
                            alt="">
                    </div>
                </div>
            </div>

            <?php
            if ($showError) {
                echo '<div id="warning">
                <p>Please select atleast three of these!</p>
            </div>';
            }
            ?>

            <div>
                <button id="btn" type="submit" name='submit' form='myform'>
                    Pick 3 to continue
                </button>
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
        let box = document.querySelectorAll('.box');
        let variableValue = 0;

        box.forEach(element => {
            element.onclick = () => {
                if (element.style.borderColor == 'red') {
                    element.style.borderColor = 'white';
                    variableValue = variableValue - 1;
                }
                else {
                    element.style.borderColor = 'red';
                    variableValue = variableValue + 1;
                    document.getElementById("myVariable").value = variableValue;
                }
            }
        });


    </script>
</body>

</html>