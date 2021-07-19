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
$letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");


$recentMovies = $film->getRecent()->fetchAll(PDO::FETCH_ASSOC);
$popularMovies = $film->getPopular()->fetchAll(PDO::FETCH_ASSOC);

$isParameter = false;

$page_number = 1;
$selected_letter=0;
$selected_genre=0;
$search='';
if (isset($_GET['page_number'])) {
    $page_number = $_GET['page_number'];
   
} 

if (isset($_GET['letter'])) {
    $selected_letter = $_GET['letter'];
    $allFilms=$film->getByLetterPaginated($selected_letter,$page_number);
    $isParameter = true;
   
} 
if (isset($_GET['genre'])) {
    $selected_genre = $_GET['genre'];
    $allFilms=$film->getByGenrePaginated($selected_genre,$page_number);
    $isParameter = true;
}

if (isset($_GET['search'])) {
  //  echo $search
    $search = $_GET['search'];
    $allFilms=$film->searchFilmPaginated($search,$page_number);
    $isParameter = true;
}
if($isParameter === false){
    $allFilms=$film->getFilmsPaginated($page_number);
    
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

                        <li><a href="../pages/tv-show">TV Show</a></li>
                        <li class="active"><a href="../pages/movies">Movies</a></li>
                        <li><a href="../pages/request">Your Requests</a></li>
                        <!-- <li><a href="../pages/news">News</a></li>
                        <li><a href="../pages/trailer">Movie Trailers</a></li>
                        <li><a href="../pages/sport">Sport</a></li>
                        <li><a href="../pages/game">Game</a></li> -->
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
                <a href="single-movie.php?title=' . $popular['url_name'] . '">' . $popular['name'] . '</a>
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
  <a href="../pages/single-movie.php?title=' . $recent["title"] . '">
 
  
  <img style="background-color:black;object-fit:contain" src="images/posters/' . $recent["img_url"] . '" alt="' . $recent["name"] . '" /></a>

  <div class="slider_article">
    <h2>
      <a class="slider_tittle" href="../pages/single-movie.php?title=">' . $recent["name"] . '</a>
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

            <div class="flex flex-col w-full">
                <div class="latest_post">
                    <form action="./movies.php">
                        <div style="border:0px" class="flex items-center justify-between my-4 outline-none ">

                            <input style="border:0px; border-bottom:2px solid #139ea8" type="text"
                                placeholder="Search.." class="w-5/6 px-3 py-3 bg-gray-200 border-b focus:outline-none"
                                name="search">
                            <button style="border:0px; border-bottom:2px solid #139ea8"
                                class="w-1/6 px-6 py-3 bg-theme focus:outline-none" type="submit">Search</button>
                        </div>
                    </form>

                    <div class="w-auto my-6">
                        <div class="flex justify-between">
                            <?php
                             foreach ($film->genres as $genre) {
                                echo '<a class="px-6 py-3 mr-1 cursor-pointer hover:bg-blue-200 bg-theme" href="movies.php?genre=' . $genre["link"] . '">' . $genre["name"] . '</a>';
                            }
                            ?>

                        </div>
                    </div>
                    <h2><span>Movies</span></h2>

                    <div class="flex">
                        <div class="w-auto">
                            <div class="flex flex-col justify-between">
                                <?php
                            foreach ($letters as $letter) {
                                echo '<a href="movies.php?letter='.$letter.'" class="px-6 py-3 my-1 cursor-pointer hover:bg-blue-200 bg-theme"> '.$letter.'</a>';
                            }
                                ?>

                            </div>
                        </div>

                        <div>
                            <ul class="flex flex-wrap justify-between">

                                <?php
                                foreach ($allFilms as $movie) {

                                    echo '
            <a href="single-movie.php?title=' . $movie['title'] . '" class="">
            <div  class="m-1 md:mx-3">
            <div class="w-full h-full overflow-hidden">
            <img src="' . $movie['img_url'] . '" class="object-cover rounded-t inner-img media-left-custom " alt="' . $movie['title'] . '">
            </div>
        
              <div class="flex items-center justify-between p-2 rounded-b bg-theme ">
        
                <p class="text-white leading-wider">' . substr($movie['title'], 0, 20)  . '</p>
                
        
              </div>
            </div>
          </a>';
                                }

                                ?>

                            </ul>

                            <!-- Pagination  -->
                            <div class="flex flex-col items-center my-12">
                                <div class="flex text-gray-700">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 mr-1 bg-gray-200 cursor-pointer">
                                        <?php  
                                        if($selected_letter!==0){
                                            echo ' <a href="movies.php?page_number='.$page_number.'&letter='.$selected_letter.'"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 feather feather-chevron-left">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg></a>
                                            ';
                                        }
                                        if($selected_genre!==0){
                                            echo ' <a href="movies.php?page_number='.$page_number.'&letter='.$selected_genre.'"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 feather feather-chevron-left">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg></a>
                                            ';
                                        }
                                        if($selected_genre==0 && $selected_letter==0){
                                            echo ' <a href="movies.php?page_number='.($page_number-1).'"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 feather feather-chevron-left">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg></a>
                                            ';
                                        }
                                        ?>
                                        <!-- <a href="movies.php?page_number= <?php echo $page_number - 1 ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 feather feather-chevron-left">
                                                <polyline points="15 18 9 12 15 6"></polyline>
                                            </svg></a> -->
                                    </div>

                                    <div class="flex h-8 font-medium bg-gray-200">
                                        <?php

                                        for ($i = 1; $i < 8; $i++) {

                                            if ($page_number != $i) {
                                                echo ' <div class="items-center justify-center hidden w-8 leading-5 transition duration-150 ease-in rounded-full cursor-pointer md:flex "><a href="movies.php?page_number=' . $i . '">' . $i . '</div>';
                                            } else {
                                                echo ' <div class="items-center justify-center hidden w-8 leading-5 text-white transition duration-150 ease-in bg-green-600 rounded-full cursor-pointer md:flex "><a href="movies.php?page_number=' . $i . '">' . $i . '</div>';
                                            }
                                        }

                                        ?>
                                        <div
                                            class="flex items-center justify-center w-8 h-8 leading-5 text-white transition duration-150 ease-in bg-pink-600 rounded-full cursor-pointer md:hidden">
                                            4</div>
                                    </div>
                                    <div
                                        class="flex items-center justify-center w-8 h-8 ml-1 bg-gray-200 cursor-pointer">
                                        <?php  
                                        if($selected_letter!==0){
                                            echo ' <a href="movies.php?page_number='.($page_number+1).'&letter='.$selected_letter.'"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg></a>
                                            ';
                                        }
                                        if($selected_genre!==0){
                                            echo ' <a href="movies.php?page_number='.($page_number+1).'&genre='.$selected_genre.'"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg></a>
                                            ';
                                        }
                                        if($selected_genre==0 && $selected_letter==0){
                                            echo ' <a href="movies.php?page_number='.($page_number+1).'"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg></a>
                                            ';
                                        }
                                        ?>


                                        <!-- <a href="movies.php?page_number= <?php echo $page_number + 1 ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg></a> -->
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

                            foreach ($recentMovies as $recent) {

                                echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32 mr-3">
      <img alt=". $recent["title"] ." class="w-32 h-full" src="' . $recent["img_url"] . '" />
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

                            foreach ($recentMovies as $recent) {

                                echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32 mr-3">
      <img alt=". $recent["title"] ." class="w-32 h-full" src="' . $recent["img_url"] . '" />
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

                        foreach ($recentMovies as $recent) {

                            echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media wow fadeInDown animated ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32 mr-3">
      <img alt=". $recent["title"] ." class="w-32 h-full" src="' . $recent["img_url"] . '" />
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