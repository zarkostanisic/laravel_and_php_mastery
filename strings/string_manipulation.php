<?php

$str = "Hello, World!";

echo $str[0]; // H  
echo $str[-1]; // !

echo substr($str, 0, 5); // Hello
echo substr($str, 5); // , World!

echo strtoupper($str); // HELLO, WORLD!
echo strtolower($str); // hello, world!
echo ucfirst($str); // Hello, World!

$greeting = "Hello, " . "World";
$greeting .= " How are you?";

echo $greeting;