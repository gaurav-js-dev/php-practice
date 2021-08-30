<?php if (!empty($article->errors)) : ?>
    <ul>
        <?php foreach ($article->errors as $error) : ?>
            <li class="text-danger"><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" class="container p-4 bg-light">
    <div class="form-group ">
        <label for="title">Title</label>
        <input class="form-control col-auto" value="<?= htmlspecialchars($article->title); ?>" autocomplete="off" name="title" id="title" placeholder="Article title">
    </div>

    <div class="form-group ">
        <label for="content">Content</label>
        <textarea class="form-control col-auto" name="content" autocomplete="off" rows="4" cols="40" id="content" placeholder="Article content"><?= htmlspecialchars($article->content); ?></textarea>
    </div>

    <div class="form-group ">
        <label for="published_date">Publication date</label>
        <input class="form-control col-6" value="<?= htmlspecialchars($article->published_date); ?>" type="date" name="published_date" id="published_date">
    </div>
    <?php if ($article->image_file) : ?>
        <a href="delete-article-image.php?id=<?= $article->id; ?>" class="text-danger">
            Delete Image
        </a>
        <img class=" p-1 img-fluid" src="../uploads/<?= $article->image_file; ?>">

    <?php endif; ?>

    <button type="submit" class="btn btn-primary"> <?= $article->id ? 'Update' : "Add"; ?> </button>
    <?php if ($article->id) : ?>
        <a class="btn btn-dark my-4" href="./edit-article-image.php?id=<?= $article->id; ?>">Upload New Image </a>
    <?php endif; ?>

</form>