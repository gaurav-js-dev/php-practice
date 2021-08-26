<?php if (!empty($article->errors)) : ?>
    <ul>
        <?php foreach ($article->errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" class="container">
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
        <input class="form-control col-3" value="<?= htmlspecialchars($article->published_date); ?>" type="date" name="published_date" id="published_date">
    </div>

    <button type="submit" class="btn btn-primary">Add</button>

</form>