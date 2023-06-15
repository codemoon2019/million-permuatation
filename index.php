<?php

function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

function findMillionthPermutation($digits) {
    $n = count($digits);
    $permutation = '';
    $k = 1000000 - 1; // Adjusting for zero-based indexing

    sort($digits); // Ensure the digits are in ascending order

    while ($n > 0) {
        $f = factorial($n - 1);
        $index = (int) ($k / $f);
        $permutation .= $digits[$index];
        array_splice($digits, $index, 1);
        $k %= $f;
        $n--;
    }

    return $permutation;
}

$digits = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
$millionthPermutation = findMillionthPermutation($digits);

echo "The millionth lexicographic permutation is: " . $millionthPermutation;

?>