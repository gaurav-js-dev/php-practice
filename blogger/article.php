<?php
require 'includes/init.php';


$conn = require 'includes/db.php';


if (isset($_GET['id'])) {
    $article = Article::getWithCategories($conn, $_GET['id']);
} else {
    $article = null;
}

?>
<?php require 'includes/header.php'; ?>
<div class="article">
    <?php if ($article) : ?>
        <article>
            <h2><?= htmlspecialchars($article[0]['title']); ?></h2>
            <small><?= htmlspecialchars($article[0]['published_date']); ?></small>
            <?php if ($article[0]['image_file']) : ?>
                <img src="uploads/<?= $article[0]['image_file']; ?>">
            <?php endif; ?>
            <p><?= htmlspecialchars($article[0]['content']); ?></p>

            <?php if ($article[0]['category_name']) : ?>
                <small>Categories:
                    <?php foreach ($article as $a) : ?>
                        <?= htmlspecialchars($a['category_name']); ?>
                    <?php endforeach; ?>
                </small>
            <?php endif; ?>

        </article>

    <?php else : ?>
        <p>Article Not Found</p>
    <?php endif; ?>

    <?php require 'includes/footer.php'; ?>