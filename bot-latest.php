<?php

$message = "Season Finale : Mr Inbetween Season 3 Episode 9 : I'm Not Leaving •——————————————-• https://www.melodelaa.link/2021/05/mr-inbetween.melodl.html";
$url = "https://api.telegram.org/bot1929893848:AAFUm8HS4UCM489P_0pUz1SoohwrUonZ4yA/sendPhoto?chat_id=-578793396&photo=https://tutsforweb.com/wp-content/uploads/2018/02/photo.png&caption=".$message;
redirect($url);

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    // redirectToHome();
    die();
}






?>