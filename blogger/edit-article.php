<?php

require 'includes/database.php';
require 'includes/article.php';
require 'includes/url.php';

$conn = getDB();

if (isset($_GET['id'])) {

    $article = getArticle($conn, $_GET['id']);

    if ($article) {
        $id = $article['id'];
        $title = $article['title'];
        $content = $article['content'];
        $published_date = $article['published_date'];
    } else {

        die("article not found");
    }
} else {

    die("id not supplied, article not found");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_date = $_POST['published_date'];

    $errors = validateArticle($title, $content, $published_date);

    if (empty($errors)) {

        $sql = "UPDATE article 
                SET title = ?,content = ?,published_date = ? 
                WHERE id = ?";
    }

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $published_date, $id);
    }
    if (mysqli_stmt_execute($stmt)) {
        redirect("$id");
    } else {

        echo mysqli_stmt_error($stmt);
    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>Edit article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>