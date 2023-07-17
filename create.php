<?php
require __DIR__ . '/users/users.php';
include 'partials/header.php';

$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => ''
];

$errors = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $user = array_merge($user, $_POST);
        $isValid = validateUser($user, $errors);

        if ($isValid) {
            $user = createUser($_POST);
            uploadImage($_FILES['picture'], $user);
            header('Location: index.php');
        }
    } catch (JsonException $e) {
        var_dump($e);
    }
}
include './_form.php';
include './partials/footer.php';

