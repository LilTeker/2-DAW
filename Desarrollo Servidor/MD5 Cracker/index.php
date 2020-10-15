<!DOCTYPE html>
<html lang="en">
<head><title>Miguel Robles MD5 Cracker</title></head>
<body>
<h1>Miguel Robles - MD5 cracker</h1>
<p>This application takes an MD5 hash
    of a four-character int and
    attempts to hash all combinations
    to determine the original characters.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if (isset($_GET['md5'])) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // Counter for the example output
    $show = 15;

    // Outer loop go the 1st number
    for ($i = 0; $i < 10; $i++) {
        $ch1 = $i;   // The first of two characters

        for ($j = 0; $j < 10; $j++) {
            $ch2 = $j;  // Our second character

            for ($k = 0; $k < 10; $k++) {
                $ch3 = $k;

                for ($h = 0; $h < 10; $h++) {
                    $ch4 = $h;
                    // Concatenate the numbers together to
                    // form the "possible" pre-hash text
                    $try = $ch1 . $ch2 . $ch3 .$ch4;

                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ($check == $md5) {
                        $goodtext = $try;
                        break;   // Exit the inner loop
                    }

                    // Debug output until $show hits 0
                    if ($show > 0) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }

            }
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post - $time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form method="get">
    <input type="text" name="md5" size="60"/>
    <input type="submit" value="Crack MD5"/>
</form>
<ul>
    <li><a href="indexpafijarme.php">Reset</a></li>
</body>
</html>