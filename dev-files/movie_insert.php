<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bekyfeedscom_movies";
$data=$links;
$posts=array();
$type="movie";
//$data=array();
//$data2=array("title"=>"nodeValue","links"=>"temp_links","poster"=>"Poster","imdbRating"=>"imdbRating","plot"=>"Plot","year"=>"Year","genre"=>"Genre");
   //array_push($data,$data2);
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "connected to database";
        echo "</br></br>";
    }
  
   var_dump($data);
  foreach($data as $movie){
// var_dump($movie);
var_dump( $movie['links']);
echo "</br></br>";
$stmt = $dbh->prepare("INSERT INTO eventtypes (name) VALUES (?)");
$stmt->bindParam(1, $_GET['name']);
$stmt->execute();


         $sql = "INSERT INTO `feature_film`(`id`, `title`, `description`,`releasing_year`,`genre`,`img_url`,`link`,`imdb_rating`,`isRecent`,`isPopular`,`isEditor`,`isSlider`)
      VALUES( 
          NULL,
         '".$movie['title']."',
          '".$movie['plot']."',
          '".$movie['year']."',
          '".$movie['genre']."',
          '".$movie['poster']."',
          '".json_encode($movie['links'])."',
          '".$movie['imdbRating']."',
          '".$movie['isRecent']."',
          '".$movie['isPopular']."',
          '".$movie['isEditor']."',
          '".$movie['isSlider']."'
          
      )";
    echo $sql;
      if ($conn->query($sql) === TRUE) {
        array_push($posts,$movie);
          echo "Activated successfully";
          echo "</br></br>";
          $created_series_id= $conn->insert_id;
         // include 'single.php';
      }else{
        echo "Error Occurred";
        echo "</br></br>";
      }
  }

  if($notify){
    include 'bot-test.php';
  }




   
  
  
  

?>
