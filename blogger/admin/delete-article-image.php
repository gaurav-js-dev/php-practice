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
    }
    header("Location: ./edit-article.php?id=$article->id;");
}

?>
<?php require 'includes/header.php'; ?>

<form method="post">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> Delete article image </h5>
        </div>
        <div class="modal-body">
            Are you sure to delete this image ?
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a class="btn btn-info" href="edit-article.php?id=<?= $article->id; ?>">Cancel</a>
        </div>
    </div>
</form>


<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>