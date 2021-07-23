<html lang="en">
<head>
<title> 
Hello Man
</title>
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bekyfeedscom_movies";
$film_id=0;
$episodes="";
$season="";
$link="";
$quality="";
$api_url="http://www.omdbapi.com/?t=";
$api_key="be3457be";
$notify=false;
if(isset($_POST['button1'])){
$season=$_POST['season'];
$link=$_POST['link'];
$quality=$_POST['quality'];
$film_id=$_POST['filmId'];
$notify=$_POST['notify']==='on'?1:0;
$posts=array();
$type="series";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "connected to database";
        echo "</br></br>";
    }
  
    $sql=$query = 'SELECT * FROM ' . 'episode' . ' WHERE season_id=' . $film_id;
    $result = $conn->query($sql);
$count=0;
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
       
       if($count===0){
        $episodes=$row;
       }
      }
    } else {
      echo "0 results";
    }



$episodes=json_decode($episodes['episodes'],true);

$episodes2=$episodes['data'];
for ($j=0; $j < count($episodes2) ; $j++) { 

 
if($episodes2[$j][0]['season_number']==$season){

for ($i=0; $i <count($episodes2[$j][0]['data']['episodes']); $i++) { 
  if($episodes2[$j][0]['data']['episodes'][$i]['quality']==$quality){
   // echo 'selected Quality is ';
    array_push($episodes2[$j][0]['data']['episodes'][$i]['links'],$link);

}
}

}


}



$full= new stdClass();
$full->data=$episodes2;

var_dump($full);
$sql="UPDATE episode SET episodes = '" .json_encode($full). " '  WHERE season_id = '$film_id' ";
echo $sql;
if($conn->query($sql) === TRUE){
  echo 'Link Added';
}else{
  echo 'Error Occurred';
}

if($notify){
  $selected_series=array();
  $sql=$query = 'SELECT * FROM ' . 'series' . ' WHERE id=' . $film_id;
  $result = $conn->query($sql);
$count=0;
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     
     if($count===0){
      $selected_series=$row;
  
     }
    }
  } else {
    echo "0 results";
  }


  if(strlen($year)!==4){
    $url =  $api_url.str_replace(' ', '.',$selected_series['name'])."&apikey=be3457be";
}else{
    $url = $api_url.str_replace(' ', '.',$selected_series['name'])."&y=".$year."&apikey=be3457be";
}
      echo $url;
$api_html =file_get_contents($url);
$pp=Json_decode($api_html);


var_dump($pp);

  //$temp_links=explode(PHP_EOL, $link);
  if($pp!==null&&$pp->Response==="True"){
     $tj=array("title"=>$pp->Title,"links"=> "temp_links","poster"=>$pp->Poster,"imdbRating"=>$pp->imdbRating,"plot"=>$pp->Plot,"year"=>$pp->Year,"genre"=>$pp->Genre,"isRecent"=>$isRecent,"isPopular"=>$isPopular,"isEditor"=>$isEditor,"isSlider"=>$isSlider);
    
      array_push($posts,$tj);
  
      include 'bot-test.php';


}


}
}
?>



<body>
<form method="post">
  <p>  Enter Season ID</p>
 <input name="filmId" type="text" required>
 <p>  Enter Season Number</p>
 <input name="season" type="text">
<p>  Quality </p>
 <input name="quality" type="text">
 <p>  Enter Link</p>
 <input name="link" type="text">
 <p> Notify (send message to telegram Channel)</p>
 <input type="checkbox" name="notify" />
 
<!-- <p>  Enter as S(number)E(number)</p>
    <input name="episode" type=""> -->

    <button name="button1"> Add Episode</button> 
</form >
<?php
// foreach( $links as  $item ){
//     echo "<a href=$item>$movie"."$episode</a> ";
//     echo "</br>";
// }

?>
</body>

</html>
