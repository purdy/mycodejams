<?php

$handle = fopen( $argv[1], 'r' );
$number_cases = trim( fgets( $handle ) );
for( $i=1; $i<=$number_cases; $i++ ) {
  // load rows
  $rows = array();
  $has_empties = FALSE;
  for ( $r=0; $r<4; $r++ ) {
    $row_line = trim( fgets( $handle ) );
    if ( strpos( $row_line, '.' ) !== FALSE ) {
      $has_empties = TRUE;
    }
    $rows[] = str_split( $row_line );
  }
  $cols = array();
  for ( $c=0; $c<4; $c++ ) {
    $cols[] = array( $rows[0][$c], $rows[1][$c], $rows[2][$c], $rows[3][$c] );
  }
  $sets = array_merge( $rows, $cols );
  $sets[] = array( $rows[0][0], $rows[1][1], $rows[2][2], $rows[3][3] );
  $sets[] = array( $rows[0][3], $rows[1][2], $rows[2][1], $rows[3][0] );
  $winner = find_winner( $sets );
  if ( $winner ) {
    $status = "$winner won";
  }
  else {
    if ( $has_empties ) {
      $status = "Game has not completed";
    }
    else {
      $status = "Draw";
    }
  }
  echo "Case #$i: $status\n";
  fgets( $handle ); // get the empty space
}
fclose( $handle );

function find_winner( $sets ) {
  $winner = NULL;
  foreach ( $sets as $set ) {
    $counts = array( 'X' => 0, 'O' => 0, 'T' => 0, '.' => 0 );
    // print_r( $set );
    foreach ( $set as $tile ) {
      $counts[$tile]++;
    }
    if ( $counts['X'] == 4 || ( $counts['X'] == 3 && $counts['T'] == 1 ) ) {
      $winner = 'X';
      break;
    }
    else if ( $counts['O'] == 4 || ( $counts['O'] == 3 && $counts['T'] == 1 ) ) {
      $winner = 'O';
      break;
    }
  }
  return $winner;
}