<html>
<head>
<title> 
Request
</title>


<?php

$requester="";
$title="";
$link="";
$request=array();
if(isset($_POST['button1'])) {
  $requester=$_POST['requester'];
  $title=$_POST['title'];
  $link=$_POST['link'];
// var_dump($update);

  $request=array("requester"=>$requester,"title"=>$title,"link"=>$link);
  if($request!==null){
   include 'movie_insert_single.php'; 
}else{
    echo "Incomplete Data";
}


}






?>
</head>
<body>
<form method="post">
<p>Requester</p>
<input name="requester" type="text" required>
<p>Movie Title</p>
    <input name="title" type="" required>
    <p>Movie Link</p>
    <input name="link" type="" required>

    <button name="button1"> Add Request</button>
</form >
<?php
// foreach( $links as  $item ){
//     echo "<a href=$item>$movie"."$episode</a> ";
//     echo "</br>";
// }

?>
</body>

</html>
