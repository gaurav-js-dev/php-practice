<?php if (!empty($article->errors)) : ?>
    <ul>
        <?php foreach ($article->errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">


    <div>
        <label for="title">Title</label>
        <input value="<?= htmlspecialchars($article->title); ?>" autocomplete="off" name="title" id="title" placeholder="Article title">
    </div>

    <div>
        <label for="content">Content</label>
        <textarea name="content" autocomplete="off" rows="4" cols="40" id="content" placeholder="Article content"><?= htmlspecialchars($article->content); ?></textarea>
    </div>

    <div>
        <label for="published_date">Publication date</label>
        <input value="<?= htmlspecialchars($article->published_date); ?>" type="date" name="published_date" id="published_date">
    </div>

    <button>Add</button>

</form>