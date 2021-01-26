<?php
// Generators
// https://www.php.net/manual/en/language.generators.php

// yield keyword
// https://www.php.net/manual/en/language.generators.syntax.php#control-structures.yield

function fizzbuzz($start, $end)
{
  $current = $start;
  while ($current <= $end) {
    if ($current%3 == 0 && $current%5 == 0) {
      yield "fizzbuzz";
    } else if ($current%3 == 0) {
      yield "fizz";
    } else if ($current%5 == 0) {
      yield "buzz";
    } else {
      yield $current;
    }
    $current++;
  }
}

// var_dump(iterator_to_array(fizzbuzz(1,20), true));

foreach(fizzbuzz(1,20) as $number) {
  echo $number.'<br />';
}


?>
