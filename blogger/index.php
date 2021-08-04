<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);
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
        <?php require 'includes/paginator.php'; ?>

</div>
<?php endif; ?>
<?php require 'includes/footer.php'; ?>