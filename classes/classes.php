<?php

class Person {
    // public string $name;
    // public int $age;

    public function __construct(public string $name, public int $age) {
        // $this->name = $name;
        // $this->age = $age;
    }

    public function introduce(): string {
        return "Hi, I'm {$this->name} and I'm {$this->age} years old.";
    }
}

$person = new Person("Zack", 25);

// $person->name = "John Doe";
// $person->age = 30;

$person2 = new Person("Anna", 37);

var_dump($person->introduce());
var_dump($person2->introduce());