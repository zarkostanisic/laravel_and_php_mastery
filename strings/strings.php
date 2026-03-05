<?php

$name = "John Doe";
echo 'Hello, $name!\n'; // Output: Hello, $name!
echo "Hello, $name!\n"; // Output: Hello, John Doe!

$heredoc = <<<EOD
Multi-line string
with variable $name
EOD;

$nowdoc = <<<'EOD'
Multi-line string
with variable $name
EOD;

echo $heredoc; // Output: Multi-line string with variable John Doe
echo $nowdoc; // Output: Multi-line string with variable $name