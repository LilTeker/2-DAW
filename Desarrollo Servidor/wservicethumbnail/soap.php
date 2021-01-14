<?php
//--- Construct the SOAP client --------------------
$client = new SoapClient('https://api.thumbnail.ws/soap?wsdl');
//--- Get all websites we want screenshots for -----
include_once('data.php');
//--- Loop through all websites --------------------
foreach ($websites as $website) {
    echo "Getting screenshot for " . $website['name'] . "\n";

    try {
        $response = $client->get(array(
            "apikey"   => 'ab28d94712f7ba9c0449a01187e7655b0a7830380483',
            "url"      => $website['url'],
            "width"    => 380
        ));
        //--- Image is base64 encoded in transport. Decode it here.
        $image = base64_decode($response->image);

        //--- Save image to disk
        file_put_contents(dirname(__FILE__) . '/screenshot' . $website['id'] . '.jpg', $image);
    } catch (SoapFault $fault) {
        echo "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
    }
}