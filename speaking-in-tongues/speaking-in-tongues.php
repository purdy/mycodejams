<?php

$mappings = load_mappings();
// print_r( $mappings );
// print( "We have " . sizeof( $mappings ) . " maps from the examples.\n" );

// missing q and z on the left
// missing q and z on the right
// problem states different letters, so we know ! q => q
$mappings['q'] = 'z';
$mappings['z'] = 'q';

// need to fopen the input
$handle = fopen( $argv[1], 'r' );
$number_test_cases = trim( fgets( $handle ) );
for( $i=1; $i<=$number_test_cases; $i++ ) {
  $test_case = trim( fgets( $handle ) );
  $test_case_letters = str_split( $test_case );
  $reversed_string = '';
  foreach( $test_case_letters as $letter ) {
    $reversed_string .= $mappings[$letter];
  }
//   $case_num = $i+1;
  print( "Case #$i: " . $reversed_string . "\n" );
}
fclose( $handle );

function load_mappings() {
  $mappings = array();
  $test_cases = array(
    array(
      'input' => 'ejp mysljylc kd kxveddknmc re jsicpdrysi',
      'output' => 'our language is impossible to understand',
    ),
    array(
      'input' => 'rbcpc ypc rtcsra dkh wyfrepkym veddknkmkrkcd',
      'output' => 'there are twenty six factorial possibilities',
    ),
    array(
      'input' => 'de kr kd eoya kw aej tysr re ujdr lkgc jv',
      'output' => 'so it is okay if you want to just give up',
    ),
  );
  foreach ( $test_cases as $test_case ) {
    $letters = str_split( $test_case['input'] );
    $mapped_letters = str_split( $test_case['output'] );
    for( $i=0; $i<sizeof($letters); $i++ ) {
      if ( ! isset( $mappings[$letters[$i]] ) ) {
        $mappings[$letters[$i]] = $mapped_letters[$i];
      }
    }
  }
  return $mappings;
}

/* End of speaking-in-tongues.php */