<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Netflix</title>
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

        nav {
            height: 70px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 35px;
            padding-right: 40px;
            background-image: linear-gradient(180deg, rgba(0, 0, 0, .7) 10%, transparent);
            position: -webkit-sticky;
            position: sticky;
            position: fixed;
            top: 0;
            transition: background .5s;
            z-index: 1;
        }

        nav.scrolled {
            background: rgb(20, 20, 20);
        }

        #logo {
            padding-top: 10px;
        }

        #logo img {
            width: 125px;
            cursor: pointer;
        }

        #leftBar,
        #nav_items,
        #search,
        #profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #search {
            gap: 30px;
        }

        #search i {
            font-size: 1.3rem;
            color: aliceblue;
            cursor: pointer;
        }

        #profile {
            gap: 5px;
            cursor: pointer;
        }

        #leftBar {
            gap: 25px;
        }

        #nav_items {
            gap: 17px;
        }

        #nav_items li {
            list-style: none;
            font-weight: 500;
            font-size: .94rem;
            cursor: pointer;
            color: aliceblue;
            transition: .3s;
        }

        #nav_items li:hover {
            color: rgb(155, 154, 154);
        }

        header {
            width: 100%;
            height: 115vh;
            /* background: url('https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6AYY37jfdO6hpXcMjf9Yu5cnmO0/AAAABYmGIkTGvdUVPct8cCebtgJr2dpzond5XiIiMDcIA8VIiutDVTUq9T55tMrZ-D7b9sWGTD2ra-Kx7vOM7UnegblJOtlHkp8N0KEt.webp?r=5ec'); */
            background-repeat: no-repeat;
            background-size: cover;
            box-shadow: inset -15px 30px 45px -10px rgba(20, 20, 20, .99), inset -15px -140px 55px -15px rgba(20, 20, 20, .99);
        }

        #title {
            padding-top: 7.5rem;
            padding-left: 4rem;
            width: 630px;
            height: 115vh;
            background: linear-gradient(77deg, rgba(0, 0, 0, .6), transparent 85%);
        }

        #title_image img {
            width: 514px;
        }

        #title_head h3 {
            color: #fff;
            font-size: 1.6vw;
            margin: 1vw 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, .45);
            transition: color 1s;
            font-weight: 600;
        }

        #title_head p {
            color: #fff;
            font-size: 1.1vw;
            font-weight: 400;
            line-height: normal;
            margin-top: 0.1vw;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, .45);
        }

        #title_btn {
            margin-top: 1.5rem;
            display: flex;
            text-align: center;
            gap: 12px;
        }

        #play {
            display: flex;
            gap: 7px;
            justify-content: center;
            text-align: center;
            padding-top: 10px;
            font-size: 1.15rem;
            font-weight: 600;
            border: none;
        }

        #playbtn {
            border-radius: 5px;
            border: none;
            width: 130px;
            height: 45px;
            cursor: pointer;
        }

        #playbtn:hover {
            background-color: rgb(192, 191, 191);
        }

        .bi-play-fill {
            font-size: 2.3rem;
            padding-top: 0;
            margin-top: 0;
            position: relative;
            top: -.75rem;
        }

        #more_info {
            display: flex;
            gap: 13px;
            /* text-align: center; */
            padding-left: 12px;
            justify-content: center;
            text-align: center;
            padding-top: 10px;
            font-size: 1.12rem;
            font-weight: 600;
            border: none;
        }

        #moreBtn {
            border-radius: 5px;
            border: none;
            width: 190px;
            height: 45px;
            background-color: rgba(109, 109, 110, 0.7);
            color: white;
            cursor: pointer;
        }

        #moreBtn:hover {
            background-color: rgba(109, 109, 110, 0.4);
        }

        .bi-info-circle {
            font-size: 1.5rem;
            padding-top: 0;
            margin-top: 0;
            position: relative;
            top: -.3rem;
        }

        #pg {
            position: absolute;
            z-index: 0;
            left: 88.2%;
            top: 69%;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        #replay {
            width: 37px;
            height: 37px;
            border-radius: 50%;
            font-size: 1.3rem;
            padding-top: 2px;
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.7);
            color: white;
            cursor: pointer;
        }

        #replay:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        #ua {
            width: 130px;
            height: 37px;
            background-color: rgba(51, 51, 51, .6);
            border: 3px #dcdcdc;
            border-left-style: solid;
            box-sizing: border-box;
            display: flex;
            font-size: 1.1vw;
            height: 2.4vw;
            color: #fff;
            padding-top: 5px;
            padding-left: 14px;
        }

        #tv_shows {
            width: auto;
            height: auto;
            margin-left: 4rem;
            position: absolute;
            top: 85%;
            /* margin-bottom: 2rem; */
        }

        #tv_shows h3 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
        }

        #anime {
            width: auto;
            height: auto;
            margin-left: 4rem;
            /* position: absolute;
            top: 85%; */
            /* margin-bottom: 2rem; */
            margin-top: 6rem;
        }

        #anime h3 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
        }

        #trending {
            width: auto;
            height: auto;
            margin-left: 4rem;
            /* position: absolute;
            top: 85%; */
            /* margin-top: 1rem; */
        }

        #trending h3 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
        }

        #MadeIndia {
            width: auto;
            height: auto;
            margin-left: 4rem;
            /* position: absolute;
            top: 85%; */
            margin-top: 6rem;
        }

        #MadeIndia h3 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
        }

        #horror {
            width: auto;
            height: auto;
            margin-left: 4rem;
            /* position: absolute;
            top: 85%; */
            margin-top: 6rem;
        }

        #horror h3 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
        }

        #international {
            width: auto;
            height: auto;
            margin-left: 4rem;
            /* position: absolute;
            top: 85%; */
            margin-top: 6rem;
        }

        #international h3 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
        }

        #comedy {
            width: auto;
            height: auto;
            margin-left: 4rem;
            /* position: absolute;
            top: 85%; */
            margin-top: 6rem;
        }

        #comedy h3 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .boxes img {
            width: 230px;
            border-radius: 3px;
            transition: .3s;
        }

        
        .boxes {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-top: 9px;
        }
        
        .box {
            /* border: 4px solid white; */
            border: none;
            border-radius: 6px;
            height: 80.5px;
            padding: 0;
            margin: 0;
            cursor: pointer;
            transition: .4s;
        }

        .box:hover img {
            transform: scale(1.4);
            box-shadow: 0 0 10px rgba(0, 0, 0, .45);
        }
        
        body {
            background: rgb(20, 20, 20);
        }

        #myVideo {
            position: absolute;
            z-index: -1;
            width: 100%;
            /* height: 100vh; */
        }

        footer {
            padding-bottom: 4rem;
            background-color: rgb(20, 20, 20);
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
        <div id="leftBar">
            <div id="logo">
                <img src="images/Netflix-Logo.wine.svg" alt="">
            </div>

            <div id="nav_items">
                <li>Home</li>
                <li>TV Shows</li>
                <li>Movies</li>
                <li>New & Popular</li>
                <li>My List</li>
                <li>Browse by Languages</li>
            </div>
        </div>

        <div id="search">
            <i class="bi bi-search"></i>
            <i class="bi bi-bell"></i>
            <div id="profile">
                <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/K6hjPJd6cR6FpVELC5Pd6ovHRSk/AAAABY20DrC9-11ewwAs6nfEgb1vrORxRPP9IGmlW1WtKuaLIz8VxCx5NryzDK3_ez064IsBGdXjVUT59G5IRuFdqZlCJCneepU.png?r=229"
                    alt="">
                <i class="bi bi-caret-down-fill"></i>
            </div>
        </div>
    </nav>

    <video id="myVideo" autoplay muted loop src="video/Never Have I Ever - Final Season _ Official Trailer _ Netflix.mp4" type="video/mp4"></video>
    <div id="title">
        <div id="title_image">
            <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/LmEnxtiAuzezXBjYXPuDgfZ4zZQ/AAAABcfOG4FYPycS9TTMwuSH6Tz6i2vRIw8mV5TSAZR7WSqfgfHCWp3kRqEMGphw7mkmAodtypn-PWEM9AOwvYJZrMvv_9Ry4BvasNIs_I5HLuAPzwmsnHKdpergNV-gSOw9hPoRlmr4BwbqaekldIZs25DoxSy1n7A6ckvOcPvOhO0EumaPk71CFg.webp?r=e69"
                alt="">
        </div>
        <div id="title_head">
            <h3>Watch Season 4 now</h3>
            <p>A tempramental but tenacious Indian-American teen navigates feelings, foibles and immgrant family
                dynamics in this bold coming-of-age comedy.</p>
        </div>
        <div id="title_btn">
            <button id="playbtn">
                <div id="play">
                    <div><i class="bi bi-play-fill"></i></div>
                    <div>
                        <p>Play</p>
                    </div>
                </div>
            </button>

            <button id="moreBtn">
                <div id="more_info">
                    <div><i class="bi bi-info-circle"></i></div>
                    <div id="text">
                        <p>More Info</p>
                    </div>
                </div>
            </button>
        </div>
    </div>

    <div id="pg">
        <button id="replay"><i class="bi bi-arrow-clockwise"></i></button>
        <button id="ua">U/A 13+</button>
    </div>
</header>

<body>

    <div id="tv_shows">
        <h3>TV Shows</h3>
        <div class="boxes">
            <div class="box">
                <div><img
                        src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABZObFUOVBT45jj3fXo7SuvCMMhHQH__YJSxd7sWKIrvOz5osQVksw4fkJZJBA0uq7WkHIoCrLxhVBYYKSWarIap2lPoU2IuMeHYLdeldEXtds5SYlDYqwidXUtMrr1plYB8UCMZ57FCQwpkmPu2ZAd0TLBGZ_SgF-D_qJLTbCK2WJx-eSHk21XsYy2iCrsPi888hPnJ-XQhG3qq10eHFBkUfoGP6vuGBkCkO2aa-dvTDOeg8am0-EaazmvCSB1YDbR1T6ZKVRjRklENOFJ5MK85PLZE8kNdWhY-7_cjNMQ-8hBSUTHSxs30_Yew5PLggI1AOJjsGujp7h1s6MqgLWwSH258OKFqdnwx4qNIkanPDerR517yzrmyQ3MhRxiQ6eVt5LCmmdK2ZGEghG-onr_WLRMCP9fMDgvyHLMCArsGwIg.webp?r=e1b%22"
                        alt="">
                </div>
            </div>
            <div class="box">
                <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABbFYOVzxsBwM0X2rPGsEkZ_HhApzKofFgU9XBcLRkoRxh4rZ8KAu6FqXjogBT9la12MfXjEKT_RGjNLZ2PMNIQWppVaGJQ4FQ3ehjTTniDqPZ1E-aoNADRzd3Gs3bNFwQ6lCUqCbkxl8lO4QGuu-JMVv_UaI2O2LMWFfq6DbQ7ahjyK8478NKg2dl9JGlh7n.jpg?r=4d2"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABTF6OeDtx5QcmucV05rWrMPWa7btLXUUD7Hy_36_7GIhWjGBJfj_YGY595BKECdidj62DwMeCausnlRoP0JxTp6hKemxP3RUC8iMaDp9K-eZYd8zX0BXJuWTzuOcVq0eM6MVx3zR9teC1Y4hgB4jCaB8FAzWpKAYyuSTPJhhICIHEs2SuZxjF7zOUaXRp0aK.jpg?r=42a"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABbFUnnyN3kQ6hVBBZ6aKAeCt4cvjkbxDbQQeZofOpCMcsWSkY-4dyU_F1Gmhn_Z3uaKyHAvCTPUL81OZDCWjGyf3zl7XYXQ69Wvp.webp?r=01d"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABZGv7j8Sxpy-2tOXOMkq-o2zAWGd7N2u30RO_p9EDa6hG58mtDyZI7tcJeul63BiBf-CtY3CmgRmgft5hFT0qsTaIcNRGP9KpWYF9RKShbenrP0rtRz58VK73PCw0w5aso4ZbA.jpg?r=cee"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABY1QPEhbAKknNJ1x8IlXg4yuhYdwaeTfWkBMrNl5qjR5b3Qi54GZukQPvTvoNBAyOSSVSBRTKzGjSF0pFt3FYXmLBsksCtvfAZL9glB5m_al3UFIRxrwohGcQ2DGDkL_IXHa.jpg?r=4f6"
                    alt="">
            </div>
        </div>
    </div>

    <div id="trending">
        <h3>Trending Now</h3>
        <div class="boxes">
            <div class="box">
                <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABb4QrONkk_08zveFWUqwzbnsz6mE_wh6T-piiNSVj1CMI8U0R8g6pCBVXc-S__Sr-86rHSh_8ZU4thJxA_bu-IOrd5YIVMF2pK7z.webp?r=777"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABa_xAIpXv2iYlnNT6n8bgO1SMVppi1Sc5fHHIy7W0p__R3-VKqsnwXI7IeW5M0cn3uVDKk67SnhwBoyNU2xBUhHi6PaN2JA8PJxwChUhZ0ifbW9RdWfPIcuXimk_F5LMAQBhcloRaU2bd4ikMkUKL08LRl1ZJTQ4j3I2s_0JToMyKR_Oexxv9CGGukZGC7TC.jpg?r=695"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABYsdfZ-U3PmUekTl_EyF3j2WFY8DRTHAlQu4mthWWfQ1upH7ykrqzvjQ9RPvKrPxCilyIomUQ22iPgfpRDXFD5jfD7cW_ObJ5pp9.webp?r=75b"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABQiHKWXpdmFk09Bx-At2CTz5EL_7mQ3vUiGRUPtRBfuTtDNXBWrWWN843-te7vX4hOc8wnHJuQXhdhFeVWUW9Fj5Ewl2fXNu_4uHWdIBcdZU-JzcJ97tOenUpcCaSoDxBaUzjw.jpg?r=5e6"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2774-2773.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABUfDF6o2CQxIPJ3mh0VaUwY3QVe__E1d3rK9a9NieFdkxm_XRLKFy0spw6FMy8CUwg32e-lieLGmAfr4vgj9sHpe1C6zALw3yMrhyjR_Z3_0CA8BU6DAVSnJ93_JdXsqaQcMWA.jpg?r=f95"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABZ2QxtaWVwGH-6r75vPi7i61t2lhZ9KjneeSV-4RG_Q6ceK5KWQDz397hwOv2CzwB4N3mfXjJsOt-qjMZBUpk4O6RJJjKQHsi_zZCiigs5mNQqXQwhBSOin8DT23I0PTx55yDA.jpg?r=400"
                    alt="">
            </div>
        </div>
    </div>

    <div id="anime">
        <h3>Anime series</h3>
        <div class="boxes">
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABXc-kUtaZHWA3bouW-qKDil6zoFpBMBmVFWXxhjXq5sm_TiTpKlV_AAluotbqrB73SDsUzfL30QsLsQhjOKa0N50MvmR0KfNg3KcNOTEZsfC3vi6ixGPeXF1fo-z5XtYp16Hke00muhPHt5mxA-ZNpFzI22lZMCmjeQB1Tz8J-N3ACj328D85Vkss9UL_hav7H4Ci5ukmct0NV1NMxC0Yp40uvxFBGV-E1bMw-V9-zrzu3Z9qM5hiU42pk_FslbhWKfRUHU9WVVlyRSwWZ1GJgedaajdJQnFpElVKdEMhBVkVPfhfpdvNS0OZkz2i4wGKiO1UZE8S7bOhjcid5NGSchENCVSBns1lUlPnjPI7FlDGirhyE3BEhMJRSwJhxf61d8T8tqdxCdgQRIWMFHtJ1Oumzd6Z4ibVR3hKqPr_EK9ng.webp?r=27e"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABWP7U5LjBq0DrWim97RxG1lcqbZh9HrcTY05kWcWjKVGosZTLytVA3cGZR7DayJ89_eKRnTIYwHtLU9RQdA2MfUJq-4sHTx7j7P_.webp?r=c93"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABYl7lws4eKCLnBZ-Gogk9J3Mu-7TQLmIRptczKQ0rtv7h3zGpFURRJKIHwMJy-24FgdSAiSeamy79DVG4RxTk865o_IuQfllWYw.webp?r=d21"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-114-2430.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABdY-6Tw17pbNEnxoTeEbvBwo9dymu_TG2Ch_nEC_t8kFxZt4F4MFFiyFnLe5x1YIQfpCvma1vjB9JAAcOyA6Yay9NmvHGKqIAB5g.webp?r=888"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABbj_DrTl53kMOknDouvbMmBBNBRB5Hhv7ZP5XGSV-nijKUPfPeG9bO31IY_45MhhYTHg-YCexdzFNUPQDS9G-OIvmCVjefPBBfgp.webp?r=567"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABd8aPH-TGhqGvJkGVylg3racchE_x4WySg0fVYIgDVGjgCa0M7Ial2UKVEnEGKXjXMiKY-SgoRRjJlFuzkVJUWs7k3n_IbOPTG7h.webp?r=aed"
                    alt="">
            </div>
        </div>
    </div>

    <div id="MadeIndia">
        <h3>Made in India</h3>
        <div class="boxes">
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABbQYdrVx2ZXP6MzIcbgcA02K1YmkQmtofchECV58eqb0U9Ze4jGT3fX4Pncr0gc-7-98JB32QUZtkF5qlzfLy1W4f8aRn-szaRzA.webp?r=c02"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABW5XrLbW09zGIAWrrewk92o8aCWMEjQHBNyhv7T7vIHphRt0C0MY7GXibH-vuMDEvbGx8Vutfp39Q5AOucRCrEJBlbGtzxKH_Wg-.webp?r=ab5"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABbYTNvnj8JnRlYu5tu5WP3R4umY-opnpIWyjpmKhX1xRrRos-J7JzMhgH_KxZ2eHD-G7PR0DpXIhVualaTXtH6DX6dxRNir6AgpY.webp?r=0bb"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABeYJy5KdtDKAUA_tc95jMSE8oxM-JvdsfnVO0SUnD57A063Q5cWSGkve8_0i1zsTb4GCzTrc3j01rSw2mCzqTN4GpZF1l54Vf57B.webp?r=8cb"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABYyi-80zsV_HBh0JbwyaqVw_WjWJCRi53sxtbKRXuzNEiH5KOJpUrjofeXNUUXDrh4g5U7Nm0P2AKc9GdujhfmWvVSWI8BZsFnEe.webp?r=d64"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABfI50vX13awmKz_P9oUdszz8vCHWSbdtdmPEz7-8AbHtg25NtScOvvB2shPoglpfLY853aNJTUHNBw33yHnnkGcHnVRYUrHMutZu.webp?r=437"
                    alt="">
            </div>
        </div>
    </div>

    <div id="horror">
        <h3>Horror Movies</h3>
        <div class="boxes">
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABfNg9ojRoObbzHGtjB_tWJrOfmAOGVLD3i1nU5F-C7wVWuqoEZ2jXWDT1u7rTqgqoZ03cLJISGRE8zdJHZKVGdJEz69PM61zv0lf.webp?r=b4c"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABdebiTMInbRVWI0An170k6ZSJUoCjYQ3Sdxeqevtn05sagRwcGlYfj8NwPCWKk4_72BKU3fP98IlsC5KE3qfObnS2MRC3KzABk97.webp?r=4dc"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABU3PSSyYu-L7OUcvVJZksb7mDcCf7nHQ9A1LfrAMyaV-Up7cPZ0ABGNLIXWjhAeMLAXRHg6-THDKfZScfdXh2ueG_RS__UMPNFjOc7J-ikN3Qb_08QFXiZp9yx4EwGND2gfcFg.jpg?r=4cb"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABdcBsi_QH0eEz97OZqD5yQ0-d5T1OLG0GfxU7YKleNbAlMP-HnhVKlkxostgZrpRWNSpg77zOxOmSR_65r8jIEaleFZlkJALJchS.webp?r=fbf"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABTpTiTOxba_n9HT30KT28OlutxhDmlOASxmWeVVqUVBFC3OeILwy1Kg606Bu0LdtoWQS5lPTwdhYIv5XNLogBB6Bqs5GlaNc2r-X.webp?r=2f9"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABVYIlpIZZjHirGJ-YCaTs0lFmEsUY5hKqTBw9JxyYwwSSsy3hjn5rJxjt89dZssULqVLDhAJJIOMZ_voZoSwnbq3mAEhv2X0b5QI.webp?r=96c"
                    alt="">
            </div>
        </div>
    </div>

    <div id="international">
        <h3>International Shows</h3>
        <div class="boxes">
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABQrWz3sw-EZZgQIkVDt2i1AWHjDzwnls8RqcE2mYjW5kCisSUANQvbYmwjnA55ot9hJz_Mygy0YhFZBPn1_5YofjQL29vlc1qpJZQMhrmUHIQCwdLX4kgyCE9pRffv7Z9clVBA.jpg?r=f99"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABZZpswB_yZCdvsQdtNsq0QAXdXlMfUIfpP8EoADuiOKfcQO9oF0GVoRC8RHhVqxOEme_WDemSWxFkayZmn4blo6S3YT5g7iWPY1gbcdyvK7cbh-QJEExnWKgxZ7btAGeAkAjBw.jpg?r=ebb"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABYaGvge4gqfD9h8WODOFEX8RDV72goCkvME5qwbF_PSoVFSObHFKciPFNK_uTkJGPAQKHLsLYUh2e9ZvzgXCv13s-s7PkoBnedJ2.webp?r=a04"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-3466.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABYr98-qKmVi1CNECrkMmar5r5QGYenVGXFFWTcgM-GnWk3lWKDO1wXz0J9v1FcXfZyI04122CxT1RLYh-34azldr5iEjk12qXHIGhoDZZxnkdqKOSVF7X5QxAZQM6HdlOdhBQA.jpg?r=040"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABd2qyT7qfrG3P5UNDjJRUWDx59u_xtda1pafl7Om4B2AFqLy1ImXFhwq0_TTVkFWj3x_-rZG24dLejCSFnGOGnslRSOY1zPM2YaUgqMzyrjTz06GhA7Z74zyb0v7sIszSVz9uQ.jpg?r=676"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABUiOTxU5aZAIBTtdR-FR6UQ6uvj4XGtH1n6JyKWZNgCTnFPVb9sXCceEnEitFeYaMDKX3FNMnCM-7imPfGjThDpo0JaCWMvHtebnMNHt4JufI3ZYATAT1vrqtIge7l35hJi92Q.jpg?r=c02"
                    alt="">
            </div>
        </div>
    </div>

    <div id="comedy">
        <h3>Comedy Movies</h3>
        <div class="boxes">
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABWCJU8WXi72-pWZngyX5MylXb-TY-5dmZDYb2sw4Sm7Nz_g4ywCYrNBujaIXnKAqlfZ0Wv6f4EVDb_4pnmY5DWdp3Yfg0XZBarI7.webp?r=ca8"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABUJGVDDuLXgQnl40j_Us0rJlyRaceip34yN2mEJfORqu5kU3_01z9y_LI2WLUQkFnY6xEDnlHvny3mBe-QiOCezhTk8Fr7se4vfK.webp?r=d81"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABZi2diOsEl6UD8XPTvA0OLelYipHrm_OUoyg0mAA3UWOds1oVOGiJjlFpfowDPv3y1DvZDwwmGLX_7SNYeJwr4w5Bb2BVJ8U4iHL.webp?r=e7c"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABSHcWUhhaSutayN6UnTmA69RIJnNL3fPmEldbCk63oCvmCihlIFPVYKWbvU04Qv7jkiasMKAymYyi4engZFbpfYbFuKL91NrStPQbQzM3hUJu5s9-vrrbMq3eFa2koVpKdAgSw.jpg?r=907"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABfZiNc0e_fIJN04Usjb-DfTgiTjneT4pupxzhP7okE5Fhn9cpaVJ8aScWv2OHH67reBf9K2uMn__GysRoyD6Gn1S8uoclEWx8bGAL7JvOAtjjggBcaqJ06bl3cS0KTTOWrde4A.jpg?r=928"
                    alt="">
            </div>
            <div class="box">
                <img src="https://occ-0-2164-358.1.nflxso.net/dnm/api/v6/6gmvu2hxdfnQ55LZZjyzYR4kzGk/AAAABUO3HuJ96FR4R5SsNqUZgSFuRmjmAj4AqZyuzRuS7HT2pNbqTkzpdmQTOVk_1eu7p8QFd2NbHHMZyKv7_DlRBoymvqGZfN1DT6HM.webp?r=346"
                    alt="">
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
        let navbar = document.querySelector('nav')

        window.onscroll = function () {

            // pageYOffset or scrollY
            if (window.pageYOffset > 0) {
                navbar.classList.add('scrolled')
            } else {
                navbar.classList.remove('scrolled')
            }
        }
    </script>
</body>

</html>