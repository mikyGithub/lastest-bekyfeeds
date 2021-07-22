<!DOCTYPE html>
<html>
<?php require "./config/meta.php"; ?>

<head>
    <title>Bekyfeeds | Home</title>
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
    <link rel="stylesheet" type="text/css" href="assets/css/utilities.min.css" />
    <?php require "./config/js.php"; ?>
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<!-- PHP -->

<?php

require './models/Home.php';
require './models/FeatureFilm.php';
require './config/Database.php';
$database = new Database();
$db = $database->connect();
$home = new Home($db);

$recentSeries = $home->getLatestEpisodes()->fetchAll(PDO::FETCH_ASSOC);
$popularSeries = $home->getPopularEpisodes()->fetchAll(PDO::FETCH_ASSOC);
$recentMovies = $home->getLatestMovies()->fetchAll(PDO::FETCH_ASSOC);
$popularMovies = $home->getPopularMovies()->fetchAll(PDO::FETCH_ASSOC);
$requests = $home->getLatestRequests()->fetchAll(PDO::FETCH_ASSOC);

$actionMovies = $home->getActionMovies()->fetchAll(PDO::FETCH_ASSOC);
$romanticMovies = $home->getRomanticMovies()->fetchAll(PDO::FETCH_ASSOC);
$sliderMovies = $home->getSliderMovies()->fetchAll(PDO::FETCH_ASSOC);
$editorMovies = $home->getEditorMovies()->fetchAll(PDO::FETCH_ASSOC);





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
                                <li><a href="index">Home</a></li>
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
                            <a href="index" class="logo">
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
                        <li class="active">
                            <a href="index"><span class="fa fa-home desktop-home"></span><span
                                    class="mobile-show">Home</span></a>
                        </li>
                        <!-- <li><a href="#">Technology</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobile</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Android</a></li>
              <li><a href="#">Samsung</a></li>
              <li><a href="#">Nokia</a></li>
              <li><a href="#">Walton Mobile</a></li>
              <li><a href="#">Sympony</a></li>
            </ul>
          </li>
          <li><a href="#">Laptops</a></li>
          <li><a href="#">Tablets</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="404.html">404 Page</a></li> -->
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
        <section id="newsSection">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="latest_newsarea">
                        <span>Popular Series</span>
                        <ul id="ticker01" class="news_sticker">
                            <?php

                            foreach ($popularSeries as $popular) {

                                echo '
              <li>
                <a href="single-series.php?series_id=' . $popular['id'] . '">' . '<img src="images/posters/' . $popular['img_url'] . '" alt="' . $popular['name'] . '">' . $popular['name'] . '</a>
              </li>
              ';
                            }
                            ?>

                        </ul>
                        <div class="social_area">
                            <ul class="social_nav">
                                <li class="twitter"><a href="https://www.facebook.com/Beky-Feeds-112556537282665"></a>
                                </li>
                                <li class="facebook"><a target="_blank" href="https://t.me/bekyfeedscommounity"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="sliderSection">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="slick_slider">
                        <?php

                        foreach ($sliderMovies as $slider) {

                            echo '
  <div class="single_iteam">
  <a href="single-movie.php?title=' . $slider["title"] . '">
 
   <img   class="object-cover" src="' . $slider["slider_img"] . '" alt="' . $slider["title"] . '" /></a>

  <div class="slider_article">
    <h2>
      <a class="slider_tittle" href="single-movie.php?title=">' . $slider["title"] . '</a>
    </h2>
    <p>
    ' . $slider["description"] . '
    </p>
  </div>
</div>
';
                        }
                        ?>



                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="latest_post">
                        <h2><span>Latest Movies</span></h2>
                        <div class="latest_post_container">
                            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                            <ul class="latest_postnav">
                                <?php

                                foreach ($recentMovies as $recent) {

                                    echo '<li>
  <figure href="single-movie.php?title=' . $recent["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="single-movie.php?title=' . $recent["title"] . '" class="w-32 mr-3">
      <img alt="' . $recent["title"] . '" class="w-32 h-full" src="' . $recent["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href="single-movie.php?title=' . $recent["title"] . '" class="catg_title">
      ' . $recent["title"] . ' <p class="genre">' . $recent["genre"] . '</p> <p class="year">' . $recent["releasing_year"] . '</p> </a>
    </figcaption>
  </figure>
</li>
';
                                }
                                ?>



                            </ul>
                            <div id="next-button"><i class="fa fa-chevron-down"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contentSection">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="left_content">
                        <div class="single_post_content">
                            <h2><span>Latest Episodes</span></h2>

                            <div class="">
                                <ul class="flex flex-wrap ">
                                    <?php

                                    foreach ($recentSeries as $recent) {

                                        echo '<li href="single-series.php?series_id=' . $recent["id"] . '" class="w-full px-1 my-2 border rounded md:w-1/2">
  <div class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated">
    <a href="single-series.php?series_id=' . $recent["id"] . '" class="w-32 text-lg md:mr-3 cursor-pointer">
      <img class="w-32 h-full"  alt="" src="images/posters/' . $recent["img_url"] . '" />
    </a>
    <div class="p-3 media-body">
      <a href="single-series.php?series_id=' . $recent["id"] . '" class="catg_title">'
                                            . $recent["name"] . '<p class="genre">' . $recent["genre"] . '</p> <p class="year">' . $recent["releasing_year"] . '</p> </a>
    </div>
  </div>
</li>
';
                                    }
                                    ?>



                                </ul>
                            </div>
                        </div>
                        <div class="single_post_content">
                            <h2><span>Most Rated Movies</span></h2>

                            <div class="">
                                <ul class="flex flex-wrap ">
                                    <?php

                                    foreach ($popularSeries as $popular) {

                                        echo '<li href="single-series.php?series_id=' . $popular["id"] . '" class="w-full px-1 my-2 border rounded md:w-1/2">
                    <div class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated">
                      <a href="single-series.php?series_id=' . $popular["id"] . '" class="w-32 text-lg md:mr-3 cursor-pointer">
                        <img class="w-32 h-full"  alt="" src="images/posters/' . $popular["img_url"] . '" />
                      </a>
                      <div class="p-3 media-body">
                        <a href="single-series.php?series_id=' . $popular["id"] . '" class="catg_title">'
                                            . $popular["name"] . '<p class="genre">' . $popular["genre"] . '</p> <p class="year">' . $popular["releasing_year"] . '</p> </a>
                      </div>
                    </div>
                  </li>
';
                                    }
                                    ?>



                                </ul>
                            </div>
                        </div>
                        <div class="fashion_technology_area">
                            <div class="fashion">
                                <div class="single_post_content">
                                    <h2><span>Action Movies</span></h2>
                                    <ul class="my-2 spost_nav">
                                        <?php

                                        foreach ($actionMovies as $action) {

                                            echo '<li class="my-3">
  <figure href="single-movie.php?title=' . $action["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="single-movie.php?title=' . $action["title"] . '" class="w-32 mr-3">
      <img alt="' . $action["title"] . '" class="w-32 h-full" src="' . $action["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" single-movie.php?title=' . $action["title"] . '" class="">
      ' . $action["title"] . ' <p class="genre">' . $action["genre"] . '</p> <p class="year">' . $action["releasing_year"] . '</p> </a>
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
                                    <h2><span>Romantic Movies</span></h2>
                                    <ul class="my-2 spost_nav">
                                        <?php

                                        foreach ($romanticMovies as $romantic) {

                                            echo '<li class="my-3">
  <figure href="single-movie.php?title=' . $romantic["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="single-movie.php?title=' . $romantic["title"] . '" class="w-32 mr-3">
      <img alt="' . $romantic["title"] . '" class="w-32 h-full" src="' . $romantic["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" single-movie.php?title=' . $romantic["title"] . '" class="">
      ' . $romantic["title"] . ' <p class="genre">' . $romantic["genre"] . '</p> <p class="year">' . $romantic["releasing_year"] . '</p> </a>
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
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <aside class="right_content">
                        <div class="bg-white single_sidebar wow fadeInDown">
                            <h2><span>Join Us</span></h2>
                            <a class="sideAdd" class="sideAdd" target="_blank"
                                href="https://t.me/bekyfeedscommounity"><img style="object-fit:cover"
                                    src="images/telegram.gif" alt="" /></a>
                        </div>
                        <div class="bg-white single_sidebar">
                            <h2><span>Editor's Choice</span></h2>
                            <ul class="my-2">
                                <?php

                                foreach ($editorMovies as $editor) {

                                    echo '<li class="my-3">
  <figure href="single-movie.php?title=' . $editor["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="single-movie.php?title=' . $editor["title"] . '" class="w-32 mr-3">
      <img alt="' . $editor["title"] . '" class="w-32 h-full" src="' . $editor["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" single-movie.php?title=' . $editor["title"] . '" class="">
      ' . $editor["title"] . ' <p class="genre">' . $editor["genre"] . '</p> <p class="year">' . $editor["releasing_year"] . '</p> </a>
    </figcaption>
  </figure>
</li>
';
                                }
                                ?>



                            </ul>
                        </div>

                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>Your Requests</span></h2>
                            <ul>
                                <?php

                                foreach ($requests as $request) {
                                    echo '<li><a style="padding-top: 10px;padding-bottom: 10px;" href="' . $request["solution"] . '">' . $request["requester"] . '<span class="ml-4 text-blue-400">[' . $request["subject"] . ']</span></a></li>';
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
                    Copyright &copy; 2020 <a href="index">BekyFeeds</a>
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