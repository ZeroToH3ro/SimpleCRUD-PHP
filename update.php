<?php
require __DIR__.'/users.php';
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
    updateUser($_POST, $userId);
    header('Location: index.php');
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update User: <?php echo $user['name'] ?> </h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $user['name'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $user['email'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="website">Website</label>
                    <input name="website" value="<?php echo $user['website'] ?>" class="form-control">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include 'partials/footer.php' ?>