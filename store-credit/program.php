<?php

$handle = fopen( $argv[1], 'r' );
$number_cases = trim( fgets( $handle ) );
for( $i=1; $i<=$number_cases; $i++ ) {
  $credit = trim( fgets( $handle ) );
  $num_items = trim( fgets( $handle ) );
  $price_line = trim( fgets( $handle ) );
  $prices = split( ' ', $price_line );
  // $r = root
  for( $r=1; $r<=$num_items; $r++ ) {
    $r1_cost = $prices[$r-1];
    for ( $t=1; $t<=$num_items; $t++ ) {
      if ( $t != $r ) {
        $t2_cost = $prices[$t-1];
        if ( $r1_cost + $t2_cost == $credit ) {
          echo "Case #$i: $r $t\n";
          break 2;
        }
      }
    }
  }
}
fclose( $handle );