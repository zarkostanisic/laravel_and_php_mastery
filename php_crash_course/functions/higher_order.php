<?php

$users = [   
    ['id' => 1, 'name' => 'John Doe', 'role' => 'admin'],
    ['id' => 2, 'name' => 'Jane Smith', 'role' => 'user'],
    ['id' => 3, 'name' => 'Bob Johnson', 'role' => 'user']
];

function createFilter($key, $value) {
    return fn($item) => $item[$key] === $value;
}

$isAdmin = createFilter('role', 'admin');
$admins = array_filter($users, $isAdmin);

$isBob = createFilter('name', 'Bob Johnson');
$bob = array_filter($users, $isBob);

var_dump($admins, $bob);