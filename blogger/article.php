<?php

require 'includes/database.php';

$conn = getDB();

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
            <h2><?= htmlspecialchars($article['title']); ?></h2>
            <small><?= htmlspecialchars($article['published_date']); ?></small>
            <p><?= htmlspecialchars($article['content']); ?></p>
        </article>

</div>

<?php endif; ?>


<?php require 'includes/footer.php'; ?>