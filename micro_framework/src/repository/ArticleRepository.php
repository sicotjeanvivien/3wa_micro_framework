<?php

require_once "./../lib/repository/Repository.php";
require_once "./../src/model/Article.php";

class ArticleRepository extends Repository
{

    private const ARTICLE_TABLE = "CREATE TABLE IF NOT EXISTS article ( 
        id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        content TEXT NOT NULL,
        title VARCHAR(255),
        published_date DATETIME 
    );";

    private const ARTICLE_INSERT = "INSERT INTO article(content, title, published_date) VALUES(
        'quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto',
        'sunt aut facere repellat provident occaecati excepturi optio reprehenderit',
        '2021-02-23 00:00:00'
        ),
        (
        'est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla',
        'qui est esse',
        '2020-03-23 00:00:00'
        ),
        (
        'et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut',
        'ea molestias quasi exercitationem repellat qui ipsa sit aut',
        '2022-02-23 00:00:00'
        ),
        (
        'ullam et saepe reiciendis voluptatem adipisci\nsit amet autem assumenda provident rerum culpa\nquis hic commodi nesciunt rem tenetur doloremque ipsam iure\nquis sunt voluptatem rerum illo velit',
        'eum et est occaecati',
        '2022-03-15 00:00:00'
    );";

    /**
     * @var string $table
     */
    private string $table;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function findAll(): array
    {        
        $this->createTableIfNotExistes($this->table, self::ARTICLE_TABLE, self::ARTICLE_INSERT);
        $query = "SELECT * FROM $this->table ;";
        return ($this->executeQuery($query))->fetchAll(PDO::FETCH_CLASS, "Article");
    }
    
    public function insert(Article $article)
    {
        $this->createTableIfNotExistes($this->table, self::ARTICLE_TABLE, self::ARTICLE_INSERT);
        $query = "INSERT INTO article(title, content, published_date) VALUE(:title, :content, :published_date);";
        $params = [
            ":title"=> $article->getTitle(),
            ":content"=> $article->getContent(), 
            ":published_date"=> $article->getPublishedDate()
        ];        
        $this->executeQuery($query, $params);
    }
}
