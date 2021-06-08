<?php
session_start();

require_once '../vendor/autoload.php';
require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();


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

    <iframe id="sc-player" width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/687807703&color=%23ff5500&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
    <div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/startalk" title="StarTalk Radio" target="_blank" style="color: #cccccc; text-decoration: none;">StarTalk Radio</a> · <a href="https://soundcloud.com/startalk/cosmic-queries-the-deep" title="Cosmic Queries – The Deep" target="_blank" style="color: #cccccc; text-decoration: none;">Cosmic Queries – The Deep</a></div>
</body>

</html>

</html>