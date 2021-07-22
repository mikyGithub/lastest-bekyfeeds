
<?php

$BOT_TOKEN = "1900106823:AAECIQGvedOssmQoyC0qPbdmB5jpR-pIlD4"; //botToken

$siteUrl="";//link to this file

$userChatId="410802945"; // change to Channel Chat Id
// $userChatId="339630322";

//$userChatId="-1001210488562";//me
//$userChatId="-1001373583472"; //BekyFeeds Group
$groupId="";//GroupId

if($userChatId){
//Database code return site link
if($type==='movie'){
    foreach($posts as $movie){
    $parameters = array(
        "chat_id" => $userChatId,
        "photo" => $movie['poster'],
        "caption"=>"🚀".$movie['title'].
       "🚀https://bekyfeeds.com/single-movie.php?title=".$movie['title'],// site ink for response of a request
        "parseMode" => "html"
    );
    send("sendPhoto", $parameters);
}
}else{
    foreach($posts as $movie){
        $parameters = array(
            "chat_id" => $userChatId,
            "photo" => $movie['poster'],
           "caption"=>"🚀".$movie['title']."New Episode Added".
           "🚀https://bekyfeeds.com/series-movie.php?title=".$movie['title'],// site ink for response of a request
            "parseMode" => "html"
        );
        send("sendPhoto", $parameters);
    }
}



//send("sendPhoto", $parameters);
//send("sendMessage", $parametersGroup);
}

function send($method, $data){
global $BOT_TOKEN;
$url = "https://api.telegram.org/bot$BOT_TOKEN/$method";

if(!$curld = curl_init()){
    exit;
}
curl_setopt($curld, CURLOPT_POST, true);
curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
curl_setopt($curld, CURLOPT_URL, $url);
curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curld);
curl_close($curld);
return $output;
}



/*
https://api.telegram.org/bot$bot_token/setwebhook?url=$siteUrl 
*/

?>


