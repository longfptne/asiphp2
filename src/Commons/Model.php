<?php

namespace User\Mcvoop\Commons;

// use PDO; 
// Thay cho /

class Model
{
    protected \PDO|null $conn;

    public function __construct()
    {
        $host = DB_HOST;

        $post = DB_PORT;

        $username = DB_USERNAME;
        
        $password = DB_PASSWORD;
        
        $dbname = DB_NAME;

        try {

            $this->conn = new \PDO("mysql:host=$host;port=$post;dbname=$dbname", $username, $password);

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $err) {

            echo "Kết nối thất bại: " . $err->getMessage();
        }
    }

    public function getAllData($table, $getId)
    {
        $sql = "SELECT * FROM $table WHERE 1 ORDER BY $getId DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function testConnect()
    {

        echo "<pre>";

        print_r($this->conn);
    }

    public function __destruct()
    {

        $this->conn = null;
    }
}
