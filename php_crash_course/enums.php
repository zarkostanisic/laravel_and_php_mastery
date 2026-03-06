<?php

enum DaysOfWeek {
    case MONDAY;
    case TUESDAY;
    case WEDNESDAY;
    case THURSDAY;
    case FRIDAY;
    case SATURDAY;
    case SUNDAY;
}

$today = DaysOfWeek::WEDNESDAY;

if($today === DaysOfWeek::WEDNESDAY) {
    echo "It is Wed!";
} else {
    echo "It's not Wednesday.";
}

enum Colours: string {
    case RED = 'red';
    case GREEN = 'green';
    case BLUE = 'blue';
}

echo Colours::RED->value; // Output: red

function isWeekend(DaysOfWeek $day): bool {
    return $day === DaysOfWeek::SATURDAY || $day === DaysOfWeek::SUNDAY;
}

echo isWeekend(DaysOfWeek::SATURDAY) ? "Yes" : "No"; // Output: It's the weekend!