<?php

declare(strict_types=1);

function sum(int ...$numbers): int {
    $sum = 0;

    foreach ($numbers as $number) {
        $sum += $number;
    }

    return $sum;
}

$numbers = [4, 5, 6];

var_dump(sum());
var_dump(sum(5));
var_dump(sum(1, 2 , 3));
var_dump(sum(...$numbers));

function introduceTeam(string $teamName, string ...$members): void {
   echo "Team $teamName:\n";
   var_dump($members);
   echo "Members: " . implode(", ", $members) . "\n";
}

echo introduceTeam("A Team", "John", "Mr T");

$members = ["Harry", "Johhny", "Joe"];
echo introduceTeam("C Team", "John", "MrT", ...$members);


