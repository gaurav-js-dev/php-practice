<?php

/**
 * Article
 *
 * A piece of writing for publication
 */
class Article

{
    /**
     * Unique identifier
     * @var integer
     */
    public $id;

    /**
     * The article title
     * @var string
     */
    public $title;

    /**
     * The article content
     * @var string
     */
    public $content;

    /**
     * The publication date and time
     * @var date
     */
    public $published_date;
    /**
     * Get all the articles
     *
     * @param object $conn Connection to the database
     *
     * @return array An associative array of all the article records
     */
    public static function getAll($conn)
    {
        $sql = "SELECT *
        FROM article
        ORDER BY published_date DESC;";
        $results = $conn->query($sql);
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByID($conn, $id, $columns = "*")
    {
        $sql = "SELECT $columns
        FROM article
        WHERE id =:id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');


        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    public function update($conn)
    {
        $sql = "UPDATE article 
                SET title = :title,content = :content,published_date = :published_date 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

        if ($this->published_date == '') {
            $stmt->bindValue(':published_date', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':published_date', $this->published_date, PDO::PARAM_STR);
        }

        return $stmt->execute();
    }
}
