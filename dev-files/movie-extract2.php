<html>
<head>
<title> 
qd6qsuqis6edd5gp192vgccnww...
</title>



<?php


// extract from http://qd6qsuqis6edd5gp192vgccnwwxidzxu29q0t69s3tb6ohlwwth2v0wx2zl6o86.rklarmsbo0c2z3kor3bfskiowmugz1nwbex8qvallstrlk5idnnwxwqzoqmdizf.site/Movie/Movie/


libxml_use_internal_errors(true); //hide warnings
// $movieLink="";
// $movie="";
// $episode="";
$year="";
$links=array();
$test_link="";
$api_url="http://www.omdbapi.com/?t=";
$api_key="be3457be";
$notify=false;
    // $movie=$_POST['movie'];
    // $episode=$_POST['episode'];
    if(isset($_POST['button1'])) {

$year=$_POST['year'];
$notify=$_POST['notify']==='on'?1:0;

$url="http://qd6qsuqis6edd5gp192vgccnwwxidzxu29q0t69s3tb6ohlwwth2v0wx2zl6o86.rklarmsbo0c2z3kor3bfskiowmugz1nwbex8qvallstrlk5idnnwxwqzoqmdizf.site/Movie/Movie/".$year;
   $trunc_url="http://qd6qsuqis6edd5gp192vgccnwwxidzxu29q0t69s3tb6ohlwwth2v0wx2zl6o86.rklarmsbo0c2z3kor3bfskiowmugz1nwbex8qvallstrlk5idnnwxwqzoqmdizf.site";
    $html = file_get_contents($url);
 
    
    $doc = new \DOMDocument();
    $doc->loadHTML($html); //helps if html is well formed and has proper use of html entities!
    
    $xpath = new DOMXpath($doc);
    
    $nodes = $xpath->query('//a');
    $menu_nodes;
    $count=0;
    //var_dump($url);
    foreach($nodes as $node) {
      
 if($count>0&&$node->nodeValue!=="Fast & Furious Presents Hobbs & Shaw 2019"&& $node->nodeValue!=="Maleficent Mistress of Evil 2019"){
       // var_dump($node->getAttribute('href'));
            try {
                $temp_html=(file_get_contents($trunc_url.$node->getAttribute('href')));

                $temp_doc = new \DOMDocument();
                $temp_doc->loadHTML($temp_html); //helps if html is well formed and has proper use of html entities!
                
                $temp_xpath = new DOMXpath($temp_doc);
                
                $temp_nodes = $temp_xpath->query('//a');
                $temp_links=array();
                $count_in=0;
                foreach($temp_nodes as $tn){
                    if($count_in!==0){
                    array_push($temp_links,$trunc_url.$tn->getAttribute('href'));
                    }
                    $count_in++;
                }
            echo str_replace(' ', '.',substr($node->nodeValue,0,-4));    

              $api_html = file_get_contents( $api_url.str_replace(' ', '.',substr($node->nodeValue,0,-4))."&y=".$year."&apikey=be3457be");
            
         
           
           
           
              $pp=Json_decode($api_html);
            // var_dump($pp);
            substr($node->nodeValue,-4) ;
            try{

                $api_json_Value=json_decode($html);
                if($pp!==null&&$pp->Response==="True"){
                   $tj=array("title"=>$node->nodeValue,"links"=>$temp_links,"poster"=>$pp->Poster,"imdbRating"=>$pp->imdbRating,"plot"=>$pp->Plot,"year"=>$pp->Year,"genre"=>$pp->Genre);
                  
                    array_push($links,$tj);
                    $temp_links=array();
                    $count_in=0;
                }

            }  catch (Exception $e) {
                echo $e->getMessage();
            }
 
             

            }
            catch (Exception $e) {
                echo $e->getMessage();
            }
 

    
        
 }

$count++;


}

include 'movie_insert.php';
//var_dump( Json_encode($links));

    }
?>


</head>

<body>
<form method="post">
<p>  Enter Year</p>
 <input name="year" type="Movie Title">

    <p> Notify (send message to telegram Channel)</p>
  <input type="checkbox" name="notify" />
    <button name="button1"> GetMovie</button> 
</form >
<?php


?>
</body>

</html>



<!-- http://qd6qsuqis6edd5gp192vgccnwwxidzxu29q0t69s3tb6ohlwwth2v0wx2zl6o86.rklarmsbo0c2z3kor3bfskiowmugz1nwbex8qvallstrlk5idnnwxwqzoqmdizf.site/Movie/Movie/1963/High%20And%20Low%201963/ -->



<!-- http://qd6qsuqis6edd5gp192vgccnwwxidzxu29q0t69s3tb6ohlwwth2v0wx2zl6o86.rklarmsbo0c2z3kor3bfskiowmugz1nwbex8qvallstrlk5idnnwxwqzoqmdizf.sit/Movie/Movie/1963/High%20And%20Low%201963/ -->