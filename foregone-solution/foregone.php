<?php

$number_test_cases = trim(fgets(STDIN));
for($i=1; $i<=$number_test_cases; $i++) {
  $test_case = trim(fgets(STDIN));
  $nums = _get_nums($test_case);
  echo "Case #$i: " . implode(' ', $nums) . "\n";
}

function _get_nums($has_four) {
  $nums = [];
  $digits = str_split($has_four);
  $other_digits = [];
  $max_digits = strlen($has_four);
  for ($i=0; $i<$max_digits; $i++) {
    $other_num = 0;
    if ($digits[$i] == 4) {
      $other_num = 1;
      $digits[$i] = 3;
    }
    $other_digits[$i] = $other_num;
  }
  $nums = [
    (int)implode('', $digits),
    (int)implode('', $other_digits),
  ];
  return $nums;
}
