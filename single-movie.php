<!DOCTYPE html>
<html lang="en">
<?php

require "config/meta.php"; 
require 'models/FeatureFilm.php';
require 'config/Database.php';
$database = new Database();
$db = $database->connect();
$film = new FeatureFilm($db);



$recentMovies = $film->getRecent()->fetchAll(PDO::FETCH_ASSOC);
$popularMovies = $film->getPopular()->fetchAll(PDO::FETCH_ASSOC);
$editorMovies = $film->getEditor()->fetchAll(PDO::FETCH_ASSOC);
 

$isParameter = false;

$page_number = 1;
$selected_letter=0;
$selected_genre=0;
$search='';
$selected_film = '';
if (isset($_GET['alias'])) {
    $selected_film = $_GET['alias'];
    $film_detail = $film->getFilmDetail($selected_film)->fetch(PDO::FETCH_ASSOC);
    $title = $film_detail['title'];
    $img_url = $film_detail['img_url'];
    $description = $film_detail['description'];
    $genre = $film_detail['genre'];
    $releasing_year = $film_detail['releasing_year'];
      $episodes = $film_detail['link'];
    $episodesJson = json_decode($episodes);
   
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



<head>
    <title><?php echo "index of ".$title; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" type="image/x-icon" href="favicon.ico">
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
    <?php require "config/js.php"; ?>
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.min.js"></script>
      <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<!-- PHP -->




<body>


    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">
                        <div class="header_top_left">
                            <ul class="top_nav">
                                <li><a href="../index">Home</a></li>
                                <li><a href="../about">About</a></li>
                                <li><a href="../contact-us">Contact</a></li>

                            </ul>
                        </div>
                        <div class="header_top_right">
                            <a target="_blank" href="https://t.me/bekyfeedscommunity">Join Us on Telegram</a>
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
                        <li><a href="../index">Home</a></li>

                        <li><a href="../tv-show">TV Show</a></li>
                        <li class="active"><a href="../movies">Movies</a></li>
                        <li><a href="../request">Your Requests</a></li>
                        <!-- <li><a href="news">News</a></li>
                        <li><a href="trailer">Movie Trailers</a></li>
                        <li><a href="sport">Sport</a></li>
                        <li><a href="game">Game</a></li> -->
                    </ul>
                </div>
            </nav>
        </section>


        <section id="contentSection">

            <div class="flex flex-col w-full">
                <div class="latest_post">
                    <form action="../movies.php">
                        <div style="border:0px" class="flex items-center justify-between my-4 outline-none ">

                            <input style="border:0px; border-bottom:2px solid #139ea8" type="text"
                                placeholder="Search.." class="w-5/6 px-3 py-3 bg-gray-200 border-b focus:outline-none"
                                name="search">
                            <button style="border:0px; border-bottom:2px solid #139ea8"
                                class="w-1/6 px-6 py-3 bg-theme focus:outline-none" type="submit">Search</button>
                        </div>
                    </form>




                    <div class="md:flex">


                        <div>

                            <div class="md:flex justify-between w-full">
                                <div class="w-full md:w-3/4 md:mr-3">
                                    <div class="single_post_content ">
                                        <h2><span><?php echo $title; ?></span></h2>
                                        <div>
                                            <div class="rounded shadow-md  md:flex md:bg-gray-900 md:h-64">


                                                <div class="w-full md:w-1/5 ">
                                                    <div class="">

                                                        <?php
                            echo '<img src="../images/mposters/' .$img_url.  '"  class="w-full md:h-64 md:object-contain md:-mx-4 " alt="' . $title . '">';
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

                                            <?php if (isset($episodesJson)) {

                   
echo '<div class="my-3 ">
</div>';

if (is_array($episodesJson) || is_object($episodesJson)) {
    echo '
    <div class="mb-2 ">
                                    
                                    <div class="flex items-center justify-between px-4 py-2  text-white bg-green-800 border-b border-gray-800 ">
                                    <h4 class=""> Download links   </h4>
                                    
                                    </div>
        
                                    <div>';

    foreach($episodesJson as $link){
        $link_array = explode('/', $link);
        $file = end($link_array);




        
        echo '<div class="flex items-center justify-between px-3 py-2 text-white bg-gray-900 border-b border-gray-800">
                                            
        <a class="" target="_blank"  href="' . $link . '">
        <div class=" text-gray-500 ">    <h5 class="text-theme"> ' . $file . '</h5> </div>
</a>
</div>';







    }

   
}
} else {
echo '<div class="flex flex-col items-center justify-center p-4 my-3 text-center text-white bg-gray-900">
<svg class="w-12 h-12 mb-3 text-green-500 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" >
<path d="M21 0C15.3545 0 10.239922 1.0161444 6.4472656 2.7226562C4.5509376 3.5759123 2.978214 4.601147 1.8417969 5.8105469C0.73435686 6.9891085 0.040740833 8.3842625 0.005859375 9.8828125 A 1.0001 1.0001 0 0 0 0 10L0 30L0 39C0 40.54327 0.7053797 41.980053 1.8417969 43.189453C2.978214 44.398853 4.5509376 45.424088 6.4472656 46.277344C10.239922 47.983856 15.3545 49 21 49C24.618 49 27.990594 48.582703 30.933594 47.845703C30.462594 47.302703 30.042828 46.714797 29.673828 46.091797C27.138828 46.657797 24.227 47 21 47C15.5975 47 10.712922 46.003363 7.2675781 44.453125C5.5449062 43.678006 4.1881141 42.764632 3.3007812 41.820312C2.4134485 40.875994 2 39.94323 2 39L2 34.320312C3.124493 35.468565 4.6251246 36.457468 6.4472656 37.277344C10.239922 38.983856 15.3545 40 21 40C23.48 40 25.837297 39.795547 28.029297 39.435547C28.062297 38.730547 28.149828 38.040094 28.298828 37.371094C26.099828 37.767094 23.656 38 21 38C15.5975 38 10.712922 37.003363 7.2675781 35.453125C5.5449062 34.678006 4.1881141 33.764632 3.3007812 32.820312C2.4134485 31.875994 2 30.94323 2 30L2 24.337891C3.1234422 25.480958 4.6314889 26.460332 6.4472656 27.277344C10.239922 28.983856 15.3545 30 21 30C26.6455 30 31.760078 28.983856 35.552734 27.277344C37.368511 26.460332 38.876558 25.480958 40 24.337891L40 28C40.683 28 41.348 28.069688 42 28.179688L42 10C42 8.4567299 41.29462 7.0199467 40.158203 5.8105469C39.021786 4.601147 37.449062 3.5759123 35.552734 2.7226562C31.760078 1.0161444 26.6455 2.9605947e-16 21 0 z M 21 2C26.4025 2 31.287078 2.9966369 34.732422 4.546875C36.455094 5.3219941 37.811886 6.2353686 38.699219 7.1796875C39.586552 8.1240064 40 9.0567701 40 10C40 10.94323 39.586552 11.875994 38.699219 12.820312C37.811886 13.764632 36.455094 14.678006 34.732422 15.453125C31.287078 17.003363 26.4025 18 21 18C15.5975 18 10.712922 17.003363 7.2675781 15.453125C5.5449062 14.678006 4.1881141 13.764632 3.3007812 12.820312C2.4134485 11.875995 2 10.94323 2 10C2 9.0567701 2.4134485 8.1240064 3.3007812 7.1796875C4.1881142 6.2353686 5.5449062 5.3219941 7.2675781 4.546875C10.712922 2.9966369 15.5975 2 21 2 z M 2 14.337891C3.1234422 15.480958 4.6314889 16.460332 6.4472656 17.277344C10.239922 18.983856 15.3545 20 21 20C26.6455 20 31.760078 18.983856 35.552734 17.277344C37.368511 16.460332 38.876558 15.480958 40 14.337891L40 20C40 20.94323 39.586552 21.875994 38.699219 22.820312C37.811886 23.764632 36.455094 24.678006 34.732422 25.453125C31.287078 27.003363 26.4025 28 21 28C15.5975 28 10.712922 27.003363 7.2675781 25.453125C5.5449062 24.678006 4.1881141 23.764632 3.3007812 22.820312C2.4134485 21.875994 2 20.94323 2 20L2 14.337891 z M 40 29.982422C34.479266 29.982422 29.982422 34.47927 29.982422 40C29.982422 45.52073 34.479266 50.017578 40 50.017578C45.520734 50.017578 50.017578 45.52073 50.017578 40C50.017578 34.47927 45.520734 29.982422 40 29.982422 z M 40 32.017578C44.420398 32.017578 47.982422 35.579604 47.982422 40C47.982422 44.420396 44.420398 47.982422 40 47.982422C35.579602 47.982422 32.017578 44.420396 32.017578 40C32.017578 35.579604 35.579602 32.017578 40 32.017578 z M 43.525391 35.451172 A 1.0001 1.0001 0 0 0 42.828125 35.757812L40 38.585938L37.171875 35.757812 A 1.0001 1.0001 0 0 0 36.453125 35.453125 A 1.0001 1.0001 0 0 0 35.757812 37.171875L38.585938 40L35.757812 42.828125 A 1.0001 1.0001 0 1 0 37.171875 44.242188L40 41.414062L42.828125 44.242188 A 1.0001 1.0001 0 1 0 44.242188 42.828125L41.414062 40L44.242188 37.171875 A 1.0001 1.0001 0 0 0 43.525391 35.451172 z"  />
</svg>
Sorry, It will be uploaded soon </div>';
} ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="w-full md:w-1/4">

                            <div class="bg-white single_post_content ">
                                <h2><span>Join Us</span></h2>
                                <a class="sideAdd" target="_blank" target="_blank"
                                    href="https://t.me/bekyfeedscommunity" target="_blank"
                                    href="https://t.me/bekyfeedscommunity"><img style="object-fit:cover"
                                        src="../images/telegram.gif" alt="" /></a>
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
  <figure href="../film/' . $recent["alias"] . '" class="flex bg-gray-100 border rounded cursor-pointer media   ">
    <a href="../film/' . $recent["alias"] . '" class="w-32 mr-3">
      <img alt="'. $recent["title"] .'" class="w-32 h-full" src="../images/mposters/' . $recent["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href="../film/' . $recent["alias"] . '" class="">
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

                            foreach ($popularMovies as $popular) {

                                echo '<li class="my-3">
  <figure href="../film/' . $popular["title"] . '" class="flex bg-gray-100 border rounded cursor-pointer media   ">
    <a href="../film/' . $popular["title"] . '" class="w-32 mr-3">
      <img alt="'. $popular["title"] .'" class="w-32 h-full" src="../images/mposters/' . $popular["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" ../film/' . $popular["title"] . '" class="">
      ' . $popular["title"] . ' <p class="genre">' . $popular["genre"] . '</p> <p class="year">' . $popular["releasing_year"] . '</p> </a>
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
                    <a class="sideAdd" class="sideAdd" target="_blank" target="_blank"
                        href="https://t.me/bekyfeedscommunity" target="_blank"
                        href="https://t.me/bekyfeedscommunity"><img class="object-contain" src="../images/telegram.gif"
                            alt="" /></a>
                </div>
                <div class="single_post_content_right">
                    <ul class="my-2 spost_nav">
                        <?php

                        foreach ($editorMovies as $editor) {

                            echo '<li class="my-3">
  <figure href="../film/' . $editor["alias"] . '" class="flex bg-gray-100 border rounded cursor-pointer media   ">
    <a href="../film/' . $editor["alias"] . '" class="w-32 mr-3">
      <img alt="'. $editor["title"] .'" class="w-32 h-full" src="../images/mposters/' . $editor["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href=" ../film/' . $editor["alias"] . '" class="">
      ' . $editor["title"] . ' <p class="genre">' . $editor["genre"] . '</p> <p class="year">' . $editor["releasing_year"] . '</p> </a>
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
                            <li><a target="_blank" href="https://t.me/bekyfeedscommunity">
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