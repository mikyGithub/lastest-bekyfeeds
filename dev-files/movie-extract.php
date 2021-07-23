<html lang="en">
<head>
<title> 
FilmBan.xyz
</title>



<?php

// extracts from http://dl.filmban.xyz/Movie/


libxml_use_internal_errors(true); //hide warnings
// $movieLink="";
// $movie="";
// $episode="";
$year="";
$links=array();
$test_link="";
$api_url="http://www.omdbapi.com/?t=";
$api_key="be3457be";
$currentLink="";
$movieName="";
$singleLinks=array();
$movieData="";
$notify=false;
if(isset($_POST['button1'])) {

    $year=$_POST['year'];
    $notify=$_POST['notify']==='on'?1:0;
  
    $url="http://dl.filmban.xyz/Movie/".$year;
    $trunc_url="http://dl.filmban.xyz/Movie/".$year."/";

    $html = file_get_contents($url);
 
    
    $doc = new \DOMDocument();
    $doc->loadHTML($html); //helps if html is well formed and has proper use of html entities!
    
    $xpath = new DOMXpath($doc);
    
    $nodes = $xpath->query('//a');
    $menu_nodes;
    $count=0;
    foreach($nodes as $node) {
    //   echo $count;
    //   echo"</br>";
    //   var_dump($node->getAttribute('href'));
         //echo"</br>";
          //   echo count($nodes); 
 if($count>6){
         //    var_dump($node->getAttribute('href'));
         
         if(substr($node->getAttribute('href'), -3)!=="mp4"&& substr($node->getAttribute('href'), -3)!=="mkv"){
           
               
       
               
            $temp_html=(file_get_contents($trunc_url.$node->getAttribute('href')));

            $temp_doc = new \DOMDocument();
            $temp_doc->loadHTML($temp_html); //helps if html is well formed and has proper use of html entities!
            
            $temp_xpath = new DOMXpath($temp_doc);
            
            $temp_nodes = $temp_xpath->query('//a');
            $temp_links=array();
            $count_in=0;
            foreach($temp_nodes as $tn){
                if($count_in>6 && $count_in<count($temp_nodes)-1){
                array_push($temp_links,$trunc_url.$node->nodeValue.$tn->getAttribute('href'));
                }
                $count_in++;
               
            }
   
       $file=$node->nodeValue;
       $file=substr($file, 0, -1);
       $file=str_replace(' ', '.',$file);
       $file=strtolower($file);
       echo $file;
      
          $api_html = file_get_contents( $api_url.$file."&y=".$year."&apikey=be3457be");
       
       
       
          $pp=Json_decode($api_html);
        
    
            if($pp!==null&&$pp->Response==="True"){
          
                $tj=array("title"=>$pp->Title,"links"=>$temp_links,"poster"=>$pp->Poster,"imdbRating"=>$pp->imdbRating,"plot"=>$pp->Plot,"year"=>$pp->Year,"genre"=>$pp->Genre);
             
                var_dump($tj);
                array_push($links,$tj);
                $temp_links=array();
                $count_in=0;
            


        }
            
            }else{
                if(stripos($node->getAttribute('href'),$movieName)===false){
                 if($movieName!=="" && $movieData!=="" && $movieData->Response==="True"){
                   
                $sm=array("title"=>$movieData->Title,"links"=>$singleLinks,"poster"=>$movieData->Poster,"imdbRating"=>$movieData->imdbRating,"plot"=>$movieData->Plot,"year"=>$movieData->Year,"genre"=>$movieData->Genre);
                array_push($links,$sm);
                $movieName="";
                $movieData="";
                $singleLinks=array();
                 }else{
                    $currentLink=$node->getAttribute('href');
                    $movieName= substr($currentLink, 0,strpos($currentLink, ".".$year) + 1);   
                    echo $movieName;
                    echo "<br/> <br/> <br/>";
                    $api = file_get_contents($api_url.$movieName."&y=".$year."&apikey=be3457be");

                    $movieData=Json_decode($api);
                  var_dump($movieData);
                    array_push($singleLinks,$trunc_url.$currentLink);
                 }

                   
                   


                }else{
                    
                    array_push($singleLinks,$trunc_url.$node->getAttribute('href'));
                }
                

            }
 }

$count++;


}
echo '<br/><br/><br/><br/><br/><br/>';
var_dump($links);
include 'movie_insert.php';
//var_dump( Json_encode($links));
}

?>

</head>

<body>
<form method="post">
<p>  Enter Year</p>
 <input name="year" type="Movie Title">

    <input name="episode" type=""> -->
    <p> Notify (send message to telegram Channel)</p>
  <input type="checkbox" name="notify" />
    <button name="button1"> GetMovie</button> 
</form >
<?php

?>
</body>


