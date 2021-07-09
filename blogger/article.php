<?php

require 'includes/database.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))
    $sql = "SELECT *
        FROM article
        WHERE id =" . $_GET['id'];

$results = mysqli_query($conn, $sql);

$article = mysqli_fetch_assoc($results);


?>

<?php require 'includes/header.php'; ?>

<div class="article">

    <?php if ($article === null) : ?>
        <p>Article Not Found</p>
    <?php else : ?>

        <article>
            <h2><?= $article['title']; ?></h2>
            <small><?= $article['date']; ?></small>
            <p><?= $article['content']; ?></p>
        </article>

</div>

<?php endif; ?>


<?php require 'includes/footer.php'; ?>