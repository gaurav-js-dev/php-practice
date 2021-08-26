<?php

require 'includes/init.php';

if (Auth::isLoggedIn()) {
    header("Location: admin/index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $conn = require 'includes/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {

        Auth::login();
        header("Location: admin/index.php");
    } else {
        $error = 'Incorrect Username or Password. Please try again.';
    }
}

?>

<?php require('includes/header.php'); ?>

<div class="container bg-light my-5 p-5">
    <div class="row justify-content-center">
        <div class="form-group col-md-4 col-md-offset-5 align-center ">

            <form method="post">
                <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
                <?php if (!empty($error)) :  ?>
                    <p class="text-danger"><?= $error; ?></p>
                <?php endif; ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-secondary mt-3">Login</button>
            </form>
        </div>
    </div>
</div>

<?php require('includes/footer.php'); ?>