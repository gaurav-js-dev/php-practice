<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$articles = Article::getAll($conn);
?>

<?php require 'includes/header.php'; ?>
<div class="articles">

    <?php if (empty($articles)) : ?>
        <p>No Articles Found</p>
    <?php else : ?>
        <ul id='index'>
            <?php foreach ($articles as $article) : ?>
                <li>
                    <article>
                        <h2> <a href="article.php?id=<?= $article['id']; ?>"> <?= htmlspecialchars($article['title']); ?></a></h2>
                        <small><?= htmlspecialchars($article['published_date']); ?></small>
                        <p><?= htmlspecialchars($article['content']); ?></p>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
</div>
<?php endif; ?>
<?php require 'includes/footer.php'; ?>