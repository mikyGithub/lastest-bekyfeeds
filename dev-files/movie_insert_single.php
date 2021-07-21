<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bekymovies";
$movie=$request;
//$data=array();
//$data2=array("title"=>"nodeValue","links"=>"temp_links","poster"=>"Poster","imdbRating"=>"imdbRating","plot"=>"Plot","year"=>"Year","genre"=>"Genre");
   //array_push($data,$data2);
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
       // echo "connected to database";
       // echo "</br></br>";
    }
  //var_dump($movie);
  
    $sql = "INSERT INTO `request`(`id`, `requester`, `subject`,`solution`)
      VALUES( 
          NULL,
         '".$movie['requester']."',
          '".$movie['title']."',
          '".$movie['link']."'     
      )";
 // echo $sql;
      if ($conn->query($sql) === TRUE) {
          echo "Activated successfully";
         // echo "</br></br>";
          $created_series_id= $conn->insert_id;
         // include 'single.php';
      }else{
        echo "Error Occurred";
       // echo "</br></br>";
      }


   
  
  
  

?>
