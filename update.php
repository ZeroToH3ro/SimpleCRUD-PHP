<?php
require __DIR__ . '/users/users.php';
include 'partials/header.php';

if(!isset($_GET['id'])){
    include 'partials/not_found.php';
    exit();
}

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];

$userId = $_GET['id'];
$user = getUserById($userId);

if(!$user){
    include 'partials/not_found.php';
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try {
        $user = array_merge($user, $_POST);
        $isValid = validateUser($user, $errors);
        if($isValid){
            $user = updateUser($_POST, $userId);
            uploadImage($_FILES['picture'], $user);
            header('Location: index.php');
        }
    } catch (JsonException $e) {
        echo $e;
    }
}

include './_form.php';
include './partials/footer.php';

