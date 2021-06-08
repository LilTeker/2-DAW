<?php
session_start();

require_once '../vendor/autoload.php';
require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();

/* ITS BETTER WITH THE JS WAY (tests.js)
//Get the SoundCloud URL
$url="https://soundcloud.com/startalk/cosmic-queries-the-deep";
//Get the JSON data of song details with embed code from SoundCloud oEmbed
$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');
//Clean the Json to decode
$decodeiFrame=substr($getValues, 1, -2);
//json decode to convert it as an array
$jsonObj = json_decode($decodeiFrame);

//Change the height of the embed player if you want else uncomment below line
// echo $jsonObj->html;
//Print the embed player to the page
echo str_replace('height="400"', 'height="140"', $jsonObj->html);
*/


?>
<!DOCTYPE html>
<html>

<head>
    <?php
    $site->print_head("tests");
    ?>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="https://w.soundcloud.com/player/api.js"></script>
    <script src="../js/tests.js"></script>
</head>

<body>
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div id="player"></div>
<iframe width="100%" height="400" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?visual=true&url=https%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F687807703&show_artwork=true"></iframe>
    <iframe id="sc-player" width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/687807703&color=%23ff5500&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
    <div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/startalk" title="StarTalk Radio" target="_blank" style="color: #cccccc; text-decoration: none;">StarTalk Radio</a> · <a href="https://soundcloud.com/startalk/cosmic-queries-the-deep" title="Cosmic Queries – The Deep" target="_blank" style="color: #cccccc; text-decoration: none;">Cosmic Queries – The Deep</a></div>
</body>

</html>

</html>