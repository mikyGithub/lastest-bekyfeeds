<?php


class FeatureFilm
{

    // DB Stuff
    public $connection;
    private $films = 'feature_film';
    private $request = 'request';

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
        array('link' => "TV Movie", 'name' => '😂'),
        array('link' => "War", 'name' => '😂'),
        array('link' => "Western", 'name' => '😂'),

    );



    // Series Properties
    public $id;
    public $name;
    public $thumbnail;
    public $limit = 24;
    //Constructor with DB
    public function __construct($db)
    {
        $this->connection = $db;
    }



    public function getFilms()
    {
        //Get Series 
        // $query = 'SELECT * FROM ' . $this->series . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->films . '  ORDER BY title ASC  LIMIT ' . $this->limit;


        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }




    public function getFilmsPaginated($page)
    {
        $offset = ($this->limit * ($page - 1));
        // echo $offset;
        //Get Series   LIMIT {someLimit} OFFSET {someOffset};
        // $query = 'SELECT * FROM ' . $this->series . ' WHERE isActive = true ORDER BY name ASC';
        //$query = 'SELECT * FROM ' . $this->films . '  ORDER BY title ASC  LIMIT ' . $this->limit . ' OFFSET ' . $offset;
        $query = 'SELECT * FROM ' . $this->films . '  ORDER BY title ASC ';

        //$stmt = $this->connection->prepare($query);

        // Execute Query
        //$stmt->execute();
        return $this->paginate($query, $page);
        //  return $stmt;
    }







    public function getFilmDetail($film_id)
    {
        //Get Series 
        $query = 'SELECT * FROM ' . $this->films . ' WHERE id=' . $film_id;



        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }


    // search
    public function searchFilm($film_name)
    {

        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE '%" . $film_name . "%' LIMIT 5";


        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;

        echo '<a  class="w-full px-4 py-1 hover:bg-gray-600" href="">
                
        </a>';
    }

    // filter by recent
    public function getRecent()
    {

        $query = "SELECT * FROM " . $this->films . " WHERE isRecent = true LIMIT 6";


        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getRecentPaginated($page)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE isRecent = true ";


        return $this->paginate($query, $page);
    }

    // filter by popularity
    public function getPopular()
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->series . " WHERE isPopular = true LIMIT 6";


        $stmt = $this->connection->prepare($query);


        $stmt->execute();

        return $stmt;
    }


    public function getPopularPaginated($page)
    {

        $query = "SELECT * FROM " . $this->series . " WHERE isPopular = true";


        return $this->paginate($query, $page);
    }




    // filter by genre
    public function getByGenre($genre)
    {

        $query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' ";

        $stmt = $this->connection->prepare($query);


        $stmt->execute();

        return $stmt;
    }

    public function getByGenrePaginated($genre, $page)
    {

        $query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' ";


        return $this->paginate($query, $page);
    }

    // filter by letter
    public function getByLetter($letter)
    {
        //Get Series 
        //$query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' LIMIT 16";
        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE $letter '%' ORDER BY title ASC ";

        $stmt = $this->connection->prepare($query);

        // Execute Querys
        $stmt->execute();

        return $stmt;
    }


    public function getByLetterPaginated($letter, $page)
    {
        //Get Series 
        //$query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' LIMIT 16";
        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE $letter '%' ORDER BY title ASC ";

        ///  $stmt = $this->connection->prepare($query);

        // Execute Querys
        // $stmt->execute();

        return $this->paginate($query, $page);
    }
















    // filter By year

    public function getByYear($year)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE releasing_year LIKE '%" . $year . "%' LIMIT 6";


        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }



    public function getByYearPaginated($year, $page)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE releasing_year LIKE '%" . $year . "%'";


        return $this->paginate($query, $page);
    }






    public function getRequest()
    {
        //Get Request 
        // $query = 'SELECT * FROM ' . $this->request . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->request . '  ORDER BY id DESC';


        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
    // count total for pagination
    public function getCount($field, $value)
    {

        $sql = "SELECT COUNT(*) as total  FROM " . $this->films . " WHERE $field LIKE '%" . $value . "%' ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        // echo $sql;

        return $stmt;
    }

    // pagination
    public function paginate($query, $page)
    {
        $offset = ($this->limit * ($page - 1));
        $sql = $query . 'LIMIT ' . $this->limit . ' OFFSET ' . $offset;
        $stmt = $this->connection->prepare($sql);
        echo $sql;
        $stmt->execute();


        return $stmt;
    }



    // for different usages
    public function getMoviesPaginated($field, $value, $page)
    {
        $offset = ($this->limit * ($page - 1));
        //Get Series 

        $query = "SELECT * FROM " . $this->films . " WHERE $field LIKE '%" . $value . "%'  LIMIT $this->limit OFFSET $offset";


        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getLatestMovies()
    {
        //Get Series 
        // $query = 'SELECT * FROM ' . $this->series . ' WHERE isActive = true ORDER BY name ASC';
        $query = 'SELECT * FROM ' . $this->films . ' WHERE isRecent = true  ORDER BY title ASC LIMIT 5';


        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
    public function getPopularMovies()
    {
        //Get movies 
        // $query = 'SELECT * FROM ' . $this->movies . ' WHERE isActive = true ORDER BY title ASC';
        $query = 'SELECT * FROM ' . $this->films . ' WHERE isPopular = true  ORDER BY title ASC LIMIT 6;';


        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
}
