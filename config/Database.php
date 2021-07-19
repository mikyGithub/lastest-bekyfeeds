<?php
class Database
{
    // DB Params

    private $host = 'localhost';
    private $db_name = 'bekymovies';
    private $username = 'root';
    private $password = '';
    private $connection;

    // private $host = 'localhost';
    // private $db_name = 'bekyfeedscom_movies';
    // private $username = 'bekyfeedscom_mikyman';
    // private $password = 'Belayzeleke#1';
    // private $connection;

    // DB Connect

    public function connect()
    {
        $this->connection = null;

        try {
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error' . $e->getMessage();
        }

        return $this->connection;
    }
}