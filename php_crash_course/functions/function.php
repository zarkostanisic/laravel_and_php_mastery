<?php

function greet($name) {
    return "Hello, $name!\n";
}

echo greet("Alice");

function greetWithName($name, $time = "day") {
    return "Good $time, $name!\n";
}

echo greetWithName("Bob");
echo greetWithName("Charlie", "evening");