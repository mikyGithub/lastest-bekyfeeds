<?php


class Request
{

    // DB Stuff
    public $connection;
    private $request = 'request';
    private $movies = 'feature_film';
    private $series = 'series';

 

    //Constructor
    public function __construct($db)
    {
        $this->connection = $db;
    }


   
    // Get Latest Requests
    public function getLatestRequests()
    {
        $query = 'SELECT * FROM ' . $this->request . ' ORDER BY posted_at ASC LIMIT 10;';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }


     // Get Latest Movies
     public function getLatestMovies()
     {
         $query = 'SELECT * FROM ' . $this->movies . ' WHERE isRecent = true  ORDER BY title ASC LIMIT 5';
         $stmt = $this->connection->prepare($query);
         $stmt->execute();
         return $stmt;
     }
 
     // Get Latest Episodes
    public function getLatestEpisodes()
    {
        $query = 'SELECT * FROM ' . $this->series . ' WHERE isRecent = true  ORDER BY name ASC LIMIT 6;';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}