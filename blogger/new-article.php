<?php

require 'includes/database.php';

$errors = [];
$title = '';
$content = '';
$published_date = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_date = $_POST['published_date'];

    if ($title == '') {
        $errors[] = 'Title is required';
    }
    if ($content == '') {
        $errors[] = 'Content is required';
    }

    if ($published_date == '') {
        $errors[] = 'Date is required';
    }


    if (empty($errors)) {

        $conn = getDB();

        $sql = "INSERT INTO article (title, content, published_date) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {

            echo mysqli_error($conn);
        } else {

            mysqli_stmt_bind_param($stmt, "sss", $_POST['title'], $_POST['content'], $_POST['published_at']);

            if (mysqli_stmt_execute($stmt)) {

                $id = mysqli_insert_id($conn);
                echo "Inserted record with ID: $id";
            } else {

                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>


<?php require 'includes/header.php'; ?>
<h2>New article</h2>

<?php if (!empty($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">


    <div>
        <label for="title">Title</label>
        <input value="<?= htmlspecialchars($title); ?>" autocomplete="off" name="title" id="title" placeholder="Article title">
    </div>

    <div>
        <label for="content">Content</label>
        <textarea name="content" autocomplete="off" rows="4" cols="40" id="content" placeholder="Article content"><?= htmlspecialchars($content); ?></textarea>
    </div>

    <div>
        <label for="published_date">Publication date</label>
        <input value="<?= htmlspecialchars($published_date); ?>" type="date" name="published_date" id="published_date">
    </div>

    <button>Add</button>

</form>


</div>
<?php require 'includes/footer.php'; ?>