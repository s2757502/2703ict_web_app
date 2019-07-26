<?php
/* 
 * factors($n) returns an array of prime factors of valid integer $n. 
 * Precondition: 2 <= n <= MAHP_MAX_INT = 2^31-1.
 * Note that it is executed for its _value_ not for its _effect_.
 */
define("FILE","messages.txt");

/* Appends entry to FILE. */
function writeEntry($factorials) {
  $fp = fopen(FILE, "a");
  fwrite($fp, "$factorials\n");
  fclose($fp);
}

/*
 * Shows entries in FILE
 * PHP blocks are not interpreted on the server, 
 * and HTML and JavaScript elements are not interpreted on the client.
 */
function showEntries() {
  $fp = fopen(FILE, "r");
  while (!feof($fp)) {
    $factorials = fgets($fp, 4096);
    if (!empty($factorials) && !feof($fp)) { # should not be necessary!
      $factorials = htmlspecialchars($factorials);

      echo "<p>$factorials</p>\n";
    }
  }
  fclose($fp);
}
 
function factors($n) {
    $factors = array(); # initialise $factors to be an empty array
    $cand = 2;
    while ($n > 1 && $cand*$cand <= $n) {
        while ($n > 1 && $n % $cand == 0) {
            $factors[] = $cand; # append $cand to the array $factors
            $n = $n / $cand;
        }
        $cand++;
    }
    if ($n > 1) {
        $factors[] = $n; # append $n to the array $factors
    }
    return $factors;
}
?>
