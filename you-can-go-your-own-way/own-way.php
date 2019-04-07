<?php

$number_test_cases = trim(fgets(STDIN));
for($i=1; $i<=$number_test_cases; $i++) {
  $grid_size = trim(fgets(STDIN));
  $lydias_path = trim(fgets(STDIN));
  $my_way = _own_way($lydias_path);
  echo "Case #$i: $my_way\n";
}

function _own_way($lydias_way) {
  $my_steps = [];
  $lydias_steps = str_split($lydias_way);
  foreach ($lydias_steps as $step) {
    if ($step == 'S') {
      $my_steps[] = 'E';
    }
    else {
      $my_steps[] = 'S';
    }
  }
  return implode('', $my_steps);
}
