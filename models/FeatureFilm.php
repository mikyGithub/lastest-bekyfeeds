<?php


class FeatureFilm
{

    // DB Stuff
    public $connection;
    private $films = 'feature_film';
    private $request = 'request';

    // Variables
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
        array('link' => "TV Film", 'name' => '😂'),
        array('link' => "War", 'name' => '😂'),
        array('link' => "Western", 'name' => '😂'),

    );

    // Constructor
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // Get All Films
    public function getFilms()
    {
        $query = 'SELECT * FROM ' . $this->films . '  ORDER BY title ASC  LIMIT ' . $this->limit;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Films [Paginated]
    public function getFilmsPaginated($page)
    {
        $offset = ($this->limit * ($page - 1));
        $query = 'SELECT * FROM ' . $this->films . '  ORDER BY title ASC ';
        return $this->paginate($query, $page);
    }

    // Film Detail
    public function getFilmDetail($film_id)
    {
        $query = 'SELECT * FROM ' . $this->films . ' WHERE id=' . $film_id;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Search Film
    public function searchFilmPaginated($film_name,$page)
    {
        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE '%" . $film_name . "%'";
       return $this->paginate($query,$page);
    }

    // Get Recent Films
    public function getRecent()
    {
        $query = "SELECT * FROM " . $this->films . " WHERE isRecent = true LIMIT 4";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Recent Films [Paginated]
    public function getRecentPaginated($page)
    {
        $query = "SELECT * FROM " . $this->films . " WHERE isRecent = true ";
        return $this->paginate($query, $page);
    }

    // Get Popular Films
    public function getPopular()
    {
        $query = "SELECT * FROM " . $this->films . " WHERE isPopular = true LIMIT 4";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Popular Films [Paginated]
    public function getPopularPaginated($page)
    {
        $query = "SELECT * FROM " . $this->films . " WHERE isPopular = true";
        return $this->paginate($query, $page);
    }

    // Get Films By Genre
    public function getByGenre($genre)
    {
        $query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Films By Genre [Paginated]
    public function getByGenrePaginated($genre, $page)
    {
        $query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' ";
        return $this->paginate($query, $page);
    }

    // Get Films By Letter
    public function getByLetter($letter)
    {
        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE $letter '%' ORDER BY title ASC ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Films By Letter [Paginated]
    public function getByLetterPaginated($letter, $page)
    {
        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE '$letter%' ORDER BY title ASC ";
        return $this->paginate($query, $page);
    }

    // Get Films By Year 
    public function getByYear($year)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE releasing_year LIKE '%" . $year . "%' LIMIT 4";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get Films By Year [Paginated]
    public function getByYearPaginated($year, $page)
    {
        $query = "SELECT * FROM " . $this->films . " WHERE releasing_year LIKE '%" . $year . "%'";
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
        $sql = "SELECT COUNT(*) as total  FROM " . $this->films . " WHERE $field LIKE '%" . $value . "%' ";
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
}