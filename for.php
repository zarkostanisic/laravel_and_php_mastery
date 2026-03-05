<?php

echo "Rocket launch countdown:\n";

for ($i=10; $i > 0; $i--) {

    if ($i == 1) {
        echo "Liftoff!\n";
    }else {
        echo $i . "\n";
    }

    sleep(1);
}