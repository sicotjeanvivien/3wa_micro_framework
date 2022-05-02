<?php
require_once "./../lib/repository/Repository.php";
require_once "./../src/model/User.php";

class UserRepository extends Repository
{
    private const USER_TABLE = "CREATE TABLE IF NOT EXISTS user ( 
        id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username TEXT NOT NULL,
        password VARCHAR(255)
    );";

    private const USER_INSERT = "INSERT INTO user(username, password) VALUES(
    'admin',
    '$2y$10\$B7e9Vf30Su7dMDrrKn8.TuUPLI2XJtPkvPLllbPaORN2hzYMQPQp.'
    );";

    private string $table;

    public function __construct(string $table) {
        $this->table = $table;
    }

    public function findOneByUsername(string $username): ?User
    {
        $user = null;
        $this->createTableIfNotExistes($this->table, self::USER_TABLE, self::USER_INSERT);

        $query = "SELECT * FROM $this->table WHERE username = :username LIMIT 1;";
        $params= [
            ":username" => $username
        ];
        if (count($result = ($this->executeQuery($query, $params))->fetchAll(PDO::FETCH_CLASS, "user")) > 0) {
            $user = $result[0];
        }
        return $user;
    }
}
