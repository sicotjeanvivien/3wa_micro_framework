<?php

abstract class Repository
{
    private const DATABASE_NAME = "mysql:host=localhost;port=3306;dbname=micro_framework";
    private const DATABASE_USERNAME = "root";
    private const DATABASE_PASSWORD = "root";

    public function __construct()
    {
    }

    /**
     * Initialise PDO connection with database
     */
    private function connect()
    {
        return new PDO(self::DATABASE_NAME, self::DATABASE_USERNAME, self::DATABASE_PASSWORD);
    }

    /**
     * @param string $query Request in SQL
     * @param array $params Params [":variableSQL" => "valeur",...]
     * @return query result
     */
    protected function executeQuery(string $query, array $params = [])
    {
        $conn = $this->connect();
        $result = $conn->prepare($query);
        foreach ($params as $key => $param) $result->bindParam($key, $param);
        $result->execute();
        $conn = null;
        return $result ;
    }

    /**
     * @param string $table Table Name
     * @return bool
     */
    protected function checkTableExists($table): bool
    {
        $tableNotExist = true;
        $query = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = '$table' ;";
        $result = $this->executeQuery($query)->fetchAll(PDO::FETCH_CLASS, "Article");

        if (is_countable($result) && count($result) > 0) $tableNotExist = false;
        return $tableNotExist;
    }

    /**
     * @param string $table TableName
     * @param string $tableQuery Request for create table
     * @param string $insertQuery Request for insert first elements
     */
    protected function createTableIfNotExistes(string $table, string $tableQuery, string $insretQuery)
    {
        if ($this->checkTableExists($table)) {
            $this->executeQuery($tableQuery);
            $this->executeQuery($insretQuery);
        }
    }
}
