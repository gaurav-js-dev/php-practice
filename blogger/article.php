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
<div class="article container bg-light p-4 border">

    <?php if ($article) : ?>
        <article>
            <h2><?= htmlspecialchars($article->title); ?></h2>
            <small> <time datetime="<?= $article->published_date ?>">
                    <?php
                    $datetime = new DateTime($article->published_date);
                    echo $datetime->format("F j, Y");
                    ?></time></small>
            <?php if ($article->image_file) : ?>
                <img class="p-3 img-fluid" src="uploads/<?= $article->image_file; ?>">
            <?php endif; ?>
            <p class="my-4"><?= htmlspecialchars($article->content); ?></p>
        </article>
    <?php else : ?>
        <p>Article Does not exist</p>
    <?php endif; ?>

    <?php require 'includes/footer.php'; ?>