<?php
require 'includes/database.php';
require 'includes/article.php';
require 'includes/url.php';

$title = '';
$content = '';
$published_date = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_date = $_POST['published_date'];
    $errors = validateArticle($title, $content, $published_date);

    if (empty($errors)) {

        $conn = getDB();

        $sql = "INSERT INTO article (title, content, published_date) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {

            echo mysqli_error($conn);
        } else {

            mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_date);
            if (mysqli_stmt_execute($stmt)) {

                $id = mysqli_insert_id($conn);

                if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                    $protocol = 'https';
                } else {
                    $protocol = 'http';
                }

                redirect("$id");

                exit;
            } else {

                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>



<?php require 'includes/header.php'; ?>

<h2>New article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>