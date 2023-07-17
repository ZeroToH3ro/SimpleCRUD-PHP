<?php
require __DIR__ . '/users/users.php';
try {
    $users = getUsers();
} catch (JsonException $e) {
    echo $e;
}
include './partials/header.php'
?>

<div class="container">
    <p>
        <a class="btn btn-outline-success" href="create.php">Create New User</a>
    </p>
    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
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
                <td>
                    <?php if(isset($user['extension'])): ?>
                        <img style="width: 60px" src="<?php echo "users/images/{$user['id']}.{$user['extension']}" ?>" alt="avatar">
                    <?php endif; ?>
                </td>
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
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include './partials/footer.php' ?>