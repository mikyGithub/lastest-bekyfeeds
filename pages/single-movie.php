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
    <link rel="stylesheet" type="text/css" href="../assets/css/utilities.min.css" />
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<!-- PHP -->

<?php


require '../models/FeatureFilm.php';
require '../config/Database.php';
$database = new Database();
$db = $database->connect();
$film = new FeatureFilm($db);



$recentFilm = $film->getRecent()->fetchAll(PDO::FETCH_ASSOC);
$popularFilm = $film->getPopular()->fetchAll(PDO::FETCH_ASSOC);
$popularFilm = $film->getPopular()->fetchAll(PDO::FETCH_ASSOC);

$isParameter = false;

$page_number = 1;
$selected_letter=0;
$selected_genre=0;
$search='';
$selected_series = '';
if (isset($_GET['title'])) {
    $selected_series = $_GET['title'];
    $film_detail = $film->getFilmDetail($selected_series)->fetch(PDO::FETCH_ASSOC);
    $title = $film_detail['title'];
    $img_url = $film_detail['img_url'];
    $description = $film_detail['description'];
    $genre = $film_detail['genre'];
    $releasing_year = $film_detail['releasing_year'];
}
if (isset($_GET['page_number'])) {
    $page_number = $_GET['page_number'];
   
} 


if (isset($_GET['letter'])) {
    $selected_letter = $_GET['letter'];
    $allFilm=$film->getByLetterPaginated($selected_letter,$page_number);
    $isParameter = true;
   
} 
if (isset($_GET['genre'])) {
    $selected_genre = $_GET['genre'];
    $allFilm=$film->getByGenrePaginated($selected_genre,$page_number);
    $isParameter = true;
}

if (isset($_GET['search'])) {
  //  echo $search
    $search = $_GET['search'];
    $allFilm=$film->searchFilmPaginated($search,$page_number);
    $isParameter = true;
}
if($isParameter === false){
    $allFilm=$film->getFilmsPaginated($page_number);
    
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
                                <li><a href="index">Home</a></li>
                                <li><a href="../pages/about">About</a></li>
                                <li><a href="../pages/contact-us">Contact</a></li>
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
                            <a href="#"><img src="../images/banner.jpg" alt="" /></a>
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

                        <li class="active"><a href="../pages/tv-show">TV Show</a></li>
                        <li><a href="../pages/movies">Movies</a></li>
                        <li><a href="../pages/request">Your Requests</a></li>
                        <!-- <li><a href="../pages/news">News</a></li>
                        <li><a href="../pages/trailer">Movie Trailers</a></li>
                        <li><a href="../pages/sport">Sport</a></li>
                        <li><a href="../pages/game">Game</a></li> -->
                    </ul>
                </div>
            </nav>
        </section>


        <section id="contentSection">

            <div class="flex flex-col w-full">
                <div class="latest_post">
                    <form action="./tv-show.php">
                        <div style="border:0px" class="flex items-center justify-between my-4 outline-none ">

                            <input style="border:0px; border-bottom:2px solid #139ea8" type="text"
                                placeholder="Search.." class="w-5/6 px-3 py-3 bg-gray-200 border-b focus:outline-none"
                                name="search">
                            <button style="border:0px; border-bottom:2px solid #139ea8"
                                class="w-1/6 px-6 py-3 bg-theme focus:outline-none" type="submit">Search</button>
                        </div>
                    </form>




                    <div class="flex">


                        <div>

                            <div class="flex justify-between">
                                <div class="w-3/4 mr-3">
                                    <div class="single_post_content wow fadeInDown">
                                        <h2><span><?php echo $title; ?></span></h2>
                                        <div>
                                            <div class="rounded shadow-md  md:flex md:bg-gray-900 md:h-64">


                                                <div class="w-full md:w-1/5 ">
                                                    <div class="">

                                                        <?php
                            echo '<img src="' .$img_url.  '"  class="w-full md:h-64 md:object-contain md:-mx-4 " alt="' . $title . '">';
                            ?>


                                                    </div>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-between w-full pl-0 mt-2 md:flex-1 md:p-3 md:mt-0">

                                                    <h2 class="text-theme ">
                                                        <?php echo $title  ?></h2>
                                                    <p class="text-justify text-gray-300 ">
                                                        <?php echo $description  ?>
                                                    </p>

                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/4">

                                    <div class="bg-white single_post_content wow fadeInDown">
                                        <h2><span>Join Us</span></h2>
                                        <a class="sideAdd" href="#"><img style="object-fit:cover"
                                                src="../images/telegram.gif" alt="" /></a>
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
                        <h2><span>Latest Movies</span></h2>

                        <ul class="my-2 spost_nav">
                            <?php

                            foreach ($recentFilm as $recent) {

                                echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32 mr-3">
      <img alt="'. $recent["title"] .'" class="w-32 h-full" src="' .$recent["img_url"]. '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" pages/single-movie/' . $recent["title"] . '" class="">
      ' . $recent["title"] . ' <p class="genre">' . $recent["genre"] . '</p> <p class="year">' . $recent["releasing_year"] . '</p> </a>
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
                        <h2><span>Popular Movies</span></h2>

                        <ul class="my-2 spost_nav">
                            <?php

                            foreach ($recentFilm as $recent) {

                                echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32 mr-3">
      <img alt="'. $recent["title"] .'" class="w-32 h-full" src="' .$recent["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" pages/single-movie/' . $recent["title"] . '" class="">
      ' . $recent["title"] . ' <p class="genre">' . $recent["genre"] . '</p> <p class="year">' . $recent["releasing_year"] . '</p> </a>
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

            <div class="single_post_content">
                <h2><span>Editor's Choice</span></h2>
                <div class="single_post_content_left">
                    <a class="sideAdd" href="#"><img class="object-contain" src="../images/telegram.gif" alt="" /></a>
                </div>
                <div class="single_post_content_right">
                    <ul class="my-2 spost_nav">
                        <?php

                        foreach ($recentFilm as $recent) {

                            echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32 mr-3">
      <img alt="'. $recent["title"] .'" class="w-32 h-full" src="' .$recent["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" pages/single-movie/' . $recent["title"] . '" class="">
      ' . $recent["title"] . ' <p class="genre">' . $recent["genre"] . '</p> <p class="year">' . $recent["releasing_year"] . '</p> </a>
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