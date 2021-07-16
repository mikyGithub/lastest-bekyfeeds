<?php


class FeatureFilm
{

    // DB Stuff
    public $connection;
    private $films = 'feature_film'; //table name
    //private $episode = 'episode';
    private $request = 'request';

    // Series Properties
    public $id;
    public $name;
    public $thumbnail;

    //Constructor with DB
    public function __construct($db)
    {
        $this->connection = $db;
    }



    public function getFilms()
    {
        //Get Series 
        // $query = 'SELECT * FROM ' . $this->series . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->films . '  ORDER BY title ASC';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

 public function getFilmDetail($film_id)
    {
        //Get Series 
        $query = 'SELECT * FROM ' . $this->films . ' WHERE id=' . $film_id;

      
        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }










    // public function getSeriesDetail($series_id)
    // {
    //     //Get Series 
    //     $query = 'SELECT * FROM ' . $this->series . ' s  LEFT JOIN ' . $this->episode . ' e on e.season_id = s.id WHERE s.id=' . $series_id;

    //     // Prepare Statement
    //     $stmt = $this->connection->prepare($query);

    //     // Execute Query
    //     $stmt->execute();

    //     return $stmt;
    // }
    public function searchSeries($series_name)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE name LIKE '%" . $series_name . "%' LIMIT 10";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;

        echo '<a  class="hover:bg-gray-600 w-full px-4 py-1" href="">
                
        </a>';
    }

    // public function getRecent()
    // {
    //     //Get Series 
    //     $query = "SELECT * FROM " . $this->films . " WHERE isRecent = true LIMIT 6";

    //     // Prepare Statement
    //     $stmt = $this->connection->prepare($query);

    //     // Execute Query
    //     $stmt->execute();

    //     return $stmt;
    // }
    // public function getPopular()
    // {
    //     //Get Series 
    //     $query = "SELECT * FROM " . $this->series . " WHERE isPopular = true LIMIT 6";

    //     // Prepare Statement
    //     $stmt = $this->connection->prepare($query);

    //     // Execute Query
    //     $stmt->execute();

    //     return $stmt;
    // }

    public function getByGenre($genre)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' LIMIT 6";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getByYear($year)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE releasing_year LIKE '%" . $year . "%' LIMIT 6";

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
}
