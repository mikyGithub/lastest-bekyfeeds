<!DOCTYPE html>
<html lang="en">
<?php require "config/meta.php";
require 'models/FeatureFilm.php';
require 'config/Database.php';
$database = new Database();
$db = $database->connect();
$film = new FeatureFilm($db);

$popularMovies = $film->getPopular()->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
    <title>BekyFeeds | Contact</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/utilities.min.css" />
    <!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body>


    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">
                        <div class="header_top_left">
                            <ul class="top_nav">
                                <li><a href="index">Home</a></li>
                                <li><a href="about">About</a></li>
                                <li><a href="contact-us">Contact</a></li>

                            </ul>
                        </div>
                        <div class="header_top_right">
                            <p>Friday, December 05, 2045</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <div class="logo_area">
                            <a href="/index" class="logo">
                                <h1>bekyfeeds</h1>
                            </a>
                        </div>
                        <div class="add_banner">
                            <a href="#"><img src="images/banner.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">


                        <li><a href="index">Home</a></li>
                        <li><a href="tv-show">TV Show</a></li>
                        <li><a href="movies">Movies</a></li>
                        <li><a href="request">Your Requests</a></li>
                        <!-- <li><a href="news">News</a></li>
                        <li><a href="trailer">Movie Trailers</a></li>
                        <li><a href="sport">Sport</a></li>
                        <li><a href="game">Game</a></li> -->
                    </ul>
                </div>
            </nav>
        </section>

        <section id="contentSection">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="left_content">
                        <div class="contact_area">
                            <h2>Contact Us</h2>
                            <p>We would love to hear from you! Leave a message below and we will get in touch with you
                                shortly. </p>
                            <form action="#" class="contact_form">
                                <input class="form-control" type="text" placeholder="Name*">
                                <input class="form-control" type="email" placeholder="Email*">
                                <textarea class="form-control" cols="30" rows="10" placeholder="Message*"></textarea>
                                <input type="submit" value="Send Message">
                            </form>
                        </div>
                    </div>

                    <ul class="tag_nav">
                        <li><a target="_blank" href="https://t.me/bekyfeedscommounity">
                                Telegram
                            </a></li>
                        <li><a href="https://www.facebook.com/Beky-Feeds-112556537282665">
                                Facebook
                            </a>
                        </li>







                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <aside class="right_content">
                        <div class="single_sidebar">
                            <h2><span>Popular Post</span></h2>



                            <ul class="my-2 spost_nav">
                                <?php

                            foreach ($popularMovies as $popular) {

                                echo '<li class="my-3">
  <figure href="film/' . $popular["alias"] . '" class="flex bg-gray-100 border rounded cursor-pointer media   ">
    <a href="film/' . $popular["alias"] . '" class="w-32 mr-3">
      <img alt="'. $popular["title"] .'" class="w-32 h-full" src="images/mposters/' . $popular["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" film/' . $popular["alias"] . '" class="">
      ' . $popular["title"] . ' <p class="genre">' . $popular["genre"] . '</p> <p class="year">' . $popular["releasing_year"] . '</p> </a>
    </figcaption>
  </figure>
</li>
';
                            }
                            ?>



                            </ul>
                        </div>

                    </aside>
                </div>
            </div>
        </section>
        <footer id="footer">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class=" ">
                            <h2 class="text-genre"> Disclaimer</h2>
                        </div>
                        <p>
                            bekyfeeds.com does not host any files on it's servers. All files or contents hosted on third
                            party websites.this site does not accept responsibility for contents hosted on third party
                            websites. We just index those links which are already available in internet.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer_widget ">
                            <h2>Important Links</h2>
                            <ul class="tag_nav">
                                <li><a href="about"
                                        class="text-white text-green-400 my-1 hover:text-green-500 text-justify">About
                                        Us</a></li>
                                <li><a href="dmca"
                                        class="text-white text-green-400 my-1 hover:text-green-500 text-justify">DMCA</a>
                                </li>
                                <li><a href="privacy"
                                        class="text-white text-green-400 my-1 hover:text-green-500 text-justify">Privacy
                                        Policies</a></li>
                                <li><a href="terms"
                                        class="text-white text-green-400 my-1 hover:text-green-500 text-justify">Terms
                                        and Conditions</a></li>
                                <li><a href="contact-us"
                                        class="text-white text-green-400 my-1 hover:text-green-500 text-justify">Contact
                                        Us</a></li>






                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer_widget ">
                            <h2>Contact Us</h2>



                            <ul class="tag_nav">
                                <li><a target="_blank" href="https://t.me/bekyfeedscommounity">
                                        Telegram
                                    </a></li>
                                <li><a href="https://www.facebook.com/Beky-Feeds-112556537282665">
                                        Facebook
                                    </a>
                                </li>







                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <p class="copyright">
                    Copyright &copy; 2020 <a href="index">BekyFeeds</a>
                </p>
                <p class="developer text-white">Developed By Bekyfeeds</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.li-scroller.1.0.js"></script>
    <script src="assets/js/jquery.newsTicker.min.js"></script>
    <script src="assets/js/jquery.fancybox.pack.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>