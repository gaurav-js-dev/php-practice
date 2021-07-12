<?php
require 'includes/database.php';
require 'includes/article.php';

$conn = getDB();

if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id']);
} else {
    $article = null;
}
?>
<?php require 'includes/header.php'; ?>
<div class="article">
    <?php if ($article === null) : ?>
        <p>Article Not Found</p>
    <?php else : ?>

        <article>
            <h2><?= htmlspecialchars($article['title']); ?></h2>
            <small><?= htmlspecialchars($article['published_date']); ?></small>
            <p><?= htmlspecialchars($article['content']); ?></p>
        </article>

</div>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>