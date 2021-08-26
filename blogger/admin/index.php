<?php

require 'includes/init.php';

Auth::requireLogin();

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 10, Article::getTotal($conn));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

?>

<?php require 'includes/header.php'; ?>

<h4 class="h4 text-center">Administrator Area</h4>

<button class="btn-primary"><a href="new-article.php">New article</a></button>


<div class="articles">

    <?php if (empty($articles)) : ?>
        <p>No Articles Found</p>
    <?php else : ?>
        <table class="table table-striped table-bordered" id='index'>
            <thead class="thead-light">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date</th>
                </tr>


                <?php foreach ($articles as $key =>  $article) : ?>
                    <tr>
                        <td><a href="article.php?id=<?= $article['id']; ?>"> <?= htmlspecialchars($article['title']); ?></a></td>
                        <td><a target="_blank" href="../uploads/<?= $article['image_file']; ?>"> <?= htmlspecialchars($article['image_file']); ?></a></td>
                        <td><?= htmlspecialchars($article['published_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </thead>
        </table>
        <?php require 'includes/paginator.php'; ?>
</div>
<?php endif; ?>
<?php require 'includes/footer.php'; ?>