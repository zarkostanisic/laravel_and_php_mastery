<?php

$mb_string = "こんにちは";

var_dump(strlen($mb_string)); // Outputs byte length
var_dump(mb_strlen($mb_string)); // Outputs character length

$url = "https://www.example.com/path?key=value&special=@#$%";
var_dump(urlencode($url));  // Encodes special characters for URL
var_dump(urldecode(urlencode($url))); // Decodes the URL back to original

$html = '<p>This is "quoted" text & a <a href="#">link</a>.</p>';
var_dump(htmlspecialchars($html)); // Converts special characters to HTML entities

var_dump(base64_encode("Hello World!")); // Encodes string to Base64
var_dump(base64_decode(base64_encode("Hello World!"))); // Decodes Base64 back to original