<?php


class FeatureFilm
{

    // DB Stuff
    public $connection;
    private $films = 'feature_film'; //table name
    //private $episode = 'episode';
    private $request = 'request';

    public $genres = array(
        array('link' => "Drama", 'name' => 'Drama'),
        array('link' => "Thriller", 'name' => 'Thriller'),
        array('link' => "Comedy", 'name' => '😂Comedy'),
        array('link' => "Action", 'name' => 'Action'),
        array('link' => "Horror", 'name' => '😱Horror'),
        array('link' => "Adventure", 'name' => '🧗🏿‍♂️Adventure'),
        array('link' => "Sci-fi", 'name' => 'Sci-fi'),
        array('link' => "Crime", 'name' => '🔫Crime'),
        array('link' => "Romance", 'name' => '👫Romance'),
        array('link' => "Fantasy", 'name' => 'Fantasy'),
        array('link' => "Family", 'name' => '👨‍👩‍👦Family'),
        array('link' => "Mystery", 'name' => '❔Mystery'),
        array('link' => "Animation", 'name' => 'Animation'),
        array('link' => "Documentary", 'name' => 'Documentary'),
        array('link' => "History", 'name' => 'History'),
        array('link' => "Music", 'name' => '🎼Music'),
        array('link' => "TV Movie", 'name' => '📺TV Movie'),
        array('link' => "War", 'name' => '⚔️War'),
        array('link' => "Western", 'name' => 'Western'),

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

        // Prepare Statement
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
        // Prepare Statement
        //$stmt = $this->connection->prepare($query);

        // Execute Query
        //$stmt->execute();
return $this->paginate($query,$page);
      //  return $stmt;
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
    // public function searchSeries($series_name)
    // {
    //     //Get Series 
    //     $query = "SELECT * FROM " . $this->films . " WHERE name LIKE '%" . $series_name . "%' LIMIT 10";

    //     // Prepare Statement
    //     $stmt = $this->connection->prepare($query);

    //     // Execute Query
    //     $stmt->execute();

    //     return $stmt;

    //     echo '<a  class="hover:bg-gray-600 w-full px-4 py-1" href="">

    //     </a>';
    // }

// search
    public function searchFilm($film_name)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE '%" . $film_name . "%' LIMIT 5";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;

        echo '<a  class="hover:bg-gray-600 w-full px-4 py-1" href="">
                
        </a>';
    }

// filter by recent
    public function getRecent()
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE isRecent = true LIMIT 6";

        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getRecentPaginated($page)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE isRecent = true ";

        // Prepare Statement
        // $stmt = $this->connection->prepare($query);

        // // Execute Query
        // $stmt->execute();

        return $this->paginate($query,$page);
    }

    // filter by popularity
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


    public function getPopularPaginated($page)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->series . " WHERE isPopular = true";

        // Prepare Statement
        // $stmt = $this->connection->prepare($query);

        // // Execute Query
        // $stmt->execute();

        return $this->paginate($query,$page);
    }




// filter by genre
    public function getByGenre($genre)
    {
        //Get Series 
        //$query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' LIMIT 16";
        $query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' ";
        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    public function getByGenrePaginated($genre,$page)
    {
        //Get Series 
        //$query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' LIMIT 16";
        $query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' ";
        // Prepare Statement
       // $stmt = $this->connection->prepare($query);

        // Execute Query
      //  $stmt->execute();

        return $this->paginate($page);
    }

// filter by letter
    public function getByLetter($letter)
    {
        //Get Series 
        //$query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' LIMIT 16";
        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE $letter '%' ORDER BY title ASC ";
        // Prepare Statement
        $stmt = $this->connection->prepare($query);

        // Execute Querys
        $stmt->execute();

        return $stmt;
    }


    public function getByLetterPaginated($letter,$page)
    {
        //Get Series 
        //$query = "SELECT * FROM " . $this->films . " WHERE genre LIKE '%" . $genre . "%' LIMIT 16";
        $query = "SELECT * FROM " . $this->films . " WHERE title LIKE $letter '%' ORDER BY title ASC ";
        // Prepare Statement
      ///  $stmt = $this->connection->prepare($query);

        // Execute Querys
       // $stmt->execute();

        return $this->paginate($page);
    }
















// filter By year

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



    public function getByYearPaginated($year,$page)
    {
        //Get Series 
        $query = "SELECT * FROM " . $this->films . " WHERE releasing_year LIKE '%" . $year . "%'";

        // Prepare Statement
        // $stmt = $this->connection->prepare($query);

        // // Execute Query
        // $stmt->execute();

        return $this->paginate($page);
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
    public function paginate($query,$page){
        $offset = ($this->limit * ($page - 1));
        $sql=$query.'LIMIT '. $this->limit. ' OFFSET ' .$offset;
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
        // Prepare Statement
       
        $stmt = $this->connection->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

}
