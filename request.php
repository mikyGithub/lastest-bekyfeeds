<!DOCTYPE html>
<html>
<?php require "config/meta.php"; ?>

<head>
    <title>Bekyfeeds</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/font.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/utilities.min.css" /> <?php require "config/js.php"; ?>

</head>

<?php

require 'models/Request.php';
require 'config/Database.php';
$database = new Database();
$db = $database->connect();
$request = new Request($db);


$requests = $request->getLatestRequests()->fetchAll(PDO::FETCH_ASSOC);
$latestMovies = $request->getLatestMovies()->fetchAll(PDO::FETCH_ASSOC);
$latestEpisodes = $request->getLatestEpisodes()->fetchAll(PDO::FETCH_ASSOC);





?>



<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">
                        <div class="header_top_left">
                            <ul class="top_nav">
                                <li><a href="../index">Home</a></li>
                                <li><a href="about">About</a></li>
                                <li><a href="contact-us">Contact</a></li>
                               
                            </ul>
                        </div>
                        <div class="header_top_right">
                            <a target="_blank" href="https://t.me/bekyfeedscommounity">Join Us on Telegram</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <div class="logo_area">
                            <a href="../index" class="logo">  
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
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        <li>
                            <a href="../index"><span class="fa fa-home desktop-home"></span><span
                                    class="mobile-show">Home</span></a>
                        </li>

                        <li><a href="tv-show">TV Show</a></li>
                        <li><a href="movies">Movies</a></li>
                        <li class="active"><a href="request">Your Requests</a></li>
                        <!-- <li><a href="news">News</a></li>
            <li><a href="trailer">Movie Trailers</a></li>
            <li><a href="sport">Sport</a></li>
            <li><a href="game">Game</a></li> -->
                    </ul>
                </div>
            </nav>


            <section class="contentSection">
                <div class="md:flex justify-between">
                    <div class="md:w-3/4 md:mr-3">
                        <div class="single_post_content wow fadeInDown">
                            <h2><span>Your Requests</span></h2>
                            <ul>
                                <?php

foreach ($requests as $request) {
echo '<li class="p-3 my-1 bg-gray-200 hover:bg-gray-100 "><a class="flex justify-between "  style="padding-top: 10px;padding-bottom: 10px;" href="'.$request["solution"].'"> <div class="w-1/6 text-2xl text-blue-400">'.$request["id"].'</div>'.$request["requester"].'<div class="w-1/3">['.$request["subject"].']</div></a></li>';
}
?>



                            </ul>
                        </div>
                    </div>
                    <div class="md:w-1/4">

                        <div class="bg-white single_post_content wow fadeInDown">
                            <h2><span>Join Us</span></h2>
                            <a class="sideAdd" class="sideAdd" target="_blank" target="_blank" href="https://t.me/bekyfeedscommounity" target="_blank" href="https://t.me/bekyfeedscommounity"><img style="object-fit:cover" src="images/telegram.gif"
                                    alt="" /></a>
                        </div>


                    </div>
                </div>




                <div class="fashion_technology_area">
                    <div class="fashion">
                        <div class="single_post_content">
                            <h2><span>Latest Movies</span></h2>


                            <ul class="my-2 spost_nav">
                                <?php

                    foreach ($latestMovies as $latest) {

                      echo '<li class="my-3">
  <figure href="single-movie.php?title=' . $latest["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="single-movie.php?title=' . $latest["title"] . '" class="w-32 mr-3">
      <img alt="'. $latest["title"] .'" class="w-32 h-full" src="' . $latest["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href="single-movie.php?title=' . $latest["title"] . '" class="">
      ' . $latest["title"] . ' <p class="genre">' . $latest["genre"] . '</p> <p class="year">' . $latest["releasing_year"] . '</p> </a>
    </figcaption>
  </figure>
</li>
';
                    }
                    ?>



                            </ul>
                        </div>
                    </div>
                    <div class="technology">
                        <div class="single_post_content">
                            <h2><span>Latest Episodes</span></h2>
                            <ul class="my-2 spost_nav">
                                <?php

                    foreach ($latestEpisodes as $latest) {

                      echo '<li class="my-3">
                      <figure href="single-series/series_id=' . $latest["id"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
                        <a href="single-series/series_id=' . $latest["id"] . '" class="w-32 mr-3">
                          <img alt="'. $latest["name"] .'" class="w-32 h-full" src="images/posters/' . $latest["img_url"] . '" />
                        </a>
                        <figcaption class="p-3 media-body">
                          <a href=" single-series/series_id=' . $latest["id"] . '" class="">
                          ' . $latest["name"] . ' <p class="genre">' . $latest["genre"] . '</p> <p class="year">' . $latest["releasing_year"] . '</p> </a>
                        </figcaption>
                      </figure>
                    </li>
';
                    }
                    ?>



                            </ul>

                        </div>
                    </div>
                </div>





    </div>
    </section>
    <footer id="footer">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class=" wow fadeInLeftBig">
                        <h2 class="text-genre"> Disclaimer</h2>
                    </div>
                    <p>
                        bekyfeeds.com does not host any files on it's servers. All files or contents hosted on third
                        party websites.this site does not accept responsibility for contents hosted on third party
                        websites. We just index those links which are already available in internet.
                    </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInDown">
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
                    <div class="footer_widget wow fadeInRightBig">
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
                Copyright &copy; 2020 <a href="../index">BekyFeeds</a>
            </p>
            <p class="developer text-white">Developed By Bekyfeeds</p>
        </div>
    </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.li-scroller.1.0.js"></script>
    <script src="assets/js/jquery.newsTicker.min.js"></script>
    <script src="assets/js/jquery.fancybox.pack.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>