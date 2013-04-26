<?php

$handle = fopen( $argv[1], 'r' );
$number_cases = trim( fgets( $handle ) );
for( $i=1; $i<=$number_cases; $i++ ) {
}
fclose( $handle );
