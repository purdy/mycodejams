<?php

$number_cases = trim(fgets(STDIN));
for ($t=1; $t<=$number_cases; $t++) {
  $test_case = trim(fgets(STDIN));
  // echo "TC: $test_case\n";
  $card = '';
  list($rows, $columns) = explode(' ', $test_case);
  // echo "Rows: $rows, Columns: $columns\n";
  for ($r=0; $r<$rows; $r++) {
    $card .= generateRow($r, $columns);
  }
  $card .= generateBorder($rows, $columns);
  echo "Case #$t:\n" . $card . "\n";
}

function generateRow($row_num, $columns) {
  $row = '';
  $row .= generateBorder($row_num, $columns) . "\n";
  $row .= generatePunches($row_num, $columns) . "\n";
  return $row;
}

function generateBorder($row_num, $columns) {
  $border = '';
  $max = ($columns * 2) + 1;
  // echo "Max: $max\n";
  for ($i=0; $i<$max; $i++) {
    if ($row_num == 0 && $i <= 1) {
      $border .= '.';
    }
    elseif ($i % 2 == 0) {
      $border .= '+';
    }
    else {
      $border .= '-';
    }
  }
  return $border;
}

function generatePunches($row_num, $columns) {
  $punches = '';
  $max = ($columns * 2) + 1;
  for ($i=0; $i<$max; $i++) {
    if ($row_num == 0 && $i == 0) {
      $punches .= '.';
    }
    elseif ($i % 2 == 0) {
      $punches .= '|';
    }
    else {
      $punches .= '.';
    }
  }
  return $punches;
}

?>
