<?php

$update = file_get_contents('php://input');
$update = json_decode($update, true);
$request=array();
// var_dump($update);
if( $update!==NUll  ){
  $request=array("requester"=>$update["requester"],"title"=>$update["title"],"link"=>$update["link"]);
  if(  $request['requester']!==null&&
$request['title']!==null&&
$request['link']!=null ){
   include 'movie_insert_single.php'; 
}else{
    echo "Incomplete Data";
}

}else{
    echo "Empty Data";
}






?>