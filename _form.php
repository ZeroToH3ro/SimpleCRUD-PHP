<div class="container">
    <div class="card">
        <div class="card-header">
            <?php if ($user['id']): ?>
                <h3>Update User: <?php echo $user['name'] ?> </h3>
            <?php else: ?>
                <h3> Create A New User </h3>
            <?php endif; ?>

        </div>
        <div class="card-body">

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $user['name'] ?>"
                           class="form-control <?php echo $errors['name'] ? 'is-invalid' : ' ' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['name'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>"
                           class="form-control <?php echo $errors['username'] ? 'is-invalid' : ' ' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['username'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $user['email'] ?>"
                           class="form-control <?php echo $errors['email'] ? 'is-invalid' : ' ' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['email'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="<?php echo $user['phone'] ?>"
                           class="form-control <?php echo $errors['phone'] ? 'is-invalid' : ' ' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['phone'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" name="website" value="<?php echo $user['website'] ?>"
                           class="form-control <?php echo $errors['website'] ? 'is-invalid' : ' ' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['website'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>