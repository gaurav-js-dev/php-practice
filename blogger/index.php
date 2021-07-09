<?php

require 'includes/database.php';

$sql = "SELECT *
        FROM article
        ORDER BY date;";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
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
                        <h2> <a href="article.php?id=<?= $article['id']; ?>"> <?= $article['title']; ?></a></h2>
                        <small><?= $article['date']; ?></small>
                        <p><?= $article['content']; ?></p>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
</div>
<?php endif; ?>
<?php require 'includes/footer.php'; ?>