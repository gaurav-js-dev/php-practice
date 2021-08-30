<?php
require 'includes/init.php';
$conn = require 'includes/db.php';

Auth::requireLogin();


if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id']);

    if (!$article) {
        die("article not found");
    }
} else {

    die("id not supplied, article not found");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_date = $_POST['published_date'];

    if ($article->update($conn)) {
        header("Location: article.php?id=$article->id");
    }
}

?>
<?php require 'includes/header.php'; ?>

<h2 class="p-2 mt-2">Edit Article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>