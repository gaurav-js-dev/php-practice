<?php
require 'includes/init.php';

Auth::requireLogin();

$article = new Article();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = require 'includes/db.php';


    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_date = $_POST['published_date'];

    if ($article->create($conn)) {
        header("Location: article.php?id=$article->id");
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>New article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>