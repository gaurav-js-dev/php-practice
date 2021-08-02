<?php

require 'includes/init.php';


$conn = require 'includes/db.php';


$articles = Article::getAll($conn);

?>

<?php require 'includes/header.php'; ?>

<?php if (Auth::isLoggedIn()) : ?>

    <p>You are logged in <a href="logout.php">Log Out</a></p>
    <p><a href="new-article.php">New article</a></p>

<?php else : ?>
    <p>You are logged out <a href="login.php">Log In</a></p>
<?php endif; ?>

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