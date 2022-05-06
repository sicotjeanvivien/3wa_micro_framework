<?php

require_once "./../lib/repository/Repository.php";
require_once "./../src/model/Article.php";

class ArticleRepository extends Repository
{
    const ARTICLE_TABLE = "CREATE TABLE IF NOT EXISTS article (
        id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        content TEXT NOT NULL,
        title VARCHAR(255),
        published_date DATETIME
    );";

    const ARTICLE_INSERT = "INSERT INTO article(content, title, published_date) 
        VALUE('quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto', 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit', '2020-03-12 00:00:00'),
        ('quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto', 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit', '2020-03-12 00:00:00'),
        ('quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto', 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit', '2020-03-12 00:00:00'),
        ('quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto', 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit', '2020-03-12 00:00:00')
    ;";

    private string $table;

    public function __construct()
    {
        $this->table = "article";
    }

    public function findAll(): array
    {
        $this->createTableIfNotExistes($this->table, self::ARTICLE_TABLE, self::ARTICLE_INSERT);
        $query = "SELECT * FROM $this->table ;";
        $result = $this->executeQuery($query);
        return ($result->fetchAll(PDO::FETCH_CLASS, $this->table));
    }
}
