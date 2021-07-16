<?php


class Series
{

    // DB Stuff
    public $connection;
    private $series = 'series';
    private $episode = 'episode';
    private $request = 'request';
    private $movie = 'feature_film';

    // Series Properties
    public $id;
    public $name;
    public $thumbnail;

    //Constructor with DB
    public function __construct($db)
    {
        $this->connection = $db;
    }



    public function getSeries()
    {
        //Get Series 
        // $query = 'SELECT * FROM ' . $this->series . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->series . '  ORDER BY name ASC';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getSeriesDetail($series_id)
    {
        //Get Series 
        $query = 'SELECT * FROM ' . $this->series . ' s  LEFT JOIN ' . $this->episode . ' e on e.season_id = s.id WHERE s.id=' . $series_id;

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
    public function searchSeries($series_name)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->series . " WHERE name LIKE '%" . $series_name . "%' LIMIT 10";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;

        echo '<a  class="hover:bg-gray-600 w-full px-4 py-1" href="">
                
        </a>';
    }

    public function getRecent()
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->series . " WHERE isRecent = true LIMIT 6";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
    public function getPopular()
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->series . " WHERE isPopular = true LIMIT 6";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getByGenre($genre)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->series . " WHERE genre LIKE '%" . $genre . "%' LIMIT 6";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getByYear($year)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->series . " WHERE releasing_year LIKE '%" . $year . "%' LIMIT 6";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
    public function getRequest()
    {
        //Get Request 
        // $query = 'SELECT * FROM ' . $this->request . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->request . '  ORDER BY id DESC';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getMovies()
    {
        //Get Request 
        // $query = 'SELECT * FROM ' . $this->request . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->movie . '  ORDER BY id DESC';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
}
