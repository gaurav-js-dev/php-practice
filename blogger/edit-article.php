<?php

require 'includes/database.php';
require 'includes/article.php';

$conn = getDB();

if (isset($_GET['id'])) {

    $article = getArticle($conn, $_GET['id']);

    if ($article) {
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
        die('This form is valid');
    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>Edit article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>