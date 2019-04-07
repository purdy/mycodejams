<?php

$letters = [
  'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
  'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
];
$number_test_cases = trim(fgets(STDIN));
for($i=1; $i<=$number_test_cases; $i++) {
  list($max_product, $num_values) = explode(' ', trim(fgets(STDIN)));
  $values = explode(' ', trim(fgets(STDIN)));
  for ($j=2; $j<=$max_product; $j++) {
    if ($values[0] % $j == 0) {
      // Found it!
      $first_prime = $values[0]/$j;
      $second_prime = $j;
      break;
    }
  }
  // Now let's figure out the order by looking at the next value.
  if ($values[1] % $first_prime == 0) {
    $primes = [$second_prime, $first_prime, $values[1]/$first_prime];
  }
  else {
    $primes = [$first_prime, $second_prime, $values[1]/$second_prime];
  }
  // Now we just walk the chain to get the rest of the primes.
  for ($j=2; $j<$num_values; $j++) {
    $primes[] = $values[$j]/$primes[$j];
  }
  // echo "Primes:\n"; print_r($primes);
  // Now we just need to sort, assign letters and then map back to original primes.
  $prime_letters = array_unique($primes, SORT_NUMERIC);
  sort($prime_letters);
  print_r($prime_letters);
  $code_map = array_combine($prime_letters, $letters);
  // print_r($code_map);
  $decoded = [];
  foreach ($primes as $prime) {
    $decoded[] = $code_map[$prime];
  }
  echo "Case #$i: " . implode('', $decoded) . "\n";
}
