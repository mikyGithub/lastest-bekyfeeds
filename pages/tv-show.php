<!DOCTYPE html>
<html>

<head>
    <title>NewsFeed</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/font.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/theme.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.4/utilities.min.css" integrity="sha512-einsnY5Ti9WNRsxAwifno5lMOviZlMkkewp55Mi480T97asB8MBDxRvZLd93jX5yebFwygHb1KHhlajtS3aMsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<!-- PHP -->

<?php

// require './models/Home.php';
require '../models/FeatureFilm.php';
require '../config/Database.php';
$database = new Database();
$db = $database->connect();
$films = new FeatureFilm($db);
$letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

// $recentSeries = $home->getLatestEpisodes()->fetchAll(PDO::FETCH_ASSOC);
// $popularSeries = $home->getPopularEpisodes()->fetchAll(PDO::FETCH_ASSOC);

// $recentMovies = $home->getLatestMovies()->fetchAll(PDO::FETCH_ASSOC);
// $popularMovies = $home->getPopularMovies()->fetchAll(PDO::FETCH_ASSOC);




$page_number = 1;
if (isset($_GET['page_number'])) {
    $page_number = $_GET['page_number'];
    $recent = $films->getFilmsPaginated($page_number)->fetchAll(PDO::FETCH_ASSOC);
} else {
    $recent = $films->getFilms()->fetchAll(PDO::FETCH_ASSOC);
}


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
                                <li><a href="index,">Home</a></li>
                                <li><a href="../pages/about">About</a></li>
                                <li><a href="../pages/contact-us">Contact</a></li>
                                <!-- <li><a href="../pages/privacy">Privacy Policies</a></li>
                <li><a href="../pages/terms">Terms and Conditions</a></li> -->
                            </ul>
                        </div>
                        <div class="header_top_right">
                            <a href="https://t.me/bekyfeedscommunity">Join Us on Telegram</a>
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
                            <a href="#"><img src="images/addbanner_728x90_V1.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        <li>
                            <a href="index"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a>
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
          <li><a href="../pages/contact.html">Contact Us</a></li>
          <li><a href="../pages/404.html">404 Page</a></li> -->
                        <li class="active"><a href="../pages/tv-show">TV Show</a></li>
                        <li><a href="../pages/movies">Movies</a></li>
                        <li><a href="../pages/request">Your Requests</a></li>
                        <li><a href="../pages/news">News</a></li>
                        <li><a href="../pages/trailer">Movie Trailers</a></li>
                        <li><a href="../pages/sport">Sport</a></li>
                        <li><a href="../pages/game">Game</a></li>
                    </ul>
                </div>
            </nav>
        </section>
        <!-- <section id="newsSection">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="latest_newsarea">
                        <span>Popular Series</span>
                        <ul id="ticker01" class="news_sticker">
                            <?php

                            foreach ($popularSeries as $popular) {

                                echo '
              <li>
                <a href="single-series/' . $popular['url_name'] . '">' . $popular['name'] . '</a>
              </li>
              ';
                            }
                            ?>

                        </ul>s
                        <div class="social_area">
                            <ul class="social_nav">
                                <li class="twitter"><a href="#"></a></li>
                                <li class="facebook"><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- <section id="sliderSection">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="slick_slider">
                        <?php

                        foreach ($recentSeries as $recent) {

                            echo '
  <div class="single_iteam">
  <a href="../pages/single-series/' . $recent["url_name"] . '">
 
  
  <img style="background-color:black;object-fit:contain" src="images/posters/' . $recent["img_url"] . '" alt="' . $recent["name"] . '" /></a>

  <div class="slider_article">
    <h2>
      <a class="slider_tittle" href="../pages/single-series/">' . $recent["name"] . '</a>
    </h2>
    <p>
    ' . $recent["description"] . '
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
  <div class="media">
    <a href="../pages/single-movie/' . $recent["title"] . '" class="media-left-custom">
      <img alt=". $recent["title"] ." style="background-color:black;object-fit:contain" src="' . $recent["img_url"] . '" />
    </a>
    <div class="media-body">
      <a href="../pages/single-movie/' . $recent["title"] . '" class="catg_title">
      ' . $recent["title"] . ' <p class="genre">' . $recent["genre"] . '</p> <p class="year">' . $recent["releasing_year"] . '</p> </a>
    </div>
  </div>
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
        </section> -->
        <section id="contentSection">

            <div class="w-full flex flex-col">
                <div class="latest_post">
                    <form action="/action_page.php">
                        <div style="border:0px" class="my-4 flex justify-between items-center outline-none ">

                            <input style="border:0px" type="text" placeholder="Search.." class="bg-gray-200 focus:outline-none px-3 py-3 w-5/6" name="search">
                            <button style="border:0px" class="px-6 py-3 bg-theme focus:outline-none w-1/6" type="submit">Search</button>
                        </div>
                    </form>
                    <h2><span>Movies</span></h2>

                    <div class="flex">
                        <div class="w-auto">
                            <div class="flex justify-between flex-col">
                                <?php
                                foreach ($letters as $letter) {
                                    echo '<div class="bg-theme  py-3 px-6 my-1">' . $letter . '</div>';
                                }
                                ?>

                            </div>
                        </div>

                        <div>
                            <ul class="flex flex-wrap justify-between">

                                <?php
                                foreach ($recent as $r) {

                                    echo '
            <a href="movie_detail.php?film_id=' . $r['id'] . '" class="w-1/2  rounded md:mb-6 md:w-1/5 lg:w-1/6 my-3">
            <div  class=" m-1 md:mx-3  ">
            <div class="w-full h-full overflow-hidden">
            <img src="' . $r['img_url'] . '" class="inner-img object-cover  rounded-t media-left-custom" alt="' . $r['title'] . '">
            </div>
        
              <div class="flex items-center justify-between p-2 bg-theme rounded-b ">
        
                <p class="text-sm font-semibold text-gray-300 md:text-base">' . substr($r['title'], 0, 20)  . '</p>
                
        
              </div>
            </div>
          </a>';
                                }

                                ?>

                            </ul>

                            <!-- Pagination  -->
                            <div class="flex flex-col items-center my-12">
                                <div class="flex text-gray-700">
                                    <div class="h-8 w-8 mr-1 flex justify-center items-center  bg-gray-200 cursor-pointer">
                                        <a href="movies.php?page_number= <?php echo $page_number - 1 ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                                                <polyline points="15 18 9 12 15 6"></polyline>
                                            </svg></a>
                                    </div>

                                    <div class="flex h-8 font-medium  bg-gray-200">
                                        <?php

                                        for ($i = 1; $i < 8; $i++) {

                                            if ($page_number != $i) {
                                                echo ' <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  "><a href="movies.php?page_number=' . $i . '">' . $i . '</div>';
                                            } else {
                                                echo ' <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full bg-green-600 text-white   "><a href="movies.php?page_number=' . $i . '">' . $i . '</div>';
                                            }
                                        }

                                        ?>
                                        <div class="w-8 h-8 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-pink-600 text-white">4</div>
                                    </div>
                                    <div class="h-8 w-8 ml-1 flex justify-center items-center bg-gray-200 cursor-pointer">
                                        <a href="movies.php?page_number= <?php echo $page_number + 1 ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </div>


            <div class="fashion_technology_area">
                <div class="fashion">
                    <div class="single_post_content">
                        <h2><span>Fashion</span></h2>
                        <ul class="business_catgnav wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig">
                                    <a href="../pages/single_page.html" class="featured_img">
                                        <img alt="" src="images/featured_img2.jpg" />
                                        <span class="overlay"></span>
                                    </a>
                                    <figcaption>
                                        <a href="../pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a>
                                    </figcaption>
                                    <p>
                                        Nunc tincidunt, elit non cursus euismod, lacus augue
                                        ornare metus, egestas imperdiet nulla nisl quis
                                        mauris. Suspendisse a phare...
                                    </p>
                                </figure>
                            </li>
                        </ul>
                        <ul class="spost_nav">
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img1.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 1</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img2.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 2</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img1.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 3</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img2.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 4</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="technology">
                    <div class="single_post_content">
                        <h2><span>Technology</span></h2>
                        <ul class="business_catgnav">
                            <li>
                                <figure class="bsbig_fig wow fadeInDown">
                                    <a href="../pages/single_page.html" class="featured_img">
                                        <img alt="" src="images/featured_img3.jpg" />
                                        <span class="overlay"></span>
                                    </a>
                                    <figcaption>
                                        <a href="../pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a>
                                    </figcaption>
                                    <p>
                                        Nunc tincidunt, elit non cursus euismod, lacus augue
                                        ornare metus, egestas imperdiet nulla nisl quis
                                        mauris. Suspendisse a phare...
                                    </p>
                                </figure>
                            </li>
                        </ul>
                        <ul class="spost_nav">
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img1.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 1</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img2.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 2</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img1.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 3</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img2.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 4</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single_post_content">
                <h2><span>Photography</span></h2>
                <ul class="photograph_nav wow fadeInDown">
                    <li>
                        <div class="photo_grid">
                            <figure class="effect-layla">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1">
                                    <img src="images/photograph_img2.jpg" alt="" /></a>
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="photo_grid">
                            <figure class="effect-layla">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 2">
                                    <img src="images/photograph_img3.jpg" alt="" />
                                </a>
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="photo_grid">
                            <figure class="effect-layla">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 3">
                                    <img src="images/photograph_img4.jpg" alt="" />
                                </a>
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="photo_grid">
                            <figure class="effect-layla">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 4">
                                    <img src="images/photograph_img4.jpg" alt="" />
                                </a>
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="photo_grid">
                            <figure class="effect-layla">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5">
                                    <img src="images/photograph_img2.jpg" alt="" />
                                </a>
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="photo_grid">
                            <figure class="effect-layla">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 6">
                                    <img src="images/photograph_img3.jpg" alt="" />
                                </a>
                            </figure>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="single_post_content">
                <h2><span>Games</span></h2>
                <div class="single_post_content_left">
                    <ul class="business_catgnav">
                        <li>
                            <figure class="bsbig_fig wow fadeInDown">
                                <a class="featured_img" href="../pages/single_page.html">
                                    <img src="images/featured_img1.jpg" alt="" />
                                    <span class="overlay"></span>
                                </a>
                                <figcaption>
                                    <a href="../pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a>
                                </figcaption>
                                <p>
                                    Nunc tincidunt, elit non cursus euismod, lacus augue
                                    ornare metus, egestas imperdiet nulla nisl quis
                                    mauris. Suspendisse a phare...
                                </p>
                            </figure>
                        </li>
                    </ul>
                </div>
                <div class="single_post_content_right">
                    <ul class="spost_nav">
                        <li>
                            <div class="media wow fadeInDown">
                                <a href="../pages/single_page.html" class="media-left">
                                    <img alt="" src="images/post_img1.jpg" />
                                </a>
                                <div class="media-body">
                                    <a href="../pages/single_page.html" class="catg_title">
                                        Aliquam malesuada diam eget turpis varius 1</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown">
                                <a href="../pages/single_page.html" class="media-left">
                                    <img alt="" src="images/post_img2.jpg" />
                                </a>
                                <div class="media-body">
                                    <a href="../pages/single_page.html" class="catg_title">
                                        Aliquam malesuada diam eget turpis varius 2</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown">
                                <a href="../pages/single_page.html" class="media-left">
                                    <img alt="" src="images/post_img1.jpg" />
                                </a>
                                <div class="media-body">
                                    <a href="../pages/single_page.html" class="catg_title">
                                        Aliquam malesuada diam eget turpis varius 3</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown">
                                <a href="../pages/single_page.html" class="media-left">
                                    <img alt="" src="images/post_img2.jpg" />
                                </a>
                                <div class="media-body">
                                    <a href="../pages/single_page.html" class="catg_title">
                                        Aliquam malesuada diam eget turpis varius 4</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">
                    <div class="single_sidebar">
                        <h2><span>Popular Post</span></h2>
                        <ul class="spost_nav">
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img1.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 1</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img2.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 2</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img1.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 3</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../pages/single_page.html" class="media-left">
                                        <img alt="" src="images/post_img2.jpg" />
                                    </a>
                                    <div class="media-body">
                                        <a href="../pages/single_page.html" class="catg_title">
                                            Aliquam malesuada diam eget turpis varius 4</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="single_sidebar">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a>
                </li>
                <li role="presentation">
                  <a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a>
                </li>
                <li role="presentation">
                  <a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a>
                </li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="category">
                  <ul>
                    <li class="cat-item"><a href="#">Sports</a></li>
                    <li class="cat-item"><a href="#">Fashion</a></li>
                    <li class="cat-item"><a href="#">Business</a></li>
                    <li class="cat-item"><a href="#">Technology</a></li>
                    <li class="cat-item"><a href="#">Games</a></li>
                    <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                    <li class="cat-item"><a href="#">Photography</a></li>
                  </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="video">
                  <div class="vide_area">
                    <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="comments">
                  <ul class="spost_nav">
                    <li>
                      <div class="media wow fadeInDown">
                        <a href="../pages/single_page.html" class="media-left">
                          <img alt="" src="images/post_img1.jpg" />
                        </a>
                        <div class="media-body">
                          <a href="../pages/single_page.html" class="catg_title">
                            Aliquam malesuada diam eget turpis varius 1</a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media wow fadeInDown">
                        <a href="../pages/single_page.html" class="media-left">
                          <img alt="" src="images/post_img2.jpg" />
                        </a>
                        <div class="media-body">
                          <a href="../pages/single_page.html" class="catg_title">
                            Aliquam malesuada diam eget turpis varius 2</a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media wow fadeInDown">
                        <a href="../pages/single_page.html" class="media-left">
                          <img alt="" src="images/post_img1.jpg" />
                        </a>
                        <div class="media-body">
                          <a href="../pages/single_page.html" class="catg_title">
                            Aliquam malesuada diam eget turpis varius 3</a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media wow fadeInDown">
                        <a href="../pages/single_page.html" class="media-left">
                          <img alt="" src="images/post_img2.jpg" />
                        </a>
                        <div class="media-body">
                          <a href="../pages/single_page.html" class="catg_title">
                            Aliquam malesuada diam eget turpis varius 4</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div> -->
                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>Join Us</span></h2>
                        <a class="sideAdd" href="#"><img style="object-fit:cover" src="images/telegram.gif" alt="" /></a>
                    </div>
                    <!-- <div class="single_sidebar wow fadeInDown">
              <h2><span>Category</span></h2>
              <select class="catgArchive">
                <option>Select Category</option>
                <option>Life styles</option>
                <option>Sports</option>
                <option>Technology</option>
                <option>Treads</option>
              </select>
            </div> -->
                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>GENERES</span></h2>
                        <ul>
                            <li><a style="padding-top: 10px;padding-bottom: 10px;" href="#">Blog</a></li>
                            <li><a style="padding-top: 10px;padding-bottom: 10px;" href="#">Blog</a></li>
                            <li><a style="padding-top: 10px;padding-bottom: 10px;" href="#">Blog</a></li>
                            <li><a style="padding-top: 10px;padding-bottom: 10px;" href="#">Blog</a></li>
                            <li><a style="padding-top: 10px;padding-bottom: 10px;" href="#">Blog</a></li>

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
                    <div class="footer_widget wow fadeInLeftBig">
                        <h2>Flickr Images</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInDown">
                        <h2>Tag</h2>
                        <ul class="tag_nav">
                            <li><a href="#">Games</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Life &amp; Style</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Photo</a></li>
                            <li><a href="#">Slider</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>Contact</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                        <address>
                            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA
                            Phone: 123-326-789 Fax: 123-546-567
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <p class="copyright">
                Copyright &copy; 2021 <a href="index">NewsFeed</a>
            </p>
            <p class="developer">Developed By Bekyfeeds</p>
        </div>
    </footer>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    <script src="../assets/js/jquery.li-scroller.1.0.js"></script>
    <script src="../assets/js/jquery.newsTicker.min.js"></script>
    <script src="../assets/js/jquery.fancybox.pack.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>