<?php

$simpleArray = [1, 2, 3, 4, 5];
$associativeArray = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];

echo $simpleArray[0] . "\n"; // Outputs 1
echo $associativeArray["name"] . "\n"; // Outputs John

$simpleArray[] = 6; // Adds 6 to the end of the array
$associativeArray["country"] = "USA"; // Adds a new key-value pair  

$matrix = [
    [1, 2, 3],
    [4, 5, 6]
];

echo $matrix[1][1] . "\n"; // Outputs 5

$fruits = ["apple", "banana", "orange"];

var_dump(count($fruits)); // Outputs 3
rsort($fruits); // Sorts the array in ascending order
var_dump($fruits); // Outputs sorted array

var_dump(asort($associativeArray)); // Outputs the keys of the associative array
asort($associativeArray); // Sorts the associative array by values
var_dump($associativeArray); // Outputs sorted associative array
ksort($associativeArray); // Sorts the associative array by values
var_dump($associativeArray); // Outputs sorted associative array

$numbers = range(1, 5);
var_dump($numbers); // Outputs [1, 2, 3, 4, 5]

$squared = array_map(fn($n) => $n * $n, $numbers);
var_dump($squared); // Outputs [1, 4, 9, 16, 25]

$evenNumbers = array_filter($numbers, fn($n) => $n % 2 === 0);
var_dump($evenNumbers); // Outputs [2, 4]

$sum = array_reduce(
    $numbers, 
    fn($carry, $n) => $carry + $n, 
    0
);

var_dump($sum); // Outputs 15

$moreNumbers = [0, ...$numbers, 6];
var_dump($moreNumbers); // Outputs [0, 1, 2, 3, 4, 5, 6]

[$first, , $second] = $fruits;
var_dump($first, $second); // Outputs "orange", "banana"  

$set1 = [1, 2, 3, 4, 5];
$set2 = [3, 4, 5, 6, 7];

var_dump(
    array_intersect($set1, $set2),
    array_intersect($set2, $set1),
    array_diff($set1, $set2),
    array_diff($set2, $set1)
);

// $keys = array_keys($associativeArray);
$keys = array_map(fn($key) => ucfirst($key), array_keys($associativeArray));
$values = array_values($associativeArray);

var_dump($keys, $values); // Outputs keys and values of the associative array

var_dump(
    array_key_exists("name", $associativeArray),
    in_array('John', $values)
);

$fruitString = implode(", ", $fruits);
$backToArray = explode(", ", $fruitString);
var_dump(
    $fruitString,
    $backToArray
); // Outputs "orange, banana, apple"

var_dump(
    array_merge($set1, $set2),
    array_unique(array_merge($set1, $set2)),
    array_slice($set1, 1, 3),
    // $associativeArray,
    // array_merge($associativeArray, ["country" => "DE"]),
    // $set1 + $set2,
    // $associativeArray + ["country" => "GB"],
    // [...$set1, ...$set2],
    // [...$associativeArray, ...["country" => "GB"]]

);


var_dump(
    array_search("banana", $fruits)
);