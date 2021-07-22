
<?php
$BOT_TOKEN = "1195720491:AAEealf0gixhJsJ_P1wRVfRCj04Wi2aA7k4"; //botToken
$siteUrl="";//link to this file
//$update = file_get_contents('php://input');
//$update = json_decode($update, true);
//$userChatId = $update["message"]["from"]["id"]?$update["message"]["from"]["id"]:null; 
$userChatId="410802945";
$groupId="";//GroupId

if($userChatId){
//Database code return site link
foreach($posts as $movie){
    $parameters2 = array(
        "chat_id" => $userChatId,
        "photo" => $movie['poster'],
        "caption"=>"🚀".$movie['title'].
       "🚀https://bekyfeeds.com/single-movie.php?title=".$movie['title'],// site ink for response of a request
        "parseMode" => "html"
    );
    send("sendPhoto", $parameters2);
}


//send("sendPhoto", $parameters2);
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


