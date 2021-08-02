<?php

require 'includes/init.php';

$conn = require 'includes/db.php';


if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id'], $columns = "id");

    if (!$article) {
        die("article not found");
    }
} else {

    die("id not supplied, article not found");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($article->delete($conn)) {
        header("Location: index.php");
    }
}
