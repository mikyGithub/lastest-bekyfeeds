<?php


class Series
{

    // DB Stuff
    public $connection;
    private $series = 'series';
    private $episode = 'episode';

    // Series Properties
    public $id;
    public $name;
    public $thumbnail;
    public $limit = 24;

    // Array for Categories
    public $genres = array(
        array('link' => "Drama", 'name' => '😂'),
        array('link' => "Thriller", 'name' => '😂'),
        array('link' => "Comedy", 'name' => '😂'),
        array('link' => "Action", 'name' => '😂'),
        array('link' => "Horror", 'name' => '😂'),
        array('link' => "Adventure", 'name' => '😂'),
        array('link' => "Sci-fi", 'name' => '😂'),
        array('link' => "Crime", 'name' => '😂'),
        array('link' => "Romance", 'name' => '😂'),
        array('link' => "Fantasy", 'name' => '😂'),
        array('link' => "Family", 'name' => '😂'),
        array('link' => "Mystery", 'name' => '😂'),
        array('link' => "Animation", 'name' => '😂'),
        array('link' => "Documentary", 'name' => '😂'),
        array('link' => "History", 'name' => '😂'),
        array('link' => "Music", 'name' => '😂'),
        array('link' => "TV Series", 'name' => '😂'),
        array('link' => "War", 'name' => '😂'),
        array('link' => "Western", 'name' => '😂'),

    );

    // Constructor
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // Get All Series
    public function getSeries()
    {
        $query = 'SELECT * FROM ' . $this->series . '  ORDER BY releasing_year DESC  LIMIT ' . $this->limit;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Series [Paginated]
    public function getSeriesPaginated($page)
    {
        $offset = ($this->limit * ($page - 1));
        $query = 'SELECT * FROM ' . $this->series . '  ORDER BY releasing_year  DESC ';
        return $this->paginate($query, $page);
    }

    // Series Detail
    public function getSeriesDetail($series_id)
    {
        //Get Series 
        $query = 'SELECT * FROM ' . $this->series . ' s  LEFT JOIN ' . $this->episode . ' e on e.season_id = s.id WHERE s.id=' . $series_id;

    //    $query = 'SELECT * FROM ' . $this->series . ' s  LEFT JOIN ' . $this->episode . ' e on e.id = s.id WHERE s.alias="' . $alias.'"';



    //    $query = 'SELECT * FROM ' . $this->series . ' s  LEFT JOIN ' . $this->episode . ' e on e.alias = s.alias WHERE s.alias="' . $alias.'"';


    //     $query =  'SELECT * FROM' . $this->series .  ' s LEFT JOIN '  . $this->episode . ' e on e.alias = s.alias WHERE s.alias="' .$alias'"';

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    // Search Series
    public function searchSeriesPaginated($film_name,$page)
    {
        $query = "SELECT * FROM " . $this->series . " WHERE name LIKE '%" . $film_name . "%'";
       return $this->paginate($query,$page);
    }

    // Get Recent Series
    public function getRecent()
    {
        $query = "SELECT * FROM " . $this->series . " WHERE isRecent = true LIMIT 4";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Recent Series [Paginated]
    public function getRecentPaginated($page)
    {
        $query = "SELECT * FROM " . $this->series . " WHERE isRecent = true ";
        return $this->paginate($query, $page);
    }

    // Get Popular Series
    public function getPopular()
    {
        $query = "SELECT * FROM " . $this->series . " WHERE isPopular = true LIMIT 4";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Popular Series [Paginated]
    public function getPopularPaginated($page)
    {
        $query = "SELECT * FROM " . $this->series . " WHERE isPopular = true";
        return $this->paginate($query, $page);
    }

    // Get Series By Genre
    public function getByGenre($genre)
    {
        $query = "SELECT * FROM " . $this->series . " WHERE genre LIKE '%" . $genre . "%' ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Series By Genre [Paginated]
    public function getByGenrePaginated($genre, $page)
    {
        $query = "SELECT * FROM " . $this->series . " WHERE genre LIKE '%" . $genre . "%' ";
        return $this->paginate($query, $page);
    }

    // Get Series By Letter
    public function getByLetter($letter)
    {
        $query = "SELECT * FROM " . $this->series . " WHERE name LIKE $letter '%' ORDER BY name ASC ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Series By Letter [Paginated]
    public function getByLetterPaginated($letter, $page)
    {
        $query = "SELECT * FROM " . $this->series . " WHERE name LIKE '$letter%' ORDER BY name ASC ";
        return $this->paginate($query, $page);
    }

    // Get Series By Year 
    public function getByYear($year)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->series . " WHERE releasing_year LIKE '%" . $year . "%' LIMIT 4";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Series By Year [Paginated]
    public function getByYearPaginated($year, $page)
    {
        $query = "SELECT * FROM " . $this->series . " WHERE releasing_year LIKE '%" . $year . "%'";
        return $this->paginate($query, $page);
    }

    // Get Request
    public function getRequest()
    {
        $query = 'SELECT * FROM ' . $this->request . '  ORDER BY id DESC';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Total Count
    public function getCount($field, $value)
    {
        $sql = "SELECT COUNT(*) as total  FROM " . $this->series . " WHERE $field LIKE '%" . $value . "%' ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // Pagination
    public function paginate($query, $page)
    {
        $offset = ($this->limit * ($page - 1));
        $sql = $query . 'LIMIT ' . $this->limit . ' OFFSET ' . $offset;
        $stmt = $this->connection->prepare($sql);
        //echo $sql;
        $stmt->execute();
        return $stmt;
    }

    // Get Editor Series
    public function getEditor()
    {
        $query = "SELECT * FROM " . $this->series . " WHERE isEditor = true LIMIT 4";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

   
    
}