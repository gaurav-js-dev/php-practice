<?php
require 'includes/init.php';
$conn = require 'includes/db.php';


if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id']);

    if (!$article) {
        die("article not found");
    }
} else {

    die("id not supplied, article not found");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $previous_image = $article->image_file;

    if ($article->setImageFile($conn, null)) {


        if ($previous_image) {
            unlink("../uploads/$previous_image");
        }


        header("Location: article.php?id=$article->id");
    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>Delete article image</h2>

<form method="post">

    <p> Are you sure to remove this image ?</p>

    <button>Delete</button>

    <a href="edit-article-image.php?id=<?= $article->id; ?>">Cancel</a>


</form>

<h2>Edit article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>