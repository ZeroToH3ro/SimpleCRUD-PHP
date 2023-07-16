<?php
require 'users.php';
$users = getUsers();
include 'partials/header.php'
?>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Website</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td> <?php echo $user['name'] ?> </td>
                <td> <?php echo $user['username'] ?> </td>
                <td> <?php echo $user['email'] ?> </td>
                <td>
                    <a target="_blank" href="https://<?php echo $user['website'] ?>"> <?php echo $user['website'] ?> </a>
                </td>
                <td> <?php echo $user['phone'] ?> </td>
                <td>
                    <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                    <a href="delete.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php' ?>