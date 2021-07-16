<?php
class Episode
{
    // DB Stuff
    private $connection;

    // Series Properties
    public $id;
    public $episode_number;
    public $season_number;
    public $series_id;



    public function getEpisodes($series_id)
    {
        //Get Episodes 
        // $query = 'SELECT s.name,s.thumbnail e.episode_number,e.season_number,
    }
}
