<?php

$number_test_cases = trim(fgets(STDIN));
for ($i = 1; $i <= $number_test_cases; $i++) {
  $matrix_size = trim(fgets(STDIN));
  $trace = $row_repeat = $col_repeat = 0;
  $cols = [];
  for ($j = 0; $j < $matrix_size; $j++) {
    $row = explode(' ', trim(fgets(STDIN)));
    $trace += $row[$j];
    $unique = array_unique($row, SORT_NUMERIC);
    $row_count = count($row);
    if (count($unique) != $row_count) {
      $row_repeat++;
    }
    for ($c = 0; $c < $row_count; $c++) {
      $cols[$c][] = $row[$c];
    }
  }
  // print_r($cols);
  foreach ($cols as $col) {
    $unique = array_unique($col, SORT_NUMERIC);
    if (count($unique) != count($col)) {
      $col_repeat++;
    }
  }
  echo "Case #$i: $trace $row_repeat $col_repeat\n";
}

