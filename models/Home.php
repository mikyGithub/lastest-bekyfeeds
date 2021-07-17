<?php


class Home
{

    // DB Stuff
    public $connection;
    private $series = 'series';
    private $episode = 'episode';
    private $request = 'request';
    private $movies = 'feature_film';

    // Series Properties
    public $id;
    public $name;
    public $thumbnail;

    //Constructor with DB
    public function __construct($db)
    {
        $this->connection = $db;
    }



    public function getLatestEpisodes()
    {
        //Get Series 
        // $query = 'SELECT * FROM ' . $this->series . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->series . ' WHERE isRecent = true  ORDER BY name ASC LIMIT 6;';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
    public function getPopularEpisodes()
    {
        //Get Series 
        // $query = 'SELECT * FROM ' . $this->series . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->series . ' WHERE isPopular = true  ORDER BY name ASC LIMIT 6;';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }


    public function getLatestMovies()
    {
        //Get Series 
        // $query = 'SELECT * FROM ' . $this->series . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->movies . ' WHERE isRecent = true  ORDER BY title ASC LIMIT 5';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
    public function getPopularMovies()
    {
        //Get movies 
        // $query = 'SELECT * FROM ' . $this->movies . ' WHERE isActive = true ORDER BY title ASC';
        $query = 'SELECT * FROM ' . $this->movies . ' WHERE isPopular = true  ORDER BY title ASC LIMIT 6;';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
}
