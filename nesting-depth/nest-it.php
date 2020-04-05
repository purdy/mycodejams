<?php

$number_test_cases = trim(fgets(STDIN));
for ($i = 1; $i <= $number_test_cases; $i++) {
  $number_str = trim(fgets(STDIN));
  $numbers = str_split($number_str);
  $big_nest = [];
  foreach ($numbers as $number) {
    for ($d = 0; $d < $number; $d++) {
      $big_nest[] = '(';
    }
    $big_nest[] = $number;
    for ($d = 0; $d < $number; $d++) {
      $big_nest[] = ')';
    }
  }
  $bigness = implode('', $big_nest);
  while (strpos($bigness, ')(') !== FALSE) {
    $bigness = str_replace(')(', '', $bigness);
  }
  echo "Case #$i: $bigness\n";
}
