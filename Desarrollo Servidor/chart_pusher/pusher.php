<?php
// First, run 'composer require pusher/pusher-php-server'

require __DIR__ . '/vendor/autoload.php';

$pusher = new Pusher\Pusher(
  "bc05d0c5b10f5a15a659",    // Replace with 'key' from dashboard
  "93e2f7d14b100ecc7633", // Replace with 'secret' from dashboard
  "1169258",     // Replace with 'app_id' from dashboard
  array(
    'cluster' => 'eu' // Replace with 'cluster' from dashboard
  )
);

// Trigger a new random event every second. In your application,
// you should trigger the event based on real-world changes!
while (true) {
  $pusher->trigger('price-btcusd', 'new-price', array(
    'value' => rand(0, 5000)
  ));
  sleep(1);
}