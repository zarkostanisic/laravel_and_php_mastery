<?php

function greet(string $name, string $greeting = "Hello", bool $shout = false): string {

    $message = "$greeting, $name!";
    
    return $shout ? strtoupper($message) : $message;
}

echo greet("Alice") . "\n";
echo greet("Alice", "Hi", true) . "\n";

echo greet(greeting: "Goodbye", name: "David", shout: false);