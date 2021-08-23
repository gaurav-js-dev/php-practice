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
        $error = 'Login Incorrect UserName or Password';
    }
}

?>

<?php require('includes/header.php'); ?>

<h2>Login</h2>

<?php if (!empty($error)) :  ?>
    <p><?= $error; ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <button>Login</button>
</form>

<?php require('includes/footer.php'); ?>