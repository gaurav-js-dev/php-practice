<?php
require 'includes/init.php';
$conn = require 'includes/db.php';


if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id']);

    if (!$article) {
        die("article not found");
    }
} else {

    die("id not supplied, article not found");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_FILES);


    try {

        if (empty($_FILES)) {
            throw new Exception("Invalid Upload");
        }

        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file uploaded');
                break;
            default:
                throw new Exception('An error occurred');
        }

        if ($_FILES['file']['size'] > 1000000) {
            throw new Exception('File is too large');
        }

        $mime_types = ['image/gif', 'image/png', 'image/jpeg'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['file']['tmp_name']);

        if (!in_array($mime_type, $mime_types)) {

            throw new Exception('Invalid file type');
        }

        $pathinfo = pathinfo($_FILES["file"]["name"]);

        $base = $pathinfo['filename'];

        $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);

        $base = mb_substr($base, 0, 200);

        $filename = $base . "." . $pathinfo['extension'];

        $destination = "../uploads/$filename";

        $i = 1;

        while (file_exists($destination)) {

            $filename = $base . "-$i." . $pathinfo['extension'];
            $destination = "../uploads/$filename";

            $i++;
        }


        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {

            if ($article->setImageFile($conn, $filename)) {

                header("Location: article.php?id=$article->id");
            }
        } else {

            throw new Exception('Unable to move uploaded file');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>
<?php require 'includes/header.php'; ?>

<form enctype="multipart/form-data" method="post">
    <div>
        <label for="file">Image File</label>
        <input type="file" name="file" id="file">
    </div>
    <button>Upload</button>

</form>

<h2>Edit article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>