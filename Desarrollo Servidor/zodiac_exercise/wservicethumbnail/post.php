<?php
include_once('data.php');
$apikey = "ab28d94712f7ba9c0449a01187e7655b0a7830380483";
$width   = 380;

foreach ($websites as $website) {
    echo "Getting screenshot for " . $website['name'] . "\n";

    //--- Make the call -------------------//
    $fetchUrl = "https://api.thumbnail.ws/api/".$apikey ."/thumbnail/get?url=".
        urlencode($website['url'])."&width=". urlencode($width);


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.thumbnail.ws/api/' . $apikey . '/thumbnail/get');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
        'url' => $website['url'],
        'width' => $width,
        'fullpage' => 'false'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $image = curl_exec($ch);
    curl_close($ch);

    //--- Save image to disk
    file_put_contents(dirname(__FILE__) . '/screenshot' . $website['id'] . '.jpg', $image);
}
?>