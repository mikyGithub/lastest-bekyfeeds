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

<body >
    <div class="flex py-6 mt-4 mb-6 bg-gray-200" style="border-bottom:1px #139ea8 dashed ">
        <a style="border:0px" href="movies.php" class="w-auto p-2 mx-3 bg-theme focus:outline-none hover:bg-white hover:text-black">Movies</a>
        <a style="border:0px" href="series.php" class="w-auto p-2 mx-3 bg-theme focus:outline-none hover:bg-white hover:text-black">Tv Shows</a>
        <a style="border:0px" href="newsfeeds.php" class="w-auto p-2 mx-3 bg-theme focus:outline-none hover:bg-white hover:text-black">News Feeds</a>
        <a style="border:0px" href="gamesfeeds.php" class="w-auto p-2 mx-3 bg-theme focus:outline-none hover:bg-white hover:text-black">Games Feeds</a>
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