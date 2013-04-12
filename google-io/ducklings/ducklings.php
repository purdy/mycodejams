<?php

$handle = fopen( $argv[1], 'r' );
$number_test_cases = trim( fgets( $handle ) );
for ( $i=1; $i<=$number_test_cases; $i++ ) {
  $parameters = explode( ' ', trim( fgets( $handle ) ) );
  $result = repeats( $parameters[0], $parameters[1] );
  print "Case #" . $i . ": " . $result . "\n";
}
fclose( $handle );

function repeats ( $s, $string) {
  $numbers = array();
  $chopping_string = $string;
  while( $chopping_string ) {
    $duck_num = substr( $chopping_string, 0, $s );
    if ( ! isset( $numbers[$duck_num] ) ) {
      $numbers[$duck_num] = 1;
    } else {
      $numbers[$duck_num]++;
    }
    $chopping_string = substr( $chopping_string, 1 );
  }
//   print_r( $numbers );
  $dupes = array();
  foreach ( $numbers as $duck_num => $dupe_num ) {
    if ( $dupe_num > 1 ) {
      $dupes[] = $duck_num+0;
    }
  }
  $repeats = 'NONE';
  if ( sizeof($dupes) ) {
    sort( $dupes, SORT_NUMERIC );
    $repeats =implode( ' ', $dupes );
  }
  return $repeats;
}