<?php
//--- Get all websites we want screenshots for -----
include_once('data.php');
//--- Set the parameters --------------//
$apikey = "ab28d94712f7ba9c0449a01187e7655b0a7830380483";
$width   = 380;
//--- Loop through all websites --------------------
foreach ($websites as $website) {
    echo "Getting screenshot for " . $website['name'] . "\n";

    //--- Make the call -------------------//
    $fetchUrl = "https://api.thumbnail.ws/api/".$apikey ."/thumbnail/get?url=".
        urlencode($website['url'])."&width=". urlencode($width);

    $image = file_get_contents($fetchUrl);
    //--- Save image to disk
    file_put_contents(dirname(__FILE__) . '/screenshot' . $website['id'] . '.jpg', $image);
}