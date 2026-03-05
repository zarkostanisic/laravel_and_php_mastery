<?php

$numbers = [1, 2, 3, 4, 5];
$multiplier = 3;

$squaredArrow = array_map(function ($n) use ($multiplier) {
    return $n * $multiplier;
}, $numbers);

$squaredArrow2 = array_map(
    fn($n) => $n * $multiplier, 
    $numbers
);

var_dump($numbers, $squaredArrow, $squaredArrow2);