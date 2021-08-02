<?php

/**
 * Redirect to another URL on the same site
 *
 * @param string $path The path to redirect to
 *
 * @return void
 */
class Url
{

    public static function redirect($id)
    {
        header("Location: article.php?id=$id");
        exit;
    }
}
