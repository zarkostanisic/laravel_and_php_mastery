<?php

$superhero = "Superman";

// function revealIdentity($superhero) {
//     echo "$superhero real name is Clark Kent.\n";
// }

function revealIdentity() {
    global $superhero;

    $superhero = "Spiderman";

    echo "$superhero real name is Clark Kent.\n";
}

echo $superhero;

revealIdentity($superhero);

function countVisitors() {
    static $visitorsCount = 0;
    $visitorsCount++;
    echo "Visitor #$visitorsCount has arrived\n";
}

countVisitors();
countVisitors();
countVisitors();

// function getDb(){
//     static $db;

//     if ($db === null) {
//         $db = connect()
//     }

//     return $db;
// }