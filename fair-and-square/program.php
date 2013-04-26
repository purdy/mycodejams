<?php

// print next_palindrome( 555 ); exit;

$handle = fopen( $argv[1], 'r' );
$number_cases = trim( fgets( $handle ) );
for( $i=1; $i<=$number_cases; $i++ ) {
  list( $start, $end ) = split( ' ', trim( fgets( $handle ) ) );
  $count = 0;
  if ( ! is_palindrome( $start ) ) {
    $start = next_palindrome( $start );
  }

  while( $start <= $end ) {
    $root = sqrt( $start );
    // print "Checking root of palindrome $start ($root)\n";
    if ( (int) $root == $root && is_palindrome( $root ) ) {
      $count++;
    }
    $start = next_palindrome( $start );
  }
  // for( $t=$start; $t<=$end; $t++ ) {
  //   if ( is_palindrome( $t ) ) {
  //     $root = sqrt( $t );
  //     // print "Testing root = $root\n";
  //     // print_r( $root ); 
  //     if ( (int) $root == $root && is_palindrome( $root ) ) {
  //       // print "Got a fair & square #!\n";
  //       $count++;
  //     }
  //   }
  // }
  echo "Case #$i: $count\n";
}
fclose( $handle );

function is_palindrome( $number ) {
  $is_palindrome = FALSE;
  $reverse = strrev( $number );
  if ( $number == $reverse ) {
    $is_palindrome = TRUE;
  }
  // print "Test: $number == $reverse ?\n";
  return $is_palindrome;
}

function next_palindrome( $number ) {
  $next = 0;
  if ( $number < 9 ) {
    $next = $number+1;
  }
  else if ( $number == 9 ) {
    $next = 11;
  }
  else {
    $str = (string) $number;
    $strlen = strlen( $str );
    $is_even = FALSE;
    if ( $strlen % 2 == 0 ) {
      $is_even = TRUE;
    }
    $first_half = substr( $str, 0, ceil( $strlen/2 ) );

    if ( $is_even ) {
      $next = $first_half . strrev( $first_half );
      $next = (int) $next;
      if ( $next <= $number ) {
        $precision = -1 * ( $strlen-1 );
        $rounded_up = $first_half+1 . str_repeat( '0', $strlen/2 );
        $next = next_palindrome( (int) $rounded_up );
      }
    }
    else {
      $second_half = strrev( substr( $first_half, 0, floor( $strlen/2 ) ) );
      // print "First half = $first_half / Second half = $second_half\n";
      $next = $first_half . $second_half;
      $next = (int) $next;
      if ( $next <= $number ) {
        $rounded_up = $first_half+1 . str_repeat( '0', floor( $strlen/2 ) );

        $next = next_palindrome( (int) $rounded_up );
      }
    }
  }

  // if ( $number < 9 ) {
  //   $next = $number+1;
  // }
  // else if ( $number == 9 ) {
  //   $next = 11;
  // }
  // else {
  //   $str = (string) $number;
  //   $strlen = strlen( $str );
  //   $is_even = FALSE;
  //   if ( $strlen % 2 == 0 ) {
  //     $is_even = TRUE;
  //   }
  //   $first_half = substr( $str, 0, ceil( $strlen/2 ) );
  //   if ( $is_even ) {
  //     $second_half = strrev( $first_half );
  //   }
  //   else {
  //     $second_half = strrev( substr( $first_half, -1 ) );
  //   }
  //   // print "number = $number / second half = $second_half\n";
  //   $next = $first_half . $second_half;
  //   $next = (int) $next;
  //   if ( $next <= $number ) {
  //     $first_half++;
  //     if ( $is_even ) {
  //       $second_half = strrev( $first_half );
  //     }
  //     else {
  //       $second_half = strrev( substr( $str, 0, floor( $strlen/2 ) ) );
  //     }
  //     $next = $first_half . $second_half;
  //     $next = (int) $next;
  //   }
  // }
  // print "returning next palindrome for $number = $next\n";
  return $next;
}