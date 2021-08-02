<?php

require 'includes/init.php';

Auth::requireLogin();

$conn = require 'includes/db.php';

$articles = Article::getAll($conn);

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
                    <th scope="col">S.No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Published Date</th>
                </tr>


                <?php foreach ($articles as $key =>  $article) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><a href="article.php?id=<?= $article['id']; ?>"> <?= htmlspecialchars($article['title']); ?></a></td>
                        <td><?= htmlspecialchars($article['content']); ?></td>
                        <td><?= htmlspecialchars($article['published_date']); ?></td>
                    </tr>
                <?php endforeach; ?>


            </thead>
        </table>
</div>
<?php endif; ?>
<?php require 'includes/footer.php'; ?>