<!DOCTYPE html>
<html>
<?php require "../config/meta.php"; ?>

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
    <link rel="stylesheet" type="text/css" href="../assets/css/utilities.min.css" /> <?php require "../config/js.php"; ?>

</head>
<!-- PHP -->

<?php

require '../models/Home.php';
require '../models/FeatureFilm.php';
require '../config/Database.php';
$database = new Database();
$db = $database->connect();
$home = new FeatureFilm($db);

$movies = $home->getFilms()->fetchAll(PDO::FETCH_ASSOC);


?>

<body >
    <div class="flex py-3 mt-4 mb-6 bg-gray-200" style="border-bottom:1px #1D2861 dashed ">
        <a style="border:0px" href="movies.php" class="w-auto p-2 mx-3 bg-primary focus:outline-none hover:bg-white hover:text-black">Movies</a>
        <a style="border:0px" href="series.php" class="w-auto p-2 mx-3 bg-primary focus:outline-none hover:bg-white hover:text-black">Tv Shows</a>
        <a style="border:0px" href="newsfeeds.php" class="w-auto p-2 mx-3 bg-primary focus:outline-none hover:bg-white hover:text-black">News Feeds</a>
        <a style="border:0px" href="gamesfeeds.php" class="w-auto p-2 mx-3 bg-primary focus:outline-none hover:bg-white hover:text-black">Games Feeds</a>
    </div>
    <section style="border:1px #139ea8 solid" class="p-2 bg-white rounded">
        <div class="flex justify-between py-4 bg-white px-2">
            <div> Movies</div>
            <div>
                <button data-toggle="modal" data-target="#myModal" style="border:0px" class="w-auto p-2 px-3 focus:outline-none bg-primary rounded text-white">
                    <i class="fa fa-plus fa-xs"></i>
                    Add</button>

            </div>
        </div>

        <div class="overflow-auto lg:overflow-visible ">
            <table class="table text-gray-400 border-separate space-y-6 text-sm">
                <thead class="bg-gray-300 text-black">
                    <tr>
                        <th class="p-3 text-center">Name</th>
                        <th class="p-3 text-center">Description</th>
                        <th class="p-3 text-center">Releasing Year</th>
                        <th class="p-3 text-center">Category</th>
                        <th class="p-3 text-center">Link</th>
                        <th class="p-3 text-center">Rating</th>
                        <th class="p-3 text-center">Is Recent</th>
                        <th class="p-3 text-center">Is Popular</th>
                        <th class="p-3 text-center">Is Slider</th>
                        <th class="p-3 text-center">Is Editor</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($movies as $movie) {

                        echo ' <tr class="bg-white text-black">
  <td class="p-3 text-center">
      <div class="flex align-items-center">
      <img alt="'. $movie["title"] .'" class="w-32 h-32" src="' . $movie["img_url"] . '" />
          <div class="pl-2">
              <div class="">'.$movie["title"].'</div>
          </div>
      </div>
  </td>
  <td class="p-3 text-center">
  '.$movie["description"].'
  </td>
  <td class="p-3 text-center">
  '.$movie["releasing_year"].'
  </td>
  <td class="p-3 text-center">
  '.$movie["genre"].'
  </td>
  <td class="p-3 text-center">
  <button class="w-auto  mx-3  py-2 px-3 focus:outline-none bg-primary  text-white rounded" style="border:0px;"  data-toggle="modal" data-target="#linkModal" >
  <i class="fa fa-eye"></i>
</button>
<div id="linkModal" class="modal fade" role="dialog">
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Link</h4>
        </div>
        <div class="modal-body">
            <div class="w-full lg:w-full bg-white">
            '.$movie["link"].'
            </div>
        </div>
        <div class="modal-footer">
            <button class="w-auto p-2 font-medium text-base float-right mx-3 bg-theme focus:outline-none hover:bg-white hover:text-black" type="button">
                Create
            </button>
        </div>
    </div>

</div>
</div>
  </td>
  <td class="p-3 text-center">
  '.$movie["imdb_rating"].'
  </td>
  <td class="p-3 text-center">
  '.$movie["isRecent"].'
  </td>
  <td class="p-3 text-center">
  '.$movie["isPopular"].'
  </td>
  <td class="p-3 text-center">
  '.$movie["isSlider"].'
  </td>
  <td class="p-3 text-center">
  '.$movie["isEditor"].'
  </td>
  <td class="p-3 text-center">
     
      <button class="w-auto  mx-3  py-2 px-3 focus:outline-none bg-primary  text-white rounded" style="border:0px;"   >
          <i class="fa fa-edit"></i>
      </button>
      <button type="button" class="w-auto py-2 px-3 focus:outline-none text-white bg-danger rounded" style="border:0px;background-color:#FF4D4F"  data-toggle="modal" data-target="#myModal">
          <i class="fa fa-remove"></i>
      </button>
  </td>
</tr>
';
                    }
                    ?>


                </tbody>
            </table>
        </div>

    </section>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Movies</h4>
                </div>
                <div class="modal-body">
                    <div class="w-full lg:w-full bg-white">
                        <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            <div class="md:mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                    Movie Name
                                </label>
                                <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Movie Name" />
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Description
                                </label>
                                <textarea class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="description" type="email" placeholder="Description"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Releasing Year
                                </label>
                                <input class="w-full leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" type="date" placeholder="Movie Name" />
                            </div>
                            <div class="md:mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                                    Category
                                </label>
                                <select class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="category" type="text" placeholder="Last Name">
                                    <option value="Drama" label="Drama"></option>
                                </select>
                            </div>
                            <div class="md:mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                    Url Link
                                </label>
                                <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Movie Name" />
                            </div>
                            <div class="md:mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                    Imdb Rating
                                </label>
                                <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Movie Name" />
                            </div>
                            <div class="md:mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                    is Recent
                                </label>
                                <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" type="radio" placeholder="Movie Name" />
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Image
                                </label>
                                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="file" name="fileToUpload" id="fileToUpload">
                            </div>

                            <div class="text-center flex justify-items-end">

                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="w-auto p-2 font-medium text-base float-right mx-3 bg-theme focus:outline-none hover:bg-white hover:text-black" type="button">
                        Create
                    </button>
                </div>
            </div>

        </div>
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