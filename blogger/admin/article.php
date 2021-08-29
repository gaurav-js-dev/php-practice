<?php
require 'includes/init.php';


$conn = require 'includes/db.php';


if (isset($_GET['id'])) {
    $article = Article::getByID($conn, $_GET['id']);
} else {
    $article = null;
}
?>
<?php require 'includes/header.php'; ?>


<a class="btn btn-secondary my-4" href="new-article.php">New article</a>
<div class="article container bg-light p-4 border">

    <?php if ($article) : ?>

        <article>
            <h2><?= htmlspecialchars($article->title); ?></h2>
            <small> <time datetime="<?= $article->published_date ?>">
                    <?php
                    $datetime = new DateTime($article->published_date);
                    echo $datetime->format("F, Y");
                    ?></time></small>

            <?php if ($article->image_file) : ?>
                <img class="p-2 img-fluid" src="../uploads/<?= $article->image_file; ?>">
            <?php endif; ?>
            <p><?= htmlspecialchars($article->content); ?></p>
        </article>
        <a class="btn btn-info my-4" href="./edit-article.php?id=<?= $article->id; ?>">Edit </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete this post ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <form method="post" action="delete-article.php?id=<?= $article->id; ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-danger my-4" type="button" data-toggle="modal" data-target="#exampleModalCenter">
            Delete
        </button>
</div>
<?php else : ?>
    <p>Article Not Found</p>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>