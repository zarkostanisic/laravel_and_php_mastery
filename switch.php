<?php

$size = "L";

switch ($size) {
    case "S":
    case 'M':
        echo "Small or Medium size\n";
        break;
    case "L":
    case 'XL':
        echo "Large or Extra Large size\n";
        break;
    
    default:
        echo "Unknown size";
        break;
}

echo "\n\n--- Using if statement ---\n";

if ($size === "S" || $size === "M") {
    echo "Small or Medium size\n";
} elseif ($size === "L" || $size === "XL") {
    echo "Large or Extra Large size\n";
} else {
    echo "Unknown size";
}

$badAttempts = 3;

switch ($badAttempts) {
    case 3:
        echo "You are blocked!\n";
    case 2:
    case 1:
        echo "Bad attempt detect!\n";
}