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
    'name' => 'The username is mandatory',


];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $phone = $_POST['phone'];


//        $user = createUser($_POST);
    } catch (JsonException $e) {
        var_dump($e);
    }

    if(isset($_FILES['picture'])){
        try {
            uploadImage($_FILES['picture'], $user);
        } catch (JsonException $e) {
            var_dump($e);
        }
    }
    header('Location: index.php');

}

?>

<?php include './partials/_form.php' ?>

<?php include './partials/footer.php' ?>