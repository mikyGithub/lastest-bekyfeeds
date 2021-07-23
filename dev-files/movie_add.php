<html lang="en">
<head>
<title> 
Add New Movie
</title>



<?php

libxml_use_internal_errors(true); //hide warnings

$year="";
$title="";
$link="";
$movie_link="";
$isRecent="";
$isPopular="";
$links=array();
$test_link="";
$api_html="";
$url="";
$notify=false;
$api_url="http://www.omdbapi.com/?t=";
$api_key="be3457be";
    if(isset($_POST['button1'])) {

$year=$_POST['year'];
$title=$_POST['title'];
$link=$_POST['link'];

$isRecent=$_POST['isRecent']==='on'?1:0;
$isPopular=$_POST['isPopular']==='on'?1:0;
$isSlider=$_POST['isSlider']==='on'?1:0;
$isEditor=$_POST['isEditor']==='on'?1:0;
$notify=$_POST['notify']==='on'?1:0;

echo $isEditor;
if(strlen($year)!==4){
    $url =  $api_url.str_replace(' ', '.',$title)."&apikey=be3457be";
}else{
    $url = $api_url.str_replace(' ', '.',$title)."&y=".$year."&apikey=be3457be";
}
      echo $url;
$api_html =file_get_contents($url);
$pp=Json_decode($api_html);


var_dump($pp);

  $temp_links=explode(PHP_EOL, $link);
  if($pp!==null&&$pp->Response==="True"){
     $tj=array("title"=>$title,"links"=> $temp_links,"poster"=>$pp->Poster,"imdbRating"=>$pp->imdbRating,"plot"=>$pp->Plot,"year"=>$pp->Year,"genre"=>$pp->Genre,"isRecent"=>$isRecent,"isPopular"=>$isPopular,"isEditor"=>$isEditor,"isSlider"=>$isSlider);
    
      array_push($links,$tj);
     

var_dump($links);

include 'movie_insert.php';

    }
}
?>


</head>

<body>
<form method="post">
<p>  Enter Movie Title</p>
 <input name="title" type="text">
<p>  Enter Year</p>
 <input name="year" type="text">
 <p>  Enter Link</p>
 <textarea name="link" type="text"> </textarea>
 <p>  Is Recent</p>
 <input type="checkbox" name="isRecent" />
 <p>  Is Popular</p>
 <input type="checkbox" name="isPopular" />
 <p>  Is Editor</p>
 <input type="checkbox" name="isEditor" />
 <p>  Is Slider</p>
 <input type="checkbox" name="isSlider" />
 <p> Notify (send message to telegram Channel)</p>
 <input type="checkbox" name="notify" />
 


    <button name="button1"> Add Movie</button> 
</form >
<?php


?>
</body>

</html>



<!-- http://qd6qsuqis6edd5gp192vgccnwwxidzxu29q0t69s3tb6ohlwwth2v0wx2zl6o86.rklarmsbo0c2z3kor3bfskiowmugz1nwbex8qvallstrlk5idnnwxwqzoqmdizf.site/Movie/Movie/1963/High%20And%20Low%201963/ -->



<!-- http://qd6qsuqis6edd5gp192vgccnwwxidzxu29q0t69s3tb6ohlwwth2v0wx2zl6o86.rklarmsbo0c2z3kor3bfskiowmugz1nwbex8qvallstrlk5idnnwxwqzoqmdizf.sit/Movie/Movie/1963/High%20And%20Low%201963/ -->