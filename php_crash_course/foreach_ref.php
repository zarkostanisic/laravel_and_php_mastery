<?php

$largeArray = range(1, 1_000_000);

$startTime = microtime(true);
$startMem = memory_get_usage();

$out = [];

foreach ($largeArray as /*&*/$value) {
    $value = $value * 2;

    $out[] = $value;
}

$endTime = microtime(true);
$endMem = memory_get_usage();

echo "Time: " . ($endTime - $startTime) . " seconds\n";
echo "Memory: " . round(($endMem - $startMem) /1024 /1024, 2) . " MB\n";