<?php
require __DIR__ . '/users/users.php';
include 'partials/header.php';

if(!isset($_GET['id'])){
    include 'partials/not_found.php';
    exit();
}

$userId = $_GET['id'];
$user = getUserById($userId);

if(!$user){
    include 'partials/not_found.php';
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try {
        $user = updateUser($_POST, $userId);
        uploadImage($_FILES['picture'], $user);
    } catch (JsonException $e) {
        echo $e;
    }
    header('Location: index.php');
}
?>

<?php include './_form.php' ?>

<?php include './partials/footer.php' ?>