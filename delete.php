<?php
require __DIR__ . '/users/users.php';

if(!isset($_POST['id'])){
    include 'partials/not_found.php';
    exit();
}

$userId = $_POST['id'];

try {
    deleteUser($userId);
} catch (JsonException $e) {
    var_dump($e);
}

header('Location: index.php');
