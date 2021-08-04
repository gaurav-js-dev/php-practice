<?php

require 'includes/init.php';

Auth::requireLogin();

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 10, Article::getTotal($conn));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

?>

<?php require 'includes/header.php'; ?>

<h4 class="h4 text-center">Administrator Area</h4>

<p><a href="new-article.php">New article</a></p>


<div class="articles">

    <?php if (empty($articles)) : ?>
        <p>No Articles Found</p>
    <?php else : ?>
        <table class="table table-striped table-bordered" id='index'>
            <thead class="thead-light">
                <tr>
                    <th class="col-1" scope="col">S.No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                </tr>


                <?php foreach ($articles as $key =>  $article) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><a href="article.php?id=<?= $article['id']; ?>"> <?= htmlspecialchars($article['title']); ?></a></td>
                        <td><?= htmlspecialchars($article['published_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </thead>
        </table>
        <?php require 'includes/paginator.php'; ?>
</div>
<?php endif; ?>
<?php require 'includes/footer.php'; ?>