<!DOCTYPE html>
<html>

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
  <link rel="stylesheet" type="text/css" href="assets/css/utilities.min.css" />
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
                <li><a href="pages/about">About</a></li>
                <li><a href="pages/contact-us">Contact</a></li>
                <!-- <li><a href="pages/privacy">Privacy Policies</a></li>
                <li><a href="pages/terms">Terms and Conditions</a></li> -->
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
            <li class="active">
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
          <li><a href="pages/contact.html">Contact Us</a></li>
          <li><a href="pages/404.html">404 Page</a></li> -->
            <li><a href="pages/tv-show">TV Show</a></li>
            <li><a href="pages/movies">Movies</a></li>
            <li><a href="pages/request">Your Requests</a></li>
            <li><a href="pages/news">News</a></li>
            <li><a href="pages/trailer">Movie Trailers</a></li>
            <li><a href="pages/sport">Sport</a></li>
            <li><a href="pages/game">Game</a></li>
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
                <a href="single-series/' . $popular['url_name'] . '">' . $popular['name'] . '</a>
              </li>
              ';
              }
              ?>

            </ul>
            <div class="social_area">
              <ul class="social_nav">
                <li class="twitter"><a href="#"></a></li>
                <li class="facebook"><a href="#"></a></li>
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

            foreach ($recentSeries as $recent) {

              echo '
  <div class="single_iteam">
  <a href="pages/single-series/' . $recent["url_name"] . '">
 
  
  <img style="background-color:black;object-fit:contain" src="images/posters/' . $recent["img_url"] . '" alt="' . $recent["name"] . '" /></a>

  <div class="slider_article">
    <h2>
      <a class="slider_tittle" href="pages/single-series/">' . $recent["name"] . '</a>
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
  <figure href="pages/single-movie/' . $recent["title"] . '" class="cursor-pointer media wow fadeInDown animated flex bg-gray-100 border rounded ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32  mr-3">
      <img alt=". $recent["title"] ." class="w-32 h-full" src="' . $recent["img_url"] . '" />
    </a>
    <figcaption class="media-body p-3">
      <a href="catg_title pages/single-movie/' . $recent["title"] . '" class="catg_title">
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

                    echo '<li class="md:w-1/2 w-full my-2 px-1 border rounded">
  <div class=" media wow fadeInDown animated  flex cursor-pointer   flex bg-gray-100 border rounded">
    <a href="' . $recent["name"] . '" class="w-32 text-lg  md:mr-3">
      <img class="w-32 h-full"  alt="" src="images/posters/' . $recent["img_url"] . '" />
    </a>
    <div class="media-body p-3">
      <a href="' . $recent["name"] . '" class="catg_title">'
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

                  foreach ($recentSeries as $recent) {

                    echo '<li class="md:w-1/2 w-full my-2 px-1 border rounded">
  <div class=" media wow fadeInDown animated  flex cursor-pointer   flex bg-gray-100 border rounded">
    <a href="' . $recent["name"] . '" class="w-32 text-lg  mr-3">
      <img class="w-32 h-full"  alt="" src="images/posters/' . $recent["img_url"] . '" />
    </a>
    <div class="media-body p-3">
      <a href="' . $recent["name"] . '" class="catg_title">'
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
            <div class="fashion_technology_area">
              <div class="fashion">
                <div class="single_post_content">
                  <h2><span>Fashion</span></h2>
                  <ul class="business_catgnav wow fadeInDown">
                    <li>
                      <figure class="bsbig_fig">
                        <a href="pages/single_page.html" class="featured_img">
                          <img alt="" src="images/featured_img2.jpg" />
                          <span class="overlay"></span>
                        </a>
                        <figcaption>
                          <a href="pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a>
                        </figcaption>
                        <p>
                          Nunc tincidunt, elit non cursus euismod, lacus augue
                          ornare metus, egestas imperdiet nulla nisl quis
                          mauris. Suspendisse a phare...
                        </p>
                      </figure>
                    </li>
                  </ul>

                  <ul class="my-2 spost_nav">
                    <?php

                    foreach ($recentMovies as $recent) {

                      echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="cursor-pointer media wow fadeInDown animated flex bg-gray-100 border rounded ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32  mr-3">
      <img alt=". $recent["title"] ." class="w-32 h-full" src="' . $recent["img_url"] . '" />
    </a>
    <figcaption class="media-body p-3">
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
                  <h2><span>Technology</span></h2>
                  <ul class="business_catgnav">
                    <li>
                      <figure class="bsbig_fig wow fadeInDown">
                        <a href="pages/single_page.html" class="featured_img">
                          <img alt="" src="images/featured_img3.jpg" />
                          <span class="overlay"></span>
                        </a>
                        <figcaption>
                          <a href="pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a>
                        </figcaption>
                        <p>
                          Nunc tincidunt, elit non cursus euismod, lacus augue
                          ornare metus, egestas imperdiet nulla nisl quis
                          mauris. Suspendisse a phare...
                        </p>
                      </figure>
                    </li>
                  </ul>
                  <ul class="my-2 spost_nav">
                    <?php

                    foreach ($recentMovies as $recent) {

                      echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="cursor-pointer media wow fadeInDown animated flex bg-gray-100 border rounded ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32  mr-3">
      <img alt=". $recent["title"] ." class="w-32 h-full" src="' . $recent["img_url"] . '" />
    </a>
    <figcaption class="media-body p-3">
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


          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <aside class="right_content">
            <div class="single_sidebar wow fadeInDown bg-white">
              <h2><span>Join Us</span></h2>
              <a class="sideAdd" href="#"><img style="object-fit:cover" src="images/telegram.gif" alt="" /></a>
            </div>
            <div class="single_sidebar bg-white">
              <h2><span>Editor's Choice</span></h2>
              <ul class="my-2">
                <?php

                foreach ($recentMovies as $recent) {

                  echo '<li class="my-3">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="cursor-pointer media wow fadeInDown animated flex bg-gray-100 border rounded ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32  mr-3">
      <img alt=". $recent["title"] ." class="w-32 h-full" src="' . $recent["img_url"] . '" />
    </a>
    <figcaption class="media-body p-3">
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
                        <a href="pages/single_page.html" class="media-left">
                          <img alt="" src="images/post_img1.jpg" />
                        </a>
                        <div class="media-body">
                          <a href="pages/single_page.html" class="catg_title">
                            Aliquam malesuada diam eget turpis varius 1</a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media wow fadeInDown">
                        <a href="pages/single_page.html" class="media-left">
                          <img alt="" src="images/post_img2.jpg" />
                        </a>
                        <div class="media-body">
                          <a href="pages/single_page.html" class="catg_title">
                            Aliquam malesuada diam eget turpis varius 2</a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media wow fadeInDown">
                        <a href="pages/single_page.html" class="media-left">
                          <img alt="" src="images/post_img1.jpg" />
                        </a>
                        <div class="media-body">
                          <a href="pages/single_page.html" class="catg_title">
                            Aliquam malesuada diam eget turpis varius 3</a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media wow fadeInDown">
                        <a href="pages/single_page.html" class="media-left">
                          <img alt="" src="images/post_img2.jpg" />
                        </a>
                        <div class="media-body">
                          <a href="pages/single_page.html" class="catg_title">
                            Aliquam malesuada diam eget turpis varius 4</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div> -->

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
              <h2><span>Your Requests</span></h2>
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