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
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User: <?php echo $user['name'] ?> </h3>
        </div>
        <table class="table">
            <tbody>
            <tr>
                <th>User: </th>
                <td><?php echo $user['username'] ?></td>
            </tr>
            <tr>
                <th>Email: </th>
                <td><?php echo $user['email'] ?></td>
            </tr>
            <tr>
                <th>Phone: </th>
                <td><?php echo $user['phone'] ?></td>
            </tr>
            <tr>
                <th>Website: </th>
                <td><?php echo $user['website'] ?></td>
            </tr>
            </tbody>

        </table>
    </div>
</div>



<?php include 'partials/footer.php'; ?>