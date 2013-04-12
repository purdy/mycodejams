<?php

$handle = fopen( $argv[1], 'r' );
$number_test_cases = trim( fgets( $handle ) );
for ( $i=1; $i<=$number_test_cases; $i++ ) {
  $parameters = explode( ' ', trim( fgets( $handle ) ) );
  $l = array_shift( $parameters );
  $m = array_shift( $parameters );
  $result = number_boxes( $l, $m, $parameters );
  print "Case #" . $i . ": " . $result . "\n";
}
fclose( $handle );

function number_boxes( $l, $m, $ks ) {
  $number_boxes = -1;
  // easy solution if any of $ks is > $l, then return -1
  $mins = array();
  $total = $l * $m;
  foreach ( $ks as $k ) {
    if ( $k > $l ) {
      return $number_boxes;
    }
    // now it gets harder...
    $mins[] = $total - $l + $k;
  }
  return max($mins);
}