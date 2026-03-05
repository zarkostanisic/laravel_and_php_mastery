<?php

// function countDown(int $start): array {
//     $result = [];
//     for ($i = $start; $i >= 0; $i--) {
//         echo "Generating number...\n";
//         $result[] = random_int(0, 100);
//     }
//     return $result;
// }

function countDown(int $start): Generator {
    for ($i = $start; $i >= 0; $i--) {
        echo "Generating number...\n";
        yield random_int(0, 100);
    }
}

foreach (countDown(1000000000) as $number) {
    echo "Echoing number: $number\n";
}