<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
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

</head>
<!-- PHP -->

<?php

require '../models/Home.php';
require '../models/FeatureFilm.php';
require '../config/Database.php';
$database = new Database();
$db = $database->connect();
$home = new Home($db);

$recentSeries = $home->getLatestEpisodes()->fetchAll(PDO::FETCH_ASSOC);
$popularSeries = $home->getPopularEpisodes()->fetchAll(PDO::FETCH_ASSOC);

$recentMovies = $home->getLatestMovies()->fetchAll(PDO::FETCH_ASSOC);
$popularMovies = $home->getPopularMovies()->fetchAll(PDO::FETCH_ASSOC);





?>

<body class="container">
    <div class="flex py-6 mb-6 bg-gray-200" style="border-bottom:1px #139ea8 dashed ">
        <button style="border:0px" class="w-auto p-2 mx-3 bg-theme focus:outline-none">Cpanel</button>
        <button style="border:0px" class="w-auto p-2 mx-3 bg-theme focus:outline-none">Database</button>
        <button style="border:0px" class="w-auto p-2 mx-3 bg-theme focus:outline-none">Links</button>
        <button style="border:0px; background-color:#5AA589" class="w-auto p-2 mr-3 text-white focus:outline-none">Get Episode Json</button>
        <button style="border:0px" class="w-auto p-2 mx-3 bg-theme focus:outline-none">Series & Movies</button>
        <button style="border:0px; background-color:#5AA589" class="w-auto p-2 mr-3 text-white focus:outline-none">URL Iframe</button>
        <button style="border:0px; background-color:#5AA589" class="w-auto p-2 mr-3 text-white focus:outline-none">Add Request</button>
    </div>
    <section class=" md:flex">
        </div>
        <div style="border:1px #139ea8 dashed " class="w-full border md:w-1/2 md:mr-3">
            <h2><span>Series</span></h2>
            <form action="/action_page.php">
                <div style="border:0px" class="flex items-center justify-between my-4 outline-none ">

                    <input style="border:0px" type="text" placeholder="Search.." class="w-5/6 px-3 py-3 bg-gray-200 focus:outline-none" name="search">
                    <button style="border:0px" class="w-1/6 px-6 py-3 bg-theme focus:outline-none" type="submit">Search</button>
                </div>
            </form>
            <ul>
                <?php

                foreach ($recentMovies as $recent) {

                    echo '<li class="my-2">
  <figure  class="flex bg-gray-200 border rounded cursor-pointer ">
   
    <figcaption class="flex justify-between p-3 media-body">
    <div>
    <div  class="catg_title">
    ' . $recent["title"] . '  </div>
    </div>
    <div>
    <form action="/action_page.php">
    <div class="flex">
    <button style="border:0px" class="w-auto p-2 mx-3 bg-theme focus:outline-none" type="submit">Popular</button>
    <button style="border:0px; background-color:#5AA589" class="w-auto p-2 mr-3 text-white focus:outline-none" type="submit">Update</button>
    <button style="border:0px;background-color:#215175" class="w-auto p-2 mr-3 text-white bg-theme focus:outline-none" type="submit">Search</button>
    </div>
               
               
            </form>
    </div>
     
    </figcaption>
  </figure>
</li>
';
                }
                ?>



            </ul>
        </div>
        <div style="border:1px #139ea8 dashed " class="w-full border md:w-1/2 ">
            <h2><span>Movies</span></h2>
            <form action="/action_page.php">
                <div style="border:0px" class="flex items-center justify-between my-4 outline-none ">

                    <input style="border:0px" type="text" placeholder="Search.." class="w-5/6 px-3 py-3 bg-gray-200 focus:outline-none" name="search">
                    <button style="border:0px" class="w-1/6 px-6 py-3 bg-theme focus:outline-none" type="submit">Search</button>
                </div>
            </form>
            <ul>
                <?php

                foreach ($recentMovies as $recent) {

                    echo '<li class="my-2">
  <figure href="pages/single-movie/' . $recent["title"] . '" class="flex bg-gray-200 border rounded cursor-pointer ">
    <a href="pages/single-movie/' . $recent["title"] . '" class="w-32 mr-3">
      <img alt=". $recent["title"] ." class="w-32 h-full" src="' . $recent["img_url"] . '" />
    </a>
    <figcaption class="p-3 media-body">
      <a href="catg_title pages/single-movie/' . $recent["title"] . '" class="catg_title">
      ' . $recent["title"] . ' <p class="genre">' . $recent["genre"] . '</p> <p class="year">' . $recent["releasing_year"] . '</p> </a>
    </figcaption>
  </figure>
</li>
';
                }
                ?>



            </ul>
        </div>
    </section>
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