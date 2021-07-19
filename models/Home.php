<?php


class Home
{

    // DB Stuff
    public $connection;
    private $series = 'series';
    private $movies = 'feature_film';
    private $request = 'request';

    // Home Properties
    public $id;
    public $name;
    public $thumbnail;

    //Constructor
    public function __construct($db)
    {
        $this->connection = $db;
    }


    // Get Latest Episodes
    public function getLatestEpisodes()
    {
        $query = 'SELECT * FROM ' . $this->series . ' WHERE isRecent = true  ORDER BY name ASC LIMIT 4;';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    // Get Popular Episodes
    public function getPopularEpisodes()
    {
        $query = 'SELECT * FROM ' . $this->series . ' WHERE isPopular = true  ORDER BY name ASC LIMIT 4;';
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

     // Get Popular Episodes
    public function getPopularMovies()
    {
        
        $query = 'SELECT * FROM ' . $this->movies . ' WHERE isPopular = true  ORDER BY title ASC LIMIT 4;';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    // Get Latest Episodes
    public function getLatestRequests()
    {
        $query = 'SELECT * FROM ' . $this->request . ' ORDER BY posted_at ASC LIMIT 10;';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}